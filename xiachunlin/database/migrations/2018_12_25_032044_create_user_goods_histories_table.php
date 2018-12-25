<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserGoodsHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_goods_histories', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('goods_id')->nullable()->default(0)->comment('商品ID');
            $table->integer('user_id')->nullable()->default(0)->comment('会员ID');
            $table->integer('add_time')->nullable()->default(0)->comment('浏览时间');
            $table->timestamps();
//            $table->unique('pay_code');
//            $table->index('order_id');
            $table->index('user_id');
        });
        DB::statement("ALTER TABLE `user_goods_histories` comment'商品浏览历史表'"); // 表注释
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_goods_histories');
    }
}
