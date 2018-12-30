<?php

namespace App\Http\Controllers\Mine;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __construct()
    {
//        parent::__construct();
    }

    //首页
    public function index()
    {
        return view('mine.index.index');
    }
}
