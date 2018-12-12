<?php
/**
 * Created by PhpStorm.
 * User: daibo
 * Date: 2018/12/5
 * Time: 5:00 PM
 */

//后台路由
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['admin.auth']], function () {
    Route::get('/', 'IndexController@index')->name('admin');
    Route::get('/page404', 'IndexController@page404')->name('page404');     //404页面
    Route::get('/welcome', 'IndexController@welcome')->name('admin_welcome');
    Route::get('/index/upconfig', 'IndexController@upconfig')->name('admin_index_upconfig'); //更新系统参数配置
    Route::get('/index/upcache', 'IndexController@upcache')->name('admin_index_upcache'); //更新缓存
    //文章
    Route::get('/article', 'ArticleController@index')->name('admin_article');
    Route::get('/article/add', 'ArticleController@add')->name('admin_article_add');
    Route::post('/article/doadd', 'ArticleController@doadd')->name('admin_article_doadd');
    Route::get('/article/edit', 'ArticleController@edit')->name('admin_article_edit');
    Route::post('/article/doedit', 'ArticleController@doedit')->name('admin_article_doedit');
    Route::get('/article/del', 'ArticleController@del')->name('admin_article_del');
    Route::get('/article/repetarc', 'ArticleController@repetarc')->name('admin_article_repetarc');
    Route::get('/article/recommendarc', 'ArticleController@recommendarc')->name('admin_article_recommendarc');
    Route::get('/article/articleexists', 'ArticleController@articleexists')->name('admin_article_articleexists');
    //栏目/
    Route::get('/category', 'CategoryController@index')->name('admin_category');
    Route::get('/category/add', 'CategoryController@add')->name('admin_category_add');
    Route::post('/category/doadd', 'CategoryController@doadd')->name('admin_category_doadd');
    Route::get('/category/edit', 'CategoryController@edit')->name('admin_category_edit');
    Route::post('/category/doedit', 'CategoryController@doedit')->name('admin_category_doedit');
    Route::get('/category/del', 'CategoryController@del')->name('admin_category_del');
    //标签
    Route::get('/tag', 'TagController@index')->name('admin_tag');
    Route::get('/tag/add', 'TagController@add')->name('admin_tag_add');
    Route::post('/tag/doadd', 'TagController@doadd')->name('admin_tag_doadd');
    Route::get('/tag/edit', 'TagController@edit')->name('admin_tag_edit');
    Route::post('/tag/doedit', 'TagController@doedit')->name('admin_tag_doedit');
    Route::get('/tag/del', 'TagController@del')->name('admin_tag_del');
    //单页
    Route::get('/page', 'PageController@index')->name('admin_page');
    Route::get('/page/add', 'PageController@add')->name('admin_page_add');
    Route::post('/page/doadd', 'PageController@doadd')->name('admin_page_doadd');
    Route::get('/page/edit', 'PageController@edit')->name('admin_page_edit');
    Route::post('/page/doedit', 'PageController@doedit')->name('admin_page_doedit');
    Route::get('/page/del', 'PageController@del')->name('admin_page_del');
    //产品
    Route::get('/goods', 'GoodsController@index')->name('admin_goods');
    Route::get('/goods/add', 'GoodsController@add')->name('admin_goods_add');
    Route::post('/goods/doadd', 'GoodsController@doadd')->name('admin_goods_doadd');
    Route::get('/goods/edit', 'GoodsController@edit')->name('admin_goods_edit');
    Route::post('/goods/doedit', 'GoodsController@doedit')->name('admin_goods_doedit');
    Route::get('/goods/del', 'GoodsController@del')->name('admin_goods_del');
    Route::get('/goods/recommendarc', 'GoodsController@recommendarc')->name('admin_goods_recommendarc');
    Route::get('/goods/articleexists', 'GoodsController@goodsexists')->name('admin_goods_goodsexists');
    //产品分类
    Route::get('/goodstype', 'GoodsTypeController@index')->name('admin_goodstype');
    Route::get('/goodstype/add', 'GoodsTypeController@add')->name('admin_goodstype_add');
    Route::post('/goodstype/doadd', 'GoodsTypeController@doadd')->name('admin_goodstype_doadd');
    Route::get('/goodstype/edit', 'GoodsTypeController@edit')->name('admin_goodstype_edit');
    Route::post('/goodstype/doedit', 'GoodsTypeController@doedit')->name('admin_goodstype_doedit');
    Route::get('/goodstype/del', 'GoodsTypeController@del')->name('admin_goodstype_del');
    //订单
    Route::get('/order', 'OrderController@index')->name('admin_order');
    Route::get('/order/detail', 'OrderController@detail')->name('admin_order_detail');
    Route::get('/order/edit', 'OrderController@edit')->name('admin_order_edit');
    Route::post('/order/doedit', 'OrderController@doedit')->name('admin_order_doedit');
    Route::get('/order/del', 'OrderController@del')->name('admin_order_del');
    Route::any('/order/output_excel', 'OrderController@outputExcel')->name('admin_order_output_excel');
    Route::post('/order/change_shipping', 'OrderController@changeShipping')->name('admin_order_change_shipping');
    Route::post('/order/change_status', 'OrderController@changeStatus')->name('admin_order_change_status');
    //快递管理
    Route::get('/kuaidi', 'KuaidiController@index')->name('admin_kuaidi');
    Route::any('/kuaidi/add', 'KuaidiController@add')->name('admin_kuaidi_add');
    Route::any('/kuaidi/edit', 'KuaidiController@edit')->name('admin_kuaidi_edit');
    Route::get('/kuaidi/del', 'KuaidiController@del')->name('admin_kuaidi_del');
    //优惠券管理
    Route::get('/bonus', 'BonusController@index')->name('admin_bonus');
    Route::any('/bonus/add', 'BonusController@add')->name('admin_bonus_add');
    Route::any('/bonus/edit', 'BonusController@edit')->name('admin_bonus_edit');
    Route::get('/bonus/del', 'BonusController@del')->name('admin_bonus_del');
    //商品品牌
    Route::get('/goodsbrand', 'GoodsBrandController@index')->name('admin_goodsbrand');
    Route::get('/goodsbrand/add', 'GoodsBrandController@add')->name('admin_goodsbrand_add');
    Route::post('/goodsbrand/doadd', 'GoodsBrandController@doadd')->name('admin_goodsbrand_doadd');
    Route::get('/goodsbrand/edit', 'GoodsBrandController@edit')->name('admin_goodsbrand_edit');
    Route::post('/goodsbrand/doedit', 'GoodsBrandController@doedit')->name('admin_goodsbrand_doedit');
    Route::get('/goodsbrand/del', 'GoodsBrandController@del')->name('admin_goodsbrand_del');
    //友情链接
    Route::get('/friendlink', 'FriendlinkController@index')->name('admin_friendlink');
    Route::get('/friendlink/add', 'FriendlinkController@add')->name('admin_friendlink_add');
    Route::post('/friendlink/doadd', 'FriendlinkController@doadd')->name('admin_friendlink_doadd');
    Route::get('/friendlink/edit', 'FriendlinkController@edit')->name('admin_friendlink_edit');
    Route::post('/friendlink/doedit', 'FriendlinkController@doedit')->name('admin_friendlink_doedit');
    Route::get('/friendlink/del', 'FriendlinkController@del')->name('admin_friendlink_del');
    //关键词管理
    Route::get('/keyword', 'KeywordController@index')->name('admin_keyword');
    Route::get('/keyword/add', 'KeywordController@add')->name('admin_keyword_add');
    Route::post('/keyword/doadd', 'KeywordController@doadd')->name('admin_keyword_doadd');
    Route::get('/keyword/edit', 'KeywordController@edit')->name('admin_keyword_edit');
    Route::post('/keyword/doedit', 'KeywordController@doedit')->name('admin_keyword_doedit');
    Route::get('/keyword/del', 'KeywordController@del')->name('admin_keyword_del');
    //搜索关键词
    Route::get('/searchword', 'SearchwordController@index')->name('admin_searchword');
    Route::get('/searchword/add', 'SearchwordController@add')->name('admin_searchword_add');
    Route::post('/searchword/doadd', 'SearchwordController@doadd')->name('admin_searchword_doadd');
    Route::get('/searchword/edit', 'SearchwordController@edit')->name('admin_searchword_edit');
    Route::post('/searchword/doedit', 'SearchwordController@doedit')->name('admin_searchword_doedit');
    Route::get('/searchword/del', 'SearchwordController@del')->name('admin_searchword_del');
    //幻灯片
    Route::get('/slide', 'SlideController@index')->name('admin_slide');
    Route::get('/slide/add', 'SlideController@add')->name('admin_slide_add');
    Route::post('/slide/doadd', 'SlideController@doadd')->name('admin_slide_doadd');
    Route::get('/slide/edit', 'SlideController@edit')->name('admin_slide_edit');
    Route::post('/slide/doedit', 'SlideController@doedit')->name('admin_slide_doedit');
    Route::get('/slide/del', 'SlideController@del')->name('admin_slide_del');
    //在线留言管理
    Route::get('/guestbook', 'GuestbookController@index')->name('admin_guestbook');
    Route::get('/guestbook/del', 'GuestbookController@del')->name('admin_guestbook_del');
    //系统参数配置
    Route::get('/sysconfig', 'SysconfigController@index')->name('admin_sysconfig');
    Route::get('/sysconfig/add', 'SysconfigController@add')->name('admin_sysconfig_add');
    Route::post('/sysconfig/doadd', 'SysconfigController@doadd')->name('admin_sysconfig_doadd');
    Route::get('/sysconfig/edit', 'SysconfigController@edit')->name('admin_sysconfig_edit');
    Route::post('/sysconfig/doedit', 'SysconfigController@doedit')->name('admin_sysconfig_doedit');
    Route::get('/sysconfig/del', 'SysconfigController@del')->name('admin_sysconfig_del');
    //意见反馈
    Route::get('/feedback', 'FeedbackController@index')->name('admin_feedback');
    Route::get('/feedback/add', 'FeedbackController@add')->name('admin_feedback_add');
    Route::post('/feedback/doadd', 'FeedbackController@doadd')->name('admin_feedback_doadd');
    Route::get('/feedback/edit', 'FeedbackController@edit')->name('admin_feedback_edit');
    Route::post('/feedback/doedit', 'FeedbackController@doedit')->name('admin_feedback_doedit');
    Route::get('/feedback/del', 'FeedbackController@del')->name('admin_feedback_del');
    //会员管理
    Route::get('/user', 'UserController@index')->name('admin_user');
    Route::any('/user/add', 'UserController@add')->name('admin_user_add');
    Route::any('/user/edit', 'UserController@edit')->name('admin_user_edit');
    Route::get('/user/del', 'UserController@del')->name('admin_user_del');
    Route::get('/user/money', 'UserController@money')->name('admin_user_money'); //会员账户记录
    Route::any('/user/manual_recharge', 'UserController@manualRecharge')->name('admin_user_manual_recharge'); //人工充值
    //会员管理
    Route::get('/userrank', 'UserRankController@index')->name('admin_userrank');
    Route::any('/userrank/add', 'UserRankController@add')->name('admin_userrank_add');
    Route::any('/userrank/edit', 'UserRankController@edit')->name('admin_userrank_edit');
    Route::get('/userrank/del', 'UserRankController@del')->name('admin_userrank_del');
    //提现申请
    Route::get('/userwithdraw', 'UserWithdrawController@index')->name('admin_userwithdraw');
    Route::get('/userwithdraw/edit', 'UserWithdrawController@edit')->name('admin_userwithdraw_edit');
    Route::post('/userwithdraw/doedit', 'UserWithdrawController@doedit')->name('admin_userwithdraw_doedit');
    Route::post('/userwithdraw/change_status', 'UserWithdrawController@changeStatus')->name('admin_userwithdraw_change_status');
    //管理员管理
    Route::get('/admin', 'AdminController@index')->name('admin_admin');
    Route::get('/admin/add', 'AdminController@add')->name('admin_admin_add');
    Route::post('/admin/doadd', 'AdminController@doadd')->name('admin_admin_doadd');
    Route::get('/admin/edit', 'AdminController@edit')->name('admin_admin_edit');
    Route::post('/admin/doedit', 'AdminController@doedit')->name('admin_admin_doedit');
    Route::get('/admin/del', 'AdminController@del')->name('admin_admin_del');
    //角色管理
    Route::get('/adminrole', 'AdminRoleController@index')->name('admin_adminrole');
    Route::get('/adminrole/add', 'AdminRoleController@add')->name('admin_adminrole_add');
    Route::post('/adminrole/doadd', 'AdminRoleController@doadd')->name('admin_adminrole_doadd');
    Route::get('/adminrole/edit', 'AdminRoleController@edit')->name('admin_adminrole_edit');
    Route::post('/adminrole/doedit', 'AdminRoleController@doedit')->name('admin_adminrole_doedit');
    Route::get('/adminrole/del', 'AdminRoleController@del')->name('admin_adminrole_del');
    Route::get('/adminrole/permissions', 'AdminRoleController@permissions')->name('admin_adminrole_permissions'); //权限设置
    Route::post('/adminrole/dopermissions', 'AdminRoleController@dopermissions')->name('admin_adminrole_dopermissions');
    //菜单管理
    Route::get('/menu', 'MenuController@index')->name('admin_menu');
    Route::get('/menu/add', 'MenuController@add')->name('admin_menu_add');
    Route::post('/menu/doadd', 'MenuController@doadd')->name('admin_menu_doadd');
    Route::get('/menu/edit', 'MenuController@edit')->name('admin_menu_edit');
    Route::post('/menu/doedit', 'MenuController@doedit')->name('admin_menu_doedit');
    Route::get('/menu/del', 'MenuController@del')->name('admin_menu_del');
    //微信自定义菜单管理
    Route::get('/weixinmenu', 'WeixinMenuController@index')->name('admin_weixinmenu');
    Route::get('/weixinmenu/add', 'WeixinMenuController@add')->name('admin_weixinmenu_add');
    Route::post('/weixinmenu/doadd', 'WeixinMenuController@doadd')->name('admin_weixinmenu_doadd');
    Route::get('/weixinmenu/edit', 'WeixinMenuController@edit')->name('admin_weixinmenu_edit');
    Route::post('/weixinmenu/doedit', 'WeixinMenuController@doedit')->name('admin_weixinmenu_doedit');
    Route::get('/weixinmenu/del', 'WeixinMenuController@del')->name('admin_weixinmenu_del');
    Route::get('/weixinmenu/createmenu', 'WeixinMenuController@createmenu')->name('admin_weixinmenu_createmenu'); //生成自定义菜单
    //教师管理
    Route::get('/teachermenu', 'WeixinMenuController@index')->name('school_default');
    Route::get('/teachermenus', 'WeixinMenuController@index')->name('admin_student');
    Route::get('/teachermenu', 'WeixinMenuController@index')->name('admin_teacher');
    //后台登录注销
    Route::get('/login', 'LoginController@login')->name('admin_login');
    Route::post('/dologin', 'LoginController@dologin')->name('admin_dologin');
    Route::get('/logout', 'LoginController@logout')->name('admin_logout');
    Route::get('/recoverpwd', 'LoginController@recoverpwd')->name('admin_recoverpwd');
    //页面跳转
    Route::get('/jump', 'LoginController@jump')->name('admin_jump');
    //测试
    Route::get('/test', 'LoginController@test')->name('admin_test');
});