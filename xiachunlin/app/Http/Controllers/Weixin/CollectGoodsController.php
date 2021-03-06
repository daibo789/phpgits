<?php

namespace App\Http\Controllers\Weixin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Common\Wechat\UserManager;


class CollectGoodsController extends CommonController
{
    protected $userManager;
    public function __construct(UserManager $userManager)
    {
        parent::__construct();
        $this->userManager = $userManager;
    }

    //商品收藏列表
    public function index(Request $request)
    {
        $weixin_user_info = $this->userManager->getUserInfo();
        $data['weixin_user_info'] = $weixin_user_info;
        $pagesize = 10;
        $offset = 0;
        if(isset($_REQUEST['page'])){$offset = ($_REQUEST['page']-1)*$pagesize;}

        $postdata = array(
            'limit'  => $pagesize,
            'offset' => $offset,
            'access_token' => $weixin_user_info['access_token']
        );
        $url = http_host(true)."/api/collect_goods_list";
        $res = curl_request($url,$postdata,'GET');
        $data['list'] = $res['data']['list'];

        $data['totalpage'] = ceil($res['data']['count']/$pagesize);

        if(isset($_REQUEST['page_ajax']) && $_REQUEST['page_ajax']==1)
        {
            $html = '';

            if($res['data']['list'])
            {
                foreach($res['data']['list'] as $k => $v)
                {
                    $html .= '<li><a href="'.$v['goods']['goods_detail_url'].'"><span class="goods_thumb"><img alt="'.$v['goods']['title'].'" src="'.env('APP_URL').$v['goods']['litpic'].'"></span></a>';
                    $html .= '<div class="goods_info"><p class="goods_tit">'.$v['goods']['title'].'</p>';
                    $html .= '<p class="goods_price">￥<b>'.$v['goods']['price'].'</b></p>';
                    $html .= '<p class="goods_des fr"><span id="del_history" onclick="delconfirm(\''.route('weixin_user_goods_history_delete',array('id'=>$v['id'])).'\')">删除</span></p>';
                    $html .= '</div></li>';
                }
            }

            exit(json_encode($html));
        }

        return view('weixin.collect_goods.index', $data);
    }
}
