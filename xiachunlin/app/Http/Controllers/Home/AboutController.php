<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;


class AboutController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
    }

    //
    public function index()
    {
        return view('home.about.index');
    }
}
