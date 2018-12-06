<?php
/**
 * Created by PhpStorm.
 * User: daibo
 * Date: 2018/12/5
 * Time: 5:07 PM
 */

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\CommonController;
use App\Model\Admin\Menu;

class IndexController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $admin_user_info =  session('admin_user_info');
        $leftmenu = new Menu();
        $data['menus'] = $leftmenu::getPermissionsMenu($admin_user_info['role_id']);
        return view('admin.index.index',$data);
    }


    //404页面
    public function page404()
    {
        return view('admin.index.404');
    }

    public function welcome()
    {
        return view('admin.index.welcome');
    }


    //更新配置
    public function upconfig()
    {
        cache()->forget('sysconfig'); //删除缓存
        success_jump('更新成功');
    }

    //更新缓存
    public function upcache()
    {
        cache()->forget('sysconfig'); //删除缓存
        dir_delete(storage_path().'/framework/cache/data/');
        success_jump('更新成功');
    }
}