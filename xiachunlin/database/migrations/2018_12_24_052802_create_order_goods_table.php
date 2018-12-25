<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_goods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->nullable()->default(0)->comment('订单id');
            $table->integer('goods_id')->nullable()->default(0)->comment('商品id');
            $table->string('goods_name',120)->nullable()->default('')->comment('商品名称');
            $table->integer('goods_number')->nullable()->default(1)->comment('商品数量');
            $table->decimal('market_price',10,2)->nullable()->default(0.00)->comment('市场价格');
            $table->decimal('goods_price',10,2)->nullable()->default(0.00)->comment('商品价格');
            $table->text('goods_attr')->nullable()->comment('商品属性');
            $table->string('goods_img',150)->nullable()->default('')->comment('商品缩略图');
            $table->tinyInteger('refund_status')->nullable()->default(0)->comment('退货状态，0无退货，1退款中，2退款成功，3不同意退款');
            $table->string('refund_reason',150)->nullable()->default('')->comment('退货原因，客户操作');
            $table->string('refund_handle_des',240)->nullable()->default('')->comment('退货处理结果，管理员操作');
            $table->string('refund_sn',30)->nullable()->default('')->comment('退货单号');
//            $table->unique('pay_code');
            $table->index('order_id');
            $table->index('goods_id');
        });
        DB::statement("ALTER TABLE `order_goods` comment'订单商品表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_goods');
    }
}
