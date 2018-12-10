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
        return view('home.index.index');
    }


    //错误
    public function page404()
    {

        return view('home.page404');
    }

}
