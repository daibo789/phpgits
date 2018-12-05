<?php
/**
 * Created by PhpStorm.
 * User: daibo
 * Date: 2018/12/5
 * Time: 5:07 PM
 */

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\CommonController;

class IndexController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        dd(dasdsadas);
//        return view('admin.index.index', $data);
    }


    //404页面
    public function page404()
    {
        return view('admin.404');
    }

}