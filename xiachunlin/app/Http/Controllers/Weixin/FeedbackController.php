<?php

namespace App\Http\Controllers\Weixin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Common\ReturnCode;
use App\Common\Wechat\UserManager;

class FeedbackController extends CommonController
{
    protected $userManager;
    public function __construct(UserManager $userManager)
    {
        parent::__construct();
        $this->userManager = $userManager;
    }


    //意见反馈添加
    public function userFeedbackAdd(Request $request)
    {
        $weixin_user_info =  $this->userManager->getUserInfo();
        $data['weixin_user_info'] = $weixin_user_info;
        return view('weixin.feedback.userFeedbackAdd',$data);
    }
}
