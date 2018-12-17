<?php


//wap前台栏目、标签、内容页面地址生成
function get_wap_front_url(array $param)
{
    $url = '';

    if($param['type'] == 'list')
    {
        //列表页
        $url .= '/cat'.$param['catid'];
    }
    else if($param['type'] == 'content')
    {
        //内容页
        $url .= '/p/'.$param['id'];
    }
    else if($param['type'] == 'tags')
    {
        //tags页面
        $url .= '/tag'.$param['tagid'];
    }
    else if($param['type'] == 'page')
    {
        //单页面
        $url .= '/page/'.$param['pagename'];
    }
    else if($param['type'] == 'search')
    {
        //tags页面
        $url .= '/s'.$param['searchid'];
    }
    else if($param['type'] == 'goodslist')
    {
        //商品列表页
        $url .= '/product'.'/'.$param['catid'];
    }
    else if($param['type'] == 'goodsdetail')
    {
        //商品内容页
        $url .= '/goods/'.$param['id'];
    }

    return $url;
}


/**
 * 获取列表分页
 * @param $param['pagenow'] 当前第几页
 * @param $param['counts'] 总条数
 * @param $param['pagesize'] 每页显示数量
 * @param $param['catid'] 栏目id
 * @param $param['offset'] 偏移量
 * @return array
 */
function get_listnav(array $param)
{
    $catid       = $param["catid"];
    $pagenow     = $param["pagenow"];
    $prepage     = $nextpage = '';
    $prepagenum  = $pagenow-1;
    $nextpagenum = $pagenow+1;

    $counts=$param["counts"];
    $totalpage=get_totalpage(array("counts"=>$counts,"pagesize"=>$param["pagesize"]));

    if($totalpage<=1 && $counts>0)
    {
        return "<li><span class=\"pageinfo\">共1页/".$counts."条记录</span></li>";
    }
    if($counts == 0)
    {
        return "<li><span class=\"pageinfo\">共0页/".$counts."条记录</span></li>";
    }
    $maininfo = "<li><span class=\"pageinfo\">共".$totalpage."页".$counts."条</span></li>";

    if(!empty($param["urltype"]))
    {
        $urltype = $param["urltype"];
    }
    else
    {
        $urltype = 'cat';
    }

    //获得上一页和下一页的链接
    if($pagenow != 1)
    {
        if($pagenow == 2)
        {
            $prepage.="<li><a href='/".$urltype.$catid."'>上一页</a></li>";
        }
        else
        {
            $prepage.="<li><a href='/".$urltype.$catid."/$prepagenum'>上一页</a></li>";
        }

        $indexpage="<li><a href='/".$urltype.$catid."'>首页</a></li>";
    }
    else
    {
        $indexpage="<li><a>首页</a></li>";
    }
    if($pagenow!=$totalpage && $totalpage>1)
    {
        $nextpage.="<li><a href='/".$urltype.$catid."/$nextpagenum'>下一页</a></li>";
        $endpage="<li><a href='/".$urltype.$catid."/$totalpage'>末页</a></li>";
    }
    else
    {
        $endpage="<li><a>末页</a></li>";
    }

    //获得数字链接
    $listdd="";
    if(!empty($param["offset"])){$offset=$param["offset"];}else{$offset=2;}

    $minnum=$pagenow-$offset;
    $maxnum=$pagenow+$offset;

    if($minnum<1){$minnum=1;}
    if($maxnum>$totalpage){$maxnum=$totalpage;}

    for($minnum;$minnum<=$maxnum;$minnum++)
    {
        if($minnum==$pagenow)
        {
            $listdd.= "<li class=\"thisclass\"><a>$minnum</a></li>";
        }
        else
        {
            if($minnum==1)
            {
                $listdd.="<li><a href='/".$urltype.$catid."'>$minnum</a></li>";
            }
            else
            {
                $listdd.="<li><a href='/".$urltype.$catid."/$minnum'>$minnum</a></li>";
            }
        }
    }

    $plist = '';
    $plist .= $indexpage; //首页链接
    $plist .= $prepage; //上一页链接
    $plist .= $listdd; //数字链接
    $plist .= $nextpage; //下一页链接
    $plist .= $endpage; //末页链接
    $plist .= $maininfo;

    return $plist;
}


//根据总数与每页条数，获取总页数
function get_totalpage(array $param)
{
    if(!empty($param['pagesize'] || $param['pagesize']==0)){$pagesize=$param["pagesize"];}else{$pagesize=CMS_PAGESIZE;}
    $counts=$param["counts"];

    //取总数据量除以每页数的余数
    if($counts % $pagesize)
    {
        $totalpage = intval($counts/$pagesize) + 1; //如果有余数，则页数等于总数据量除以每页数的结果取整再加一,如果没有余数，则页数等于总数据量除以每页数的结果
    }
    else
    {
        $totalpage = $counts/$pagesize;
    }

    return $totalpage;
}

/**
 * 为文章内容添加内敛, 排除alt title <a></a>直接的字符替换
 *
 * @param string $body
 * @return string
 */
function ReplaceKeyword($body)
{
    $karr = $kaarr = array();

    //暂时屏蔽超链接
    $body = preg_replace("#(<a(.*))(>)(.*)(<)(\/a>)#isU", '\\1-]-\\4-[-\\6', $body);

    if(cache("keywordlist")){$posts=cache("keywordlist");}else{$posts = object_to_array(DB::table("keywords")->get());cache(["keywordlist"=>$posts], \Carbon\Carbon::now()->addMinutes(2592000));}

    foreach($posts as $row)
    {
        $keyword = trim($row['keyword']);
        $key_url=trim($row['rpurl']);
        $karr[] = $keyword;
        $kaarr[] = "<a href='$key_url' target='_blank'><u>$keyword</u></a>";
    }

    asort($karr);

    $body = str_replace('\"', '"', $body);

    foreach ($karr as $key => $word)
    {
        $body = preg_replace("#".preg_quote($word)."#isU", $kaarr[$key], $body, 1);
    }

    //恢复超链接
    return preg_replace("#(<a(.*))-\]-(.*)-\[-(\/a>)#isU", '\\1>\\3<\\4', $body);
}


/**
 * 获取文章上一篇，下一篇id
 * @param $param['aid'] 当前文章id
 * @param $param['typeid'] 当前文章typeid
 * @param string $type 获取类型
 *       pre:上一篇 next:下一篇
 * @return array
 */
function get_article_prenext(array $param)
{
    $typeid = $res = '';

    if(!empty($param["typeid"]))
    {
        $typeid = $param["typeid"];
    }
    else
    {
        $Article = DB::table("articles")->select('typeid')->where('id', $param["aid"])->first();
        $typeid = $Article["typeid"];
    }

    $res = DB::table("articles")->select('id','typeid','title')->where('typeid', $typeid);
    if($param["type"]=='pre')
    {
        $res = $res->where('id', '<', $param["aid"])->orderBy('id', 'desc');
    }
    elseif($param["type"]=='next')
    {
        $res = $res->where('id', '>', $param["aid"])->orderBy('id', 'asc');
    }

    return object_to_array($res->first(), 1);
}