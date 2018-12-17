<?php



//前台路由
Route::group(['prefix' => 'shop','namespace' => 'Shop'], function () {
    Route::get('/', 'IndexController@index')->name('shop');
    Route::get('/page404', 'IndexController@page404')->name('shop_page404');         //404页面
    Route::get('/tags', 'IndexController@tags')->name('shop_tags');
    Route::get('/search/{id}', 'IndexController@search')->name('shop_search');  //搜索页面
    Route::get('/p/{id}', 'IndexController@detail')->name('shop_detail');       //详情页
    Route::get('/cat{cat}/{page}', 'IndexController@category');                 //分类页，分页
    Route::get('/cat{cat}', 'IndexController@category')->name('shop_category'); //分类页
    Route::get('/arclist', 'IndexController@arclist')->name('shop_arclist');    //文章列表
    Route::get('/tag{tag}/{page}', 'IndexController@tag');                      //标签页，分页
    Route::get('/tag{tag}', 'IndexController@tag')->name('shop_tag');           //标签页
    Route::get('/page/{id}', 'IndexController@page')->name('shop_singlepage');  //单页
    Route::get('/goods/{id}', 'IndexController@goods')->name('shop_goods');     //商品详情页
    Route::get('/goodslist', 'IndexController@goodslist')->name('shop_goodslist'); //产品分类页
    Route::get('/brandlist', 'IndexController@brandList')->name('shop_brandlist'); //品牌列表
    Route::get('/sitemap.xml', 'IndexController@sitemap')->name('shop_sitemap');//sitemap
    Route::get('/wx_checksignature', 'IndexController@checksignature')->name('shop_wx_checksignature');

    Route::get('/test', 'IndexController@test')->name('shop_test');             //测试
    Route::get('/aaa', function () {
    });
});