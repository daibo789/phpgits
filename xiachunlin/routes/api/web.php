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