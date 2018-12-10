<?php
/**
 * Created by PhpStorm.
 * User: daibo
 * Date: 2018/12/5
 * Time: 23:17
 */


//前台路由
Route::group(['prefix' => '/','namespace' => 'Home'], function () {
    Route::get('/', 'IndexController@index')->name('home');
    Route::get('/about', 'AboutController@index')->name('home_about');          //关于
    Route::get('/staff', 'StaffController@index')->name('home_staff');           //员工
    Route::get('/contact', 'ContactController@index')->name('home_contact');      //联系人
    Route::get('/datail', 'DetailController@index')->name('home_datail');      //详情
    Route::get('/page404', 'IndexController@page404')->name('page404');         //404页面
});


//前台路由
//Route::group(['prefix' => 'h','namespace' => 'Home'], function () {
//    Route::get('/', 'IndexController@index')->name('home');
//    Route::get('/page404', 'IndexController@page404')->name('page404');         //404页面
//    Route::get('/tags', 'IndexController@tags')->name('home_tags');
//    Route::get('/search/{id}', 'IndexController@search')->name('home_search');  //搜索页面
//    Route::get('/p/{id}', 'IndexController@detail')->name('home_detail');       //详情页
//    Route::get('/cat{cat}/{page}', 'IndexController@category');                 //分类页，分页
//    Route::get('/cat{cat}', 'IndexController@category')->name('home_category'); //分类页
//    Route::get('/arclist', 'IndexController@arclist')->name('home_arclist');    //文章列表
//    Route::get('/tag{tag}/{page}', 'IndexController@tag');                      //标签页，分页
//    Route::get('/tag{tag}', 'IndexController@tag')->name('home_tag');           //标签页
//    Route::get('/page/{id}', 'IndexController@page')->name('home_singlepage');  //单页
//    Route::get('/goods/{id}', 'IndexController@goods')->name('home_goods');     //商品详情页
//    Route::get('/goodslist', 'IndexController@goodslist')->name('home_goodslist'); //产品分类页
//    Route::get('/brandlist', 'IndexController@brandList')->name('home_brandlist'); //品牌列表
//    Route::get('/sitemap.xml', 'IndexController@sitemap')->name('home_sitemap');//sitemap
//    Route::get('/wx_checksignature', 'IndexController@checksignature')->name('home_wx_checksignature');
//
//    Route::get('/test', 'IndexController@test')->name('home_test');             //测试
//    Route::get('/aaa', function () {
//    });
//});