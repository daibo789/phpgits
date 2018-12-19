<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collect_goods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable()->default(0)->comment('该条收藏记录的会员id，取值于users的user_id');
            $table->integer('goods_id')->nullable()->default(0)->comment('收藏的商品id，取值于goods的goods_id');
            $table->integer('add_time')->nullable()->default(0)->comment('收藏时间');
            $table->tinyInteger('is_attention')->nullable()->default(0)->comment('是否关注该收藏商品;1是;0否');
            $table->timestamps();
            $table->index(['user_id']);
            $table->index(['goods_id']);
            $table->index(['is_attention']);
        });
        DB::statement("ALTER TABLE `collect_goods` comment'商品/文章收藏表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collect_goods');
    }
}
