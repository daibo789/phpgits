<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeixinMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weixin_menus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->nullable()->default(0)->comment('父级菜单id');
            $table->integer('addtime')->nullable()->default(0)->comment('添加时间');
            $table->string('name',30)->default('')->comment('菜单标题，不超过16个字节，子菜单不超过60个字节');
            $table->string('type',30)->default('')->comment('菜单的响应动作类型，view表示网页类型，click表示点击，miniprogram表示小程序');
            $table->string('key',60)->default('')->comment('菜单KEY值，用于消息接口推送，不超过128字节，click等点击类型必须');
            $table->string('url',255)->default('')->comment('网页链接，用户点击菜单可打开链接，不超过1024字节。view、miniprogram类型必须，type为miniprogram时，不支持小程序的老版本客户端将打开本url。');
            $table->string('media_id',60)->default('')->comment('调用新增永久素材接口返回的合法media_id，media_id类型和view_limited类型必须');
            $table->string('appid',150)->default('')->comment('小程序的appid（仅认证公众号可配置），miniprogram类型必须');
            $table->string('pagepath',255)->default('')->comment('小程序的页面路径，miniprogram类型必须');
            $table->string('litpic',100)->default('')->comment('封面或缩略图');
            $table->integer('listorder')->nullable()->default(50)->comment('排序');
            $table->tinyInteger('is_show')->nullable()->default(0)->comment('是否显示，默认0显示，让客户看不到');
            $table->timestamps();
            $table->unique('name');
        });
        DB::statement("ALTER TABLE `weixin_menus` comment'微信菜单表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weixin_menus');
    }
}
