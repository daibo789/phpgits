<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_points', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable()->default(0)->comment('商品ID');
            $table->integer('point')->nullable()->default(0)->comment('积分');
            $table->integer('add_time')->nullable()->default(0)->comment('添加时间');
            $table->string('des')->nullable()->default('')->comment('备注');
            $table->integer('user_point')->nullable()->default(0)->comment('每次增减后的积分');
            $table->tinyInteger('type')->nullable()->default(0)->comment('0增加,1减少');
            $table->timestamps();
//            $table->unique('pay_code');
//            $table->index('order_id');
//            $table->index('user_id');
        });
        DB::statement("ALTER TABLE `user_points` comment'用户积分明细'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_points');
    }
}
