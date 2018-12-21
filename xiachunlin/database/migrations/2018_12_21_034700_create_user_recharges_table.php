<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRechargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_recharges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable()->default(0)->comment('用户ID');
            $table->decimal('money',10,2)->nullable()->default(0.00)->comment('充值金额');
            $table->integer('pay_time')->nullable()->default(0)->comment('充值时间');
            $table->tinyInteger('pay_type')->nullable()->default(0)->comment('充值类型：1微信，2支付宝');
            $table->string('trade_no')->nullable()->default('')->comment('支付流水号');
            $table->tinyInteger('status')->nullable()->default(0)->comment('充值状态：0未处理，1已完成，2失败');
            $table->integer('created_at')->nullable()->default(0)->comment('添加时间');
            $table->integer('updated_at')->nullable()->default(0)->comment('更新时间');
            $table->string('recharge_sn',60)->nullable()->default('')->comment('支付订单号');
        });
        DB::statement("ALTER TABLE `user_recharges` comment'用户在线充值明细表'"); // 表注释
    }

 /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_recharges');
    }
}
