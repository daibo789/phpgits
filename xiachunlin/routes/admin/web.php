<?php
/**
 * Created by PhpStorm.
 * User: daibo
 * Date: 2018/12/5
 * Time: 5:00 PM
 */

//后台路由
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['web']], function () {
    Route::get('/', 'IndexController@index')->name('admin');
    Route::get('/page404', 'IndexController@page404')->name('wap_page404');     //404页面
    Route::get('/welcome', 'IndexController@welcome')->name('admin_welcome');
    Route::get('/index/upconfig', 'IndexController@upconfig')->name('admin_index_upconfig'); //更新系统参数配置
    Route::get('/index/upcache', 'IndexController@upcache')->name('admin_index_upcache'); //更新缓存
});