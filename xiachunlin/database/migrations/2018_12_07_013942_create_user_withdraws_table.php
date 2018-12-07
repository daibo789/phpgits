<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserWithdrawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_withdraws', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable()->default(0)->comment('用户ID');
            $table->integer('add_time')->nullable()->default(0)->comment('时间');
            $table->decimal('money')->nullable()->default(0.00)->comment('金额');
            $table->string('name')->nullable()->default('')->comment('姓名');
            $table->tinyInteger('status')->nullable()->default(0)->comment('0未处理,1处理中,2成功,3取消，4拒绝');
            $table->string('note')->nullable()->default('')->comment('用户备注');
            $table->string('re_note')->nullable()->default('')->comment('回复备注信息');
            $table->string('bank_name')->default('')->comment('银行名称');
            $table->string('bank_place')->default('')->comment('开户行');
            $table->string('account')->default('')->comment('支付宝账号或者银行卡号');
            $table->string('method')->default('')->comment('提现方式，weixin，bank，alipay');
            $table->integer('delete_time')->default(0)->comment('是否删除，0未删除');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `user_withdraws` comment'提现记录'"); // 表注释
    }




    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_withdraws');
    }
}
