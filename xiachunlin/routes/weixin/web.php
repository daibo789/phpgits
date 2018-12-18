<?php


//微信路由，无需登录
Route::group(['prefix' => 'wx', 'namespace' => 'Weixin'], function () {
    Route::get('/', 'IndexController@index')->name('weixin');
    Route::get('/category', 'IndexController@category')->name('weixin_category');
    Route::get('/category_goods_list', 'GoodsController@categoryGoodsList')->name('weixin_category_goods_list'); //产品分类页
    Route::get('/page404', 'IndexController@page404')->name('weixin_page404');  //404页面
    Route::get('/search', 'IndexController@search')->name('weixin_search');     //搜索页面
    Route::get('/p/{id}', 'ArticleController@detail')->name('weixin_article_detail'); //文章详情页
    Route::get('/cat{cat}', 'ArticleController@category')->name('weixin_article_category'); //分类页
    Route::get('/tag{tag}', 'IndexController@tag')->name('weixin_tag');         //标签页
    Route::get('/page/{id}', 'IndexController@page')->name('weixin_singlepage');//单页
    Route::get('/goods/{id}', 'GoodsController@goodsDetail')->name('weixin_goods_detail'); //商品详情页
    Route::get('/goodslist', 'GoodsController@goodsList')->name('weixin_goods_list'); //商品筛选列表
    Route::get('/brandlist', 'GoodsBrandController@brandList')->name('weixin_brand_list'); //品牌列表
    Route::get('/brand_detail/{id}', 'GoodsBrandController@brandDetail')->name('weixin_brand_detail'); //品牌详情

    Route::get('/bonus_list', 'BonusController@bonusList')->name('weixin_bonus_list');
    Route::any('/wxoauth', 'UserController@oauth')->name('weixin_wxoauth');     //微信网页授权
    Route::any('/login', 'UserController@login')->name('weixin_login');
    Route::any('/register', 'UserController@register')->name('weixin_register');
    Route::get('/logout', 'UserController@logout')->name('weixin_user_logout'); //退出
    //页面跳转
    Route::get('/jump', 'IndexController@jump')->name('weixin_jump');

    Route::get('/test', 'IndexController@test')->name('weixin_test');           //测试
});


//微信路由，需登录，全局
Route::group(['prefix' => 'weixin', 'namespace' => 'Weixin', 'middleware' => ['web','wxlogin']], function () {
    //个人中心
    Route::get('/user', 'UserController@index')->name('weixin_user');
    Route::get('/userinfo', 'UserController@userinfo')->name('weixin_userinfo');
    Route::get('/user_account', 'UserController@userAccount')->name('weixin_user_account');
    Route::get('/user_money_list', 'UserController@userMoneyList')->name('weixin_user_money_list');
    Route::get('/user_point_list', 'UserController@userPointList')->name('weixin_user_point_list');
    Route::get('/user_message_list', 'UserController@userMessageList')->name('weixin_user_message_list');
    Route::get('/user_distribution', 'UserController@userDistribution')->name('weixin_user_distribution');
    Route::any('/user_withdraw', 'UserController@userWithdraw')->name('weixin_user_withdraw');
    Route::get('/user_withdraw_list', 'UserController@userWithdrawList')->name('weixin_user_withdraw_list');
    //用户充值
    Route::get('/user_recharge', 'UserController@userRecharge')->name('weixin_user_recharge');
    Route::get('/user_recharge_order', 'UserController@userRechargeOrder')->name('weixin_user_recharge_order');
    //优惠券、红包
    Route::get('/user_bonus_list', 'UserController@userBonusList')->name('weixin_user_bonus_list');
    //浏览记录
    Route::get('/user_goods_history', 'UserController@userGoodsHistory')->name('weixin_user_goods_history');
    Route::get('/user_goods_history_delete', 'UserController@userGoodsHistoryDelete')->name('weixin_user_goods_history_delete');
    Route::get('/user_goods_history_clear', 'UserController@userGoodsHistoryClear')->name('weixin_user_goods_history_clear');
    //商品收藏
    Route::get('/collect_goods', 'CollectGoodsController@index')->name('weixin_user_collect_goods');
    //购物车
    Route::get('/cart', 'CartController@index')->name('weixin_cart');
    Route::get('/cart_checkout/{ids}', 'CartController@cartCheckout')->name('weixin_cart_checkout');
    Route::post('/cart_done', 'CartController@cartDone')->name('weixin_cart_done');
    //订单
    Route::get('/order_pay/{id}', 'OrderController@pay')->name('weixin_order_pay'); //订单支付
    Route::post('/order_dopay', 'OrderController@dopay')->name('weixin_order_dopay'); //订单支付
    Route::get('/order_list', 'OrderController@orderList')->name('weixin_order_list'); //全部订单列表
    Route::get('/order_detail', 'OrderController@orderDetail')->name('weixin_order_detail'); //订单详情
    Route::get('/order_yuepay', 'OrderController@orderYuepay')->name('weixin_order_yuepay'); //订单余额支付
    Route::get('/order_wxpay', 'OrderController@orderWxpay')->name('weixin_order_wxpay'); //订单微信支付
    Route::any('/order_comment', 'OrderController@orderComment')->name('weixin_order_comment'); //订单评价
    //收货地址
    Route::get('/user_address', 'AddressController@index')->name('weixin_user_address_list');
    Route::get('/user_address_add', 'AddressController@userAddressAdd')->name('weixin_user_address_add');
    Route::get('/user_address_update', 'AddressController@userAddressUpdate')->name('weixin_user_address_update');
    //意见反馈
    Route::get('/user_feedback_add', 'FeedbackController@userFeedbackAdd')->name('weixin_user_feedback_add');
});