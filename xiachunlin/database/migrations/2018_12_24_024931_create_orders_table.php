<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_sn')->nullable()->default('')->comment('订单号');
            $table->integer('user_id')->nullable()->default(0)->comment('用户id');
            $table->integer('shop_id')->nullable()->default(0)->comment('商家id');
            $table->integer('add_time')->nullable()->default(0)->comment('订单生成时间');
            $table->tinyInteger('order_status')->nullable()->default(0)->comment('订单状态，0生成订单,1已取消(客户触发),2无效(管理员触发),3完成订单');
            $table->tinyInteger('refund_status')->nullable()->default(0)->comment('退货退款(订单完成后)，0无退货，1有退货，2退货成功，3拒绝');
            $table->tinyInteger('shipping_status')->nullable()->default(0)->comment('商品配送情况;0未发货,1已发货,2已收货');
            $table->tinyInteger('pay_status')->nullable()->default(0)->comment('支付状态;0未付款;1已付款');
            $table->decimal('goods_amount',10,2)->nullable()->default(0.00)->comment('商品的总金额');
            $table->decimal('order_amount',10,2)->nullable()->default(0.00)->comment('应付金额=商品总价+运费-优惠(积分、红包)');
            $table->decimal('discount',10,2)->nullable()->default(0.00)->comment('优惠金额');
            $table->decimal('pay_money',10,2)->nullable()->default(0.00)->comment('优惠金额');
            $table->tinyInteger('pay_id')->nullable()->default(0)->comment('支付方式，与payment表id对应');
            $table->integer('pay_time')->nullable()->default(0)->comment('订单支付时间');
            $table->string('pay_name',30)->nullable()->default('')->comment('支付方式名称，wxpay_jsapi');
            $table->string('trade_no',60)->nullable()->default('')->comment('支付订单号');
            $table->string('shipping_name',20)->nullable()->default('')->comment('配送方式名称');
            $table->tinyInteger('shipping_id')->nullable()->default(0)->comment('配送方式');
            $table->string('shipping_sn',30)->nullable()->default('')->comment('发货单');
            $table->decimal('shipping_fee',10,2)->nullable()->default(0.00)->comment('配送费用');
            $table->integer('shipping_time')->nullable()->default(0)->comment('发货时间');
            $table->string('name',10)->nullable()->default('')->comment('收货人姓名');
            $table->integer('province')->nullable()->default(0)->comment('省份');
            $table->integer('city')->nullable()->default(0)->comment('城市');
            $table->integer('district')->nullable()->default(0)->comment('区域');
            $table->string('address')->nullable()->default('')->comment('地址');
            $table->string('zipcode',10)->nullable()->default('')->comment('邮编');
            $table->string('mobile',60)->nullable()->default('')->comment('电话');
            $table->string('message',250)->nullable()->default('')->comment('买家留言');
            $table->tinyInteger('is_comment')->nullable()->default(0)->comment('是否评论，1已评价');
            $table->decimal('integral_money',10,2)->nullable()->default(0.00)->comment('使用积分金额');
            $table->integer('integral')->nullable()->default(0)->comment('使用的积分的数量');
            $table->decimal('bonus_money',10,2)->nullable()->default(0.00)->comment('使用优惠劵支付金额');
            $table->integer('bonus_id')->nullable()->default(0)->comment('优惠券id');
            $table->tinyInteger('is_delete')->nullable()->default(0)->comment('是否删除，1删除');
            $table->string('note',250)->nullable()->default('')->comment('商家/后台操作备注');
            $table->tinyInteger('invoice')->nullable()->default(0)->comment('发票：0不索要，1个人，2企业');
            $table->string('invoice_title',250)->nullable()->default('')->comment('发票抬头');
            $table->string('invoice_taxpayer_number',100)->nullable()->default('')->comment('纳税人识别号');
            $table->tinyInteger('place_type')->nullable()->default(0)->comment('订单来源,1pc，2weixin，3app，4wap');
            $table->integer('updated_at')->nullable()->default(0)->comment('更新时间');
            $table->unique('order_sn');
            $table->index('user_id');
        });
        DB::statement("ALTER TABLE `orders` comment'订单表'"); // 表注释
    }

/**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
