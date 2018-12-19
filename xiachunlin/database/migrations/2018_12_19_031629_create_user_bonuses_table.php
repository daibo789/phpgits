<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBonusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_bonuses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bonus_id')->nullable()->default(0)->comment('优惠券id');
            $table->integer('user_id')->nullable()->default(0)->comment('用户id');
            $table->integer('used_time')->nullable()->default(0)->comment('优惠券使用的时间，0表示未使用');
            $table->integer('get_time')->nullable()->default(0)->comment('优惠券获得时间');
            $table->tinyInteger('status')->nullable()->default(0)->comment('0未使用1已使用2已过期');
            $table->timestamps();
            $table->index(['user_id','status']);
        });
        DB::statement("ALTER TABLE `user_bonuses` comment'用户优惠券表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_bonuses');
    }
}
