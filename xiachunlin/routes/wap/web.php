<?php
/**
 * Created by PhpStorm.
 * User: daibo
 * Date: 2018/12/17
 * Time: 3:04 PM
 */

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
//wap路由，要放到最前面，否则解析不到
Route::group(['prefix' => 'wap', 'namespace' => 'Wap'], function () {
    Route::get('/', 'IndexController@index')->name('wap_home');
    Route::get('/page404', 'IndexController@page404')->name('wap_page404');     //404页面
    Route::get('/tags', 'IndexController@tags')->name('wap_tags');
    Route::get('/search/{id}', 'IndexController@search')->name('wap_search');   //搜索页面
    Route::get('/p/{id}', 'IndexController@detail')->name('wap_detail');        //详情页
    Route::get('/cat{cat}/{page}', 'IndexController@category');                 //分类页，分页
    Route::get('/cat{cat}', 'IndexController@category')->name('wap_category');  //分类页
    Route::get('/tag{tag}/{page}', 'IndexController@tag');                      //标签页，分页
    Route::get('/tag{tag}', 'IndexController@tag')->name('wap_tag');            //标签页
    Route::get('/page/{id}', 'IndexController@page')->name('wap_singlepage');   //单页
    Route::get('/goods/{id}', 'IndexController@goods')->name('wap_goods');      //商品详情页
    Route::get('/goodstype{cat}', 'IndexController@goodstype')->name('wap_goodstype'); //产品分类页
    Route::get('/sitemap.xml', 'IndexController@sitemap')->name('wap_sitemap'); //sitemap
});