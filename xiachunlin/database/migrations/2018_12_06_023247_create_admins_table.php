<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('username')->nullable()->comment('admin');
            $table->char('pwd',32)->nullable()->comment('123456');
            $table->string('email')->nullable()->comment('邮箱');
            $table->string('mobile')->nullable()->comment('手机号');
            $table->text('avatar')->nullable()->comment('头像');
            $table->tinyInteger('status')->nullable()->default(2)->comment('用户状态 0：正常； 1：禁用 ；2：未验证');
            $table->integer('role_id')->nullable()->comment('角色id');
            $table->integer('logintime')->nullable()->comment('登录时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
