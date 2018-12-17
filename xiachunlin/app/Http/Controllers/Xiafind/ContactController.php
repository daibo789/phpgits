<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
    }

    //
    public function index()
    {
        return view('home.contact.index');
    }
}
