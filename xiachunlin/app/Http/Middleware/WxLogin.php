<?php

namespace App\Http\Middleware;

use Closure;
use App\Common\Wechat\UserManager;
class WxLogin
{
    /**
     * 微信端登录验证
     */
    public function handle($request, Closure $next)
    {

        $user =  session('weixin_user_info');
//        dd($user);
        if(isset($user))
        {
        }
        else
        {
            header('Location: '.route('weixin_login'));exit;
        }

        return $next($request);
    }
}
