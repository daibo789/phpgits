<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
class MenuController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $posts = parent::pageList('menus');
        $data['posts'] = $posts;
        return view('admin.menu.index', $data);
    }

    public function add()
    {
        if(!empty($_GET["pid"])){$pid = $_GET["pid"];}else{$pid=0;}

        $data['pid'] = $pid;
        $data['menu'] = category_tree(get_category('menus',0));

        return view('admin.menu.add', $data);
    }

    public function doadd()
    {
        unset($_POST["_token"]);

        $menuid = DB::table('menus')->insertGetId($_POST);
        if($menuid)
        {
            DB::table('accesses')->insert(['role_id' => 1, 'menu_id' => $menuid]);

            success_jump('添加成功', route('admin_menu'));
        }
        else
        {
            error_jump('添加失败！请修改后重新添加');
        }
    }

    public function edit()
    {
        if(!empty($_GET["id"])){$id = $_GET["id"];}else{$id="";}
        if(preg_match('/[0-9]*/',$id)){}else{exit;}

        $data['id'] = $id;
        $data['post'] = object_to_array(DB::table('menus')->where('id', $id)->first(), 1);
        $data['menu'] = category_tree(get_category('menus',0));

        return view('admin.menu.edit', $data);
    }

    public function doedit()
    {
        if(!empty($_POST["id"])){$id = $_POST["id"];unset($_POST["id"]);}else {$id="";exit;}

        unset($_POST["_token"]);
        if(DB::table('menus')->where('id', $id)->update($_POST))
        {
            success_jump('修改成功', route('admin_menu'));
        }
        else
        {
            error_jump('修改失败');
        }
    }

    public function del()
    {
        if(!empty($_GET["id"])){$id = $_GET["id"];}else{error_jump('删除失败！请重新提交');}

        if(DB::table('menus')->whereIn("id", explode(',', $id))->delete())
        {
            DB::table('accesses')->where('role_id', 1)->whereIn("menu_id", explode(',', $id))->delete();

            success_jump('删除成功');
        }
        else
        {
            error_jump('删除失败！请重新提交');
        }
    }
}
