<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable()->default(0)->comment('用户ID');
            $table->integer('goods_id')->nullable()->default(0)->comment('商品id');
            $table->integer('shop_id')->nullable()->default(0)->comment('商品所属的商店id，预留');
            $table->integer('goods_number')->nullable()->default(0)->comment('商品数量');
            $table->text('goods_attr')->nullable()->comment('商品属性');
            $table->tinyInteger('type')->nullable()->default(0)->comment('购物车商品类型;0普通;1团够;2拍卖;3抢');
            $table->integer('add_time')->nullable()->default(0)->comment('购物车表');
        });
        DB::statement("ALTER TABLE `carts` comment'用户在线充值明细表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
