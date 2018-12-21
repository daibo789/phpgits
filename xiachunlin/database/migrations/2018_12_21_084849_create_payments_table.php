<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('listorder')->nullable()->default(0)->comment('排序');
            $table->string('pay_code')->nullable()->default('')->comment('付方式的英文缩写');
            $table->string('pay_name')->nullable()->default('')->comment('支付方式名称');
            $table->decimal('pay_fee',10,2)->nullable()->default(0.00)->comment('支付费用');
            $table->text('pay_des')->nullable()->comment('支付方式描述');
            $table->text('pay_config')->nullable()->comment('支付方式的配置信息,包括商户号和密钥什么的');
            $table->tinyInteger('status')->nullable()->default(0)->comment('是否可用;0否;1是');
            $table->unique('pay_code');
        });
        DB::statement("ALTER TABLE `payments` comment'支付方式表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
