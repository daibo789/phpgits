<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StaffController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
    }

    //
    public function index()
    {
        return view('home.staff.index');
    }
}
