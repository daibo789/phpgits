<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBonusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',60)->nullable()->default('')->comment('名称');
            $table->decimal('money',10,2)->nullable()->default(0.00)->comment('金额');
            $table->decimal('min_amount',10,2)->nullable()->default(0.00)->comment('满多少使用');
            $table->string('start_time')->nullable()->default('')->comment('开始时间');
            $table->string('end_time')->nullable()->default('')->comment('结束时间');
            $table->integer('point')->nullable()->default(0)->comment('兑换优惠券所需积分,如果是0表示禁止兑换');
            $table->tinyInteger('status')->nullable()->default(0)->comment('状态：0可用，1不可用');

            $table->integer('add_time')->nullable()->default(0)->comment('添加时间');
            $table->integer('num')->nullable()->default(0)->comment('优惠券数量，预留，-1表示不限');
            $table->integer('delete_time')->nullable()->default(0)->comment('删除时间,默认0未删除');
            $table->timestamps();
//            $table->unique('sn');

        });
        DB::statement("ALTER TABLE `bonuses` comment'优惠券表'"); // 表注释
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bonuses');
    }
}
