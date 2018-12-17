<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use DB;

class IndexController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
    }

    //首页
    public function index()
    {
        //获取轮播
        $slide_list = DB::table('slides')->where(['group_id'=>0,'type'=>0,'is_show'=>0])->take(10)->orderBy('listorder','asc')->get();
        //获取所有文章分类
        $category = DB::table('arctypes')->where(['is_show'=>0])->get();
        $arctype_list = [];
        foreach ($category as $v){
            $child_data = DB::table('articles')->where(['typeid'=>$v->id])->first();
            if (count($child_data) > 0){
                $arctype_list[] = $child_data;
            }
        }
        $data['slide_list'] = object_to_array($slide_list);
        $data['arctype_list'] = $arctype_list;


        return view('home.index.index',$data);
    }


    //错误
    public function page404()
    {

        return view('home.page404');
    }

}
