<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
    }

    //
    public function index()
    {
        return view('home.detail.index');
    }
}
