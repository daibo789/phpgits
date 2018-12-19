<?php
namespace App\Common\Wechat;
use Illuminate\Support\Facades\Session;

/**

 */
class UserManager {

    function saveUserInfo($weixin_user_info){
        Session::put('weixin_user_info', $weixin_user_info);
        Session::save();
    }

    function layout(){
        Session()->forget('weixin_user_info');
        Session()->flush();
        Session::save();
    }

    function getUserInfo (){
        return session('weixin_user_info');
    }
}

