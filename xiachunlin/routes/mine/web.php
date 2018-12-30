<?php
///前台路由
Route::group(['prefix' => '/','namespace' => 'Mine'], function () {
    Route::get('/', 'IndexController@index')->name('mine_home');
//    Route::get('/about', 'AboutController@index')->name('home_about');          //关于
//    Route::get('/staff', 'StaffController@index')->name('home_staff');           //员工
//    Route::get('/contact', 'ContactController@index')->name('home_contact');      //联系人
//    Route::get('/datail', 'DetailController@index')->name('home_datail');      //详情
//    Route::get('/page404', 'IndexController@page404')->name('page404');         //404页面
});