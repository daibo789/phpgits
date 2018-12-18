<?php
/**
 * Created by PhpStorm.
 * User: daibo
 * Date: 2018/12/17
 * Time: 3:16 PM
 */

//无需token验证，全局
Route::group(['middleware' => ['web']], function () {
    Route::get('/weixin_user_recharge_order_detail', 'Weixin\UserController@userRechargeOrderDetail')->name('weixin_user_recharge_order_detail'); //微信充值支付，为了配合公众号支付授权目录
    Route::post('/api/listarc', 'Api\IndexController@listarc')->name('api_listarc');
    Route::post('/api/customer_login', 'Api\WechatAuthController@customerLogin');
    Route::post('/api/', 'Api\UserController@signin'); //签到
});

//API接口路由，无需token验证
Route::group(['prefix' => 'api', 'namespace' => 'Api', 'middleware' => ['web']], function () {
    //各种回调
    Route::any('/notify_wxpay_jsapi', 'NotifyController@wxpayJsapi')->name('notify_wxpay_jsapi'); //微信支付回调
    //轮播图
    Route::get('/slide_list', 'SlideController@slideList');
    //文章
    Route::get('/article_list', 'ArticleController@articleList');
    Route::get('/article_detail', 'ArticleController@articleDetail');
    Route::get('/arctype_list', 'ArctypeController@arctypeList');
    Route::get('/arctype_detail', 'ArctypeController@arctypeDetail');
    //单页
    Route::get('/page_list', 'PageController@pageList');
    Route::get('/page_detail', 'PageController@pageDetail');
    //商品
    Route::get('/goods_detail', 'GoodsController@goodsDetail'); //商品详情
    Route::get('/goods_list', 'GoodsController@goodsList'); //商品列表
    Route::get('/goodstype_list', 'GoodsTypeController@goodsTypeList'); //商品分类列表
    Route::get('/goods_searchword_list', 'GoodsSearchwordController@goodsSearchwordList'); //商品搜索词列表
    Route::get('/goodsbrand_detail', 'GoodsBrandController@goodsBrandDetail'); //商品品牌详情
    Route::get('/goodsbrand_list', 'GoodsBrandController@goodsBrandList'); //商品品牌列表
    //地区，省市区
    Route::get('/region_list', 'RegionController@regionList');
    Route::get('/region_detail', 'RegionController@regionDetail');
    //用户
    Route::post('/wx_register', 'UserController@wxRegister'); //注册
    Route::post('/wx_login', 'UserController@wxLogin'); //登录
    Route::post('/wx_oauth_register', 'UserController@wxOauthRegister'); //微信授权注册登录
    //可用的优惠券列表
    Route::get('/bonus_list', 'BonusController@bonusList'); //可用获取的优惠券列表
});

//API接口路由，需token验证
Route::group(['prefix' => 'api', 'namespace' => 'Api', 'middleware' => ['web','token']], function () {
    Route::post('/article_add', 'ArticleController@articleAdd'); //添加文章
    Route::post('/article_update', 'ArticleController@articleUpdate'); //修改文章
    Route::post('/article_delete', 'ArticleController@articleDelete'); //删除文章
    //用户中心
    Route::post('/user_signin', 'UserController@signin'); //签到
    Route::get('/user_info', 'UserController@userInfo'); //用户详细信息
    Route::post('/user_info_update', 'UserController@userUpdate'); //修改用户信息
    Route::post('/user_password_update', 'UserController@userPasswordUpdate'); //修改用户密码、支付密码
    Route::get('/user_list', 'UserController@userList'); //用户列表
    //用户充值
    Route::post('/user_recharge_add', 'UserRechargeController@userRechargeAdd');
    Route::get('/user_recharge_detail', 'UserRechargeController@userRechargeDetail');
    Route::get('/user_recharge_list', 'UserRechargeController@userRechargeList');
    //用户余额(钱包)
    Route::get('/user_money_list', 'UserMoneyController@userMoneyList');
    Route::post('/user_money_add', 'UserMoneyController@userMoneyAdd');
    //用户消息
    Route::get('/user_message_list', 'UserMessageController@userMessageList');
    Route::post('/user_message_add', 'UserMessageController@userMessageAdd');
    Route::post('/user_message_update', 'UserMessageController@userMessageUpdate');
    //用户提现
    Route::get('/user_withdraw_list', 'UserWithdrawController@userWithdrawList');
    Route::post('/user_withdraw_add', 'UserWithdrawController@userWithdrawAdd');
    Route::post('/user_withdraw_update', 'UserWithdrawController@userWithdrawUpdate');
    //浏览记录
    Route::get('/user_goods_history_list', 'UserGoodsHistoryController@userGoodsHistoryList'); //我的足迹列表
    Route::post('/user_goods_history_delete', 'UserGoodsHistoryController@userGoodsHistoryDelete'); //我的足迹删除一条
    Route::post('/user_goods_history_clear', 'UserGoodsHistoryController@userGoodsHistoryClear'); //我的足迹清空
    Route::post('/user_goods_history_add', 'UserGoodsHistoryController@userGoodsHistoryAdd'); //我的足迹添加
    //评价
    Route::get('/comment_list', 'CommentController@commentList'); //商品评价列表
    Route::post('/comment_add', 'CommentController@commentAdd'); //商品评价添加
    Route::post('/comment_batch_add', 'CommentController@commentBatchAdd'); //商品评价批量添加
    Route::post('/comment_update', 'CommentController@commentUpdate'); //商品评价修改
    Route::post('/comment_delete', 'CommentController@commentDelete'); //商品评价删除
    //商品收藏
    Route::get('/collect_goods_list', 'CollectGoodsController@collectGoodsList'); //收藏商品列表
    Route::post('/collect_goods_add', 'CollectGoodsController@collectGoodsAdd'); //收藏商品
    Route::post('/collect_goods_delete', 'CollectGoodsController@collectGoodsDelete'); //取消收藏商品
    //订单
    Route::post('/order_add', 'OrderController@orderAdd'); //生成订单
    Route::post('/order_update', 'OrderController@orderUpdate'); //订单修改
    Route::get('/order_list', 'OrderController@orderList'); //订单列表
    Route::get('/order_detail', 'OrderController@orderDetail'); //订单详情
    Route::post('/order_yue_pay', 'OrderController@orderYuepay'); //订单余额支付
    Route::post('/order_user_cancel', 'OrderController@userCancelOrder'); //用户取消订单
    Route::post('/order_user_receipt_confirm', 'OrderController@userReceiptConfirm'); //用户确认收货
    Route::post('/order_user_refund', 'OrderController@userOrderRefund'); //用户退款退货
    Route::post('/order_user_delete', 'OrderController@userOrderDelete'); //用户删除订单
    //购物车
    Route::get('/cart_list', 'CartController@cartList'); //购物车列表
    Route::post('/cart_clear', 'CartController@cartClear'); //清空购物车
    Route::post('/cart_add', 'CartController@cartAdd'); //添加购物车
    Route::post('/cart_delete', 'CartController@cartDelete'); //删除购物
    Route::get('/cart_checkout_goods_list', 'CartController@cartCheckoutGoodsList'); //购物车结算商品列表

    //分销

    //积分
    Route::get('/user_point_list', 'UserPointController@userPointList'); //用户积分列表
    Route::post('/user_point_add', 'UserPointController@userPointAdd');
    //优惠券
    Route::get('/user_available_bonus_list', 'UserBonusController@userAvailableBonusList'); //用户结算时获取可用优惠券列表
    Route::get('/user_bonus_list', 'UserBonusController@userBonusList'); //用户优惠券列表
    Route::post('/user_bonus_add', 'UserBonusController@userBonusAdd'); //用户获取优惠券
    Route::post('/bonus_add', 'BonusController@bonusAdd'); //添加优惠券
    Route::post('/bonus_update', 'BonusController@bonusUpdate'); //修改优惠券
    Route::post('/bonus_delete', 'BonusController@bonusDelete'); //删除优惠券
    //微信

    //意见反馈
    Route::get('/feedback_list', 'FeedBackController@feedbackList');
    Route::post('/feedback_add', 'FeedBackController@feedbackAdd');

    //其它
    Route::get('/verifycode_check', 'VerifyCodeController@verifyCodeCheck'); //验证码校验
    Route::get('/andriod_upgrade', 'IndexController@andriodUpgrade'); //安卓升级
    Route::get('/payment_list', 'PaymentController@paymentList'); //支付方式列表
    //图片上传
    Route::post('/image_upload', 'ImageController@imageUpload'); //普通文件/图片上传
    Route::post('/multiple_file_upload', 'ImageController@multipleFileUpload'); //多文件上传
    //二维码
    Route::get('/create_simple_qrcode', 'QrcodeController@createSimpleQrcode');
    //收货地址
    Route::get('/user_address_list', 'UserAddressController@userAddressList');
    Route::get('/user_address_detail', 'UserAddressController@userAddressDetail');
    Route::get('/user_default_address', 'UserAddressController@userDefaultAddress'); //获取用户默认地址
    Route::post('/user_address_setdefault', 'UserAddressController@userAddressSetDefault');
    Route::post('/user_address_add', 'UserAddressController@userAddressAdd');
    Route::post('/user_address_update', 'UserAddressController@userAddressUpdate');
    Route::post('/user_address_delete', 'UserAddressController@userAddressDelete');
});
