<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserMoneysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_moneys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable()->default(0)->comment('user_id');
            $table->tinyInteger('type')->nullable()->default(0)->comment('0增加,1减少');
            $table->decimal('money')->nullable()->default(0.00)->comment('金额');
            $table->integer('add_time')->default(0)->comment('添加时间');
            $table->string('des')->default('')->comment('描述，充值');
            $table->decimal('user_money')->nullable()->default(0.00)->comment('余额，每次增减后面的金额记录');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `user_moneys` comment'用户余额明细'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_moneys');
    }
}
