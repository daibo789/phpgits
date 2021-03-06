<?php
//读取动态配置
function sysconfig($varname='')
{
    $sysconfig = cache('sysconfig');
    $res = '';

    if(empty($sysconfig))
    {
        cache()->forget('sysconfig');

        $sysconfig = \App\Model\Admin\Sysconfig::orderBy('id')->select('varname', 'value')->get()->toArray();

        cache(['sysconfig' => $sysconfig], \Carbon\Carbon::now()->addMinutes(86400));
    }

    if($varname != '')
    {
        foreach($sysconfig as $row)
        {
            if($varname == $row['varname'])
            {
                $res = $row['value'];
            }
        }
    }
    else
    {
        $res = $sysconfig;
    }

    return $res;
}


//对象转数组
function object_to_array($object, $get=0)
{

    $res = [];
    if(!empty($object))
    {
        if($get==0)
        {
            foreach($object as $key=>$value)
            {
                $res[$key] = (array)$value;
            }
        }
        elseif($get==1)
        {
            $res = (array)$object;
        }
    }
    return $res;
}




/**
 * 获取数据属性
 * @param $dataModel 数据模型
 * @param $data 数据
 * @return array
 */
function getDataAttr($dataModel,$data = [])
{
    if(empty($dataModel) || empty($data))
    {
        return false;
    }

    foreach($data as $k=>$v)
    {
        $_method_str=ucfirst(preg_replace_callback('/_([a-zA-Z])/', function ($match) {
            return strtoupper($match[1]);
        }, $k));

        $_method = 'get' . $_method_str . 'Attr';

        if(method_exists($dataModel, $_method))
        {
            $tmp = $k.'_text';
            $data->$tmp = $dataModel->$_method($data);
        }
    }

    return $data;
}


//判断是否为数字
function checkIsNumber($data)
{
    if($data == '' || $data == null)
    {
        return false;
    }

    if(preg_match("/^\d*$/",$data))
    {
        return true;
    }

    return false;
}


/**
 * 调用逻辑接口
 * @param $name 逻辑类名称
 * @param array $config 配置
 * @return object
 */
function logic($name = '', $config = [])
{
    static $instance = [];
    $guid = $name . 'Logic';
    if (!isset($instance[$guid]))
    {
        $class = 'App\\Http\\Logic\\' . ucfirst($name) . 'Logic';

        if (class_exists($class))
        {
            $logic = new $class($config);
            $instance[$guid] = $logic;
        }
        else
        {
            throw new Exception('class not exists:' . $class);
        }
    }

    return $instance[$guid];
}

/**
 * 实例化（分层）模型
 * @param $name 模型类名称
 * @param array $config 配置
 * @return object
 */
function model($name = '', $config = [])
{
    static $instance = [];
    $guid = $name . 'Model';
    if (!isset($instance[$guid]))
    {
        $class = '\\App\\Model\\' . ucfirst($name);
        if (class_exists($class))
        {
            $model = new $class($config);
            $instance[$guid] = $model;
        }
        else
        {
            throw new Exception('class not exists:' . $class);
        }
    }

    return $instance[$guid];
}


//获取表所有字段
function get_table_columns($table, $field='')
{
    $res = \Illuminate\Support\Facades\Schema::getColumnListing($table);

    if($field != '')
    {
        //判断字段是否在表里面
        if(in_array($field, $res))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    return $res;
}

//将栏目列表生成数组
function get_category($modelname, $parent_id=0, $pad=0)
{
    $arr = array();

    $temp = \DB::table($modelname)->where('pid', $parent_id);
    if(get_table_columns($modelname, 'listorder'))
    {
        $temp = $temp->orderBy('listorder', 'asc');
    }
    else
    {
        $temp = $temp->orderBy('id', 'asc');
    }

    $temp = $temp->get();

    $cats = object_to_array($temp);

    if($cats)
    {
        foreach($cats as $row)//循环数组
        {
            $row['deep'] = $pad;

            if($child = get_category($modelname, $row["id"], $pad+1))//如果子级不为空
            {
                $row['child'] = $child;
            }

            $arr[] = $row;
        }

        return $arr;
    }
}

function category_tree($list,$pid=0)
{
    global $temp;

    if(!empty($list))
    {
        foreach($list as $v)
        {
            $temp[] = array("id"=>$v['id'],"deep"=>$v['deep'],"name"=>$v['name'],"pid"=>$v['pid']);
            //echo $v['id'];
            if(array_key_exists("child",$v))
            {
                category_tree($v['child'],$v['pid']);
            }
        }
    }

    return $temp;
}

//递归获取面包屑导航
function get_cat_path($cat,$table='arctype',$type='list')
{
    global $temp;

    $row = \DB::table($table)->select('name','pid','id')->where('id',$cat)->first();

    $temp = '<a href="'.get_front_url(array("catid"=>$row->id,"type"=>$type)).'">'.$row->name."</a> > ".$temp;

    if($row->pid<>0)
    {
        get_cat_path($row->pid, $table, $type);
    }

    return $temp;
}


//PhpAnalysis获取中文分词
function get_keywords($keyword)
{
    require_once(resource_path('org/phpAnalysis/phpAnalysis.php'));
    //import("Vendor.phpAnalysis.phpAnalysis");
    //初始化类
    PhpAnalysis::$loadInit = false;
    $pa = new PhpAnalysis('utf-8', 'utf-8', false);
    //载入词典
    $pa->LoadDict();
    //执行分词
    $pa->SetSource($keyword);
    $pa->StartAnalysis( false );
    $keywords = $pa->GetFinallyResult(',');

    return ltrim($keywords, ",");
}

//pc前台栏目、标签、内容页面地址生成
function get_front_url($param='')
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
        //搜索关键词页面
        $url .= '/s'.$param['searchid'];
    }
    else if($param['type'] == 'goodslist')
    {
        //商品列表页
        $url .= '/product'.$param['catid'];
    }
    else if($param['type'] == 'goodsdetail')
    {
        //商品内容页
        $url .= '/goods/'.$param['id'];
    }

    return $url;
}

//判断是否是图片格式，是返回true
function imgmatch($url)
{
    $info = pathinfo($url);
    if (isset($info['extension']))
    {
        if (($info['extension'] == 'jpg') || ($info['extension'] == 'jpeg') || ($info['extension'] == 'gif') || ($info['extension'] == 'png'))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}


//获取二维码
function get_erweima($url='',$size=150)
{
    return 'data:image/png;base64,'.base64_encode(\QrCode::format('png')->encoding('UTF-8')->size($size)->margin(0)->errorCorrection('H')->generate($url));
}

//根据栏目id获取栏目信息
function typeinfo($typeid)
{
    return db("arctype")->where("id=$typeid")->find();
}

//根据栏目id获取该栏目下文章/商品的数量
function catarcnum($typeid, $modelname='articles')
{
    $map['typeid']=$typeid;
    return \DB::table($modelname)->where($map)->count('id');
}

//根据Tag id获取该Tag标签下文章的数量
function tagarcnum($tagid)
{
    $taglist = \DB::table("taglists");
    if(!empty($tagid)){$map['tid']=$tagid; $taglist = $taglist->where($map);}
    return $taglist->count();
}

//根据文章id获得tag，$id表示文章id，$tagid表示要排除的标签id
function taglist($id,$tagid=0)
{
    $tags="";
    if($tagid!=0)
    {
        $Taglist = \DB::table("taglists")->where('aid',$id)->where('tid', '<>', $tagid)->get();
    }
    else
    {
        $Taglist = \DB::table("taglists")->where('aid',$id)->get();
    }

    foreach($Taglist as $row)
    {
        if($tags==""){$tags='id='.$row->tid;}else{$tags=$tags.' or id='.$row->tid;}
    }

    if($tags!=""){return object_to_array(\DB::table("tagindices")->whereRaw(\DB::raw($tags))->get());}
}


/**
 * 操作错误跳转的快捷方法
 * @access protected
 * @param string $msg 错误信息
 * @param string $url 页面跳转地址
 * @param mixed $time 当数字时指定跳转时间
 * @return void
 */
function error_jump($msg='', $url='', $time=3)
{
    if ($url=='' && isset($_SERVER["HTTP_REFERER"]))
    {
        $url = $_SERVER["HTTP_REFERER"];
    }

    if(!headers_sent())
    {
        header("Location:".route('admin_jump')."?error=$msg&url=$url&time=$time");
        exit();
    }
    else
    {
        $str = "<meta http-equiv='Refresh' content='URL=".route('admin_jump')."?error=$msg&url=$url&time=$time"."'>";
        exit($str);
    }
}

/**
 * 操作成功跳转的快捷方法
 * @access protected
 * @param string $msg 提示信息
 * @param string $url 页面跳转地址
 * @param mixed $time 当数字时指定跳转时间
 * @return void
 */
function success_jump($msg='', $url='', $time=1)
{
    if ($url=='' && isset($_SERVER["HTTP_REFERER"]))
    {
        $url = $_SERVER["HTTP_REFERER"];
    }

    if(!headers_sent())
    {
        header("Location:".route('admin_jump')."?message=$msg&url=$url&time=$time");
        exit();
    }
    else
    {
        $str = "<meta http-equiv='Refresh' content='URL=".route('admin_jump')."?message=$msg&url=$url&time=$time"."'>";
        exit($str);
    }
}



/**
 * 获取文章列表
 * @param int $tuijian=0 推荐等级
 * @param int $typeid=0 分类
 * @param int $image=1 是否存在图片
 * @param int $row=10 需要返回的数量
 * @param string $orderby='id desc' 排序，默认id降序，随机rand()
 * @param string $limit='0,10' 如果存在$row，$limit就无效
 * @return string
 */
function arclist(array $param)
{
    $modelname = 'articles';
    if(isset($param['table'])){$modelname = $param['table'];}

    $model = \DB::table($modelname);

    $size = sysconfig('CMS_PAGESIZE');$page = 1;$skip = 0;
    if(isset($param['limit'])){$limit=explode(',',$param['limit']); $skip = $limit[0]; $size = $limit[1];}else{if(isset($param['row'])){$size = $param['row'];}} // 参数格式：$param['limit'] = '2,10';$param['row'] = 10;

    //查询条件
    $where = function ($query) use ($param) {
        if(isset($param['tuijian']))
        {
            if(is_array($param['tuijian']))
            {
                $query->where('tuijian', $param['tuijian'][0], $param['tuijian'][1]);
            }
            else
            {
                $query->where('tuijian', $param['tuijian']);
            }
        }

        if(isset($param['expression']))
        {
            foreach($param['expression'] as $row)
            {
                $query->where($row[0], $row[1], $row[2]);
            }
        }

        if(isset($param['typeid']))
        {
            $query->where('typeid', $param["typeid"]);
        }

        if(isset($param['image']))
        {
            $query->where('litpic', '<>', '');
        }
    };

    if(!empty($where)){$model = $model->where($where);}

    //原生sql
    if(isset($param['sql']))
    {
        $model = $model->whereRaw($param['sql']);
    }

    //排序
    if(isset($param['orderby']))
    {
        $orderby = $param['orderby'];

        if($orderby == 'rand()')
        {
            $model = $model->orderBy(\DB::raw('rand()'));
        }
        else
        {
            if(count($orderby) == count($orderby, 1))
            {
                $model = $model->orderBy($orderby[0], $orderby[1]);
            }
            else
            {
                foreach($orderby as $row)
                {
                    $model = $model->orderBy($row[0], $row[1]);
                }
            }
        }
    }
    else
    {
        $model = $model->orderBy('id', 'desc');
    }

    //要返回的字段
    if(isset($param['field'])){$model = $model->select(\DB::raw($param['field']));}

    if($skip==0){$skip = ($page-1)*$size;}

//    dd($model->skip($skip)->take($size)->get());
    return object_to_array($model->skip($skip)->take($size)->get());
}
