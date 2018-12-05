<?php
/**
 * Created by PhpStorm.
 * User: daibo
 * Date: 2018/12/5
 * Time: 5:01 PM
 */

namespace App\Http\Controllers\Admin;
use DB;

class CommonController
{
    public $user_info;

    public function __construct()
    {
        //判断是否登录
        if(isset($_SESSION['admin_user_info']))
        {
            $this->user_info = $_SESSION['admin_user_info'];
        }
        else
        {
            header("Location:".route('page404'));
            exit();
        }

        //判断是否拥有权限
        if($_SESSION['admin_user_info']['role_id'] <> 1)
        {
            $uncheck = array('admin_jump','admin','admin_index_upconfig','admin_index_upcache','admin_welcome');

            if(in_array(\Route::currentRouteName(), $uncheck))
            {

            }
            else
            {
                $menu_id = DB::table('menu')->where('action', \Route::currentRouteName())->value('id');
                $check = DB::table('access')->where(['role_id' => $_SESSION['admin_user_info']['role_id'], 'menu_id' => $menu_id])->first();

                if(!$check)
                {
                    error_jump('你没有权限访问，请联系管理员', route('admin'));
                }
            }
        }
    }
}