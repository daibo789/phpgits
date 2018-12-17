<?php

namespace App\Http\Middleware;
use DB;
use Closure;

class CheckAdminMiddleware
{
    protected $except = array('admin_jump','admin','admin_login','admin_index_upconfig','admin_index_upcache','admin_welcome');
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $this->checkAdminIsLogin();
        return $next($request);
    }

    function checkAdminIsLogin(){
        $admin_user_info =  session('admin_user_info');
        //        //判断是否登录
        if($admin_user_info)
        {
            $this->user_info = $admin_user_info;
        }
        else
        {
            return redirect('admin/login');

        }

        //判断是否拥有权限
        if(session('admin_user_info')['role_id'] <> 1)
        {
            $uncheck = array('admin_jump','admin','admin_index_upconfig','admin_index_upcache','admin_welcome');

            if(in_array(\Route::currentRouteName(), $uncheck))
            {

            }
            else
            {
                $menu_id = DB::table('menus')->where('action', \Route::currentRouteName())->value('id');
                $check = DB::table('accesses')->where(['role_id' => session('admin_user_info')['role_id'], 'menu_id' => $menu_id])->first();

                if(!$check)
                {
                    error_jump('你没有权限访问，请联系管理员', route('admin'));
                }
            }
        }
    }
}
