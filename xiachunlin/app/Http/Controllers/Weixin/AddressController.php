<?php

namespace App\Http\Controllers\Weixin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Common\ReturnCode;
use App\Common\Wechat\UserManager;


class AddressController extends CommonController
{
    protected $userManager;
    public function __construct(UserManager $userManager)
    {
        parent::__construct();
        $this->userManager = $userManager;
    }

    //收货地址列表
    public function index(Request $request)
    {
//        dd('dsa');
        $weixin_user_info = $this->userManager->getUserInfo();
        $data['weixin_user_info'] = $weixin_user_info;
        $pagesize = 10;
        $offset = 0;
        if(isset($_REQUEST['page'])){$offset = ($_REQUEST['page']-1)*$pagesize;}

        //收货地址列表
        $postdata = array(
            'limit'  => $pagesize,
            'offset' => $offset,
            'access_token' => $weixin_user_info['access_token']
        );
        $url = http_host(true)."/api/user_address_list";
        $res = curl_request($url,$postdata,'GET');
        $data['list'] = $res['data']['list'];
//        dd($res);
        $data['totalpage'] = ceil($res['data']['count']/$pagesize);
        if(isset($_REQUEST['page_ajax']) && $_REQUEST['page_ajax']==1)
        {
            $html = '';

            if($res['data']['list'])
            {

                foreach($res['data']['list'] as $k => $v)
                {
                    $html .= '<div class="flow-have-adr">';

                    if($v['is_default']==1)
                    {
                        $html .= '<p class="f-h-adr-title"><label>'.$v['name'].'</label><span class="ect-colory">'.$v['mobile'].'</span><span class="fr">默认</span></p>';
                    }
                    else
                    {
                        $html .= '<p class="f-h-adr-title"><label>'.$v['name'].'</label><span class="ect-colory">'.$v['mobile'].'</span></p>';
                    }

                    $html .= '<p class="f-h-adr-con">'.$v['province_name'].$v['city_name'].$v['district_name'].' '.$v['address'].'</p>';
                    $html .= '<div class="adr-edit-del"><a href="'.route('weixin_user_address_update',array('id'=>$v['id'])).'"><i class="iconfont icon-bianji"></i>编辑</a><a href="javascript:del('.$v['id'].');"><i class="iconfont icon-xiao10"></i>删除</a></div>';
                    $html .= '</div>';
                }
            }

            exit(json_encode($html));
        }

        return view('weixin.address.index', $data);
    }

    //收货地址添加
    public function userAddressAdd(Request $request)
    {
        $weixin_user_info = $this->userManager->getUserInfo();
        $data['weixin_user_info'] = $weixin_user_info;
        return view('weixin.address.userAddressAdd',$data);
    }

    //收货地址修改
    public function userAddressUpdate(Request $request)
    {
        $weixin_user_info = $this->userManager->getUserInfo();
        $data['weixin_user_info'] = $weixin_user_info;
        $id = $request->input('id','');

        if($id == ''){$this->error_jump(ReturnCode::NO_FOUND,route('weixin'),3);}

        $postdata = array(
            'id'  => $_REQUEST['id'],
            'access_token' => $weixin_user_info['access_token']
        );
        $url = http_host(true)."/api/user_address_detail";
        $res = curl_request($url,$postdata,'GET');
        $data['post'] = $res['data'];

        return view('weixin.address.userAddressUpdate',$data);
    }
}
