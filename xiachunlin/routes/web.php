<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

//公共
include_once 'compubic/wab.php';
//我的wap端
include_once 'wap/web.php';
//后台
include_once 'admin/web.php';
//默认前台
include_once 'home/web.php';
//我的商店
include_once 'shop/web.php';
//API
include_once 'api/web.php';
//微信
include_once 'weixin/web.php';