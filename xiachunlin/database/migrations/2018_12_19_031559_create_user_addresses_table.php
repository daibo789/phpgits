<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable()->default(0)->comment('用户id');
            $table->string('name',60)->default('')->comment('收货人的名字');
            $table->integer('country')->nullable()->default(0)->comment('货人的国家');
            $table->integer('province')->nullable()->default(0)->comment('收货人的省份');
            $table->integer('city')->nullable()->default(0)->comment('收货人城市');
            $table->integer('district')->nullable()->default(0)->comment('收货人的地区');
            $table->string('address',120)->default('')->comment('收货人的详细地址');
            $table->string('zipcode',60)->default('')->comment('收货人的邮编');
            $table->string('telphone',60)->default('')->comment('收货人的电话');
            $table->string('mobile',60)->default('')->comment('收货人的手机号');
            $table->tinyInteger('is_default')->nullable()->default(0)->comment('是否默认,0:为非默认,1:默认');
            $table->timestamps();
            $table->index(['user_id']);
        });
        DB::statement("ALTER TABLE `user_addresses` comment'收货地址表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_addresses');
    }
}
