<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('user_name')->nullable()->default('')->comment('用户名');
            $table->string('token')->default(null)->comment('TOKEN');
            $table->string('email')->nullable()->default('')->comment('邮箱');
            $table->char('password',32)->nullable()->default('')->comment('密码');
            $table->char('pay_password',32)->nullable()->default('')->comment('支付密码');
            $table->text('head_img')->nullable()->comment('头像');
            $table->tinyInteger('sex')->nullable()->default(1)->comment('性别1男2女');
            $table->date('birthday')->nullable()->default('1990-01-01')->comment('生日');
            $table->decimal('commission')->nullable()->default(0.00)->comment('累积佣金，只增不减，单位：元');
            $table->decimal('money')->nullable()->default(0.00)->comment('用户余额，单位：元');
            $table->decimal('frozen_money')->nullable()->default(0.00)->comment('用户冻结资金，单位：元');
            $table->integer('point')->nullable()->default(0)->comment('用户能用积分');
            $table->integer('rank_points')->nullable()->default(0)->comment('会员等级积分');
            $table->integer('address_id')->nullable()->default(0)->comment('收货信息id,表值表user_address分');
            $table->integer('add_time')->nullable()->default(0)->comment('注册时间');
            $table->tinyInteger('user_rank')->nullable()->default(0)->comment('用户等级');
            $table->integer('parent_id')->nullable()->default(0)->comment('推荐人id');
            $table->string('nickname')->nullable()->comment('昵称');
            $table->string('mobile')->nullable()->comment('手机号码');
            $table->tinyInteger('status')->nullable()->default(1)->comment('用户状态 0待审 1正常状态 2 删除至回收站 3锁定');
            $table->integer('group_id')->nullable()->default(0)->comment('分组');
            $table->string('sig_time')->nullable()->default('1990-01-01 00:00:00')->comment('签到时间');
            $table->string('openid')->nullable()->default('')->comment('openid');
            $table->string('unionid')->nullable()->default('')->comment('unionid');
            $table->string('push_id')->nullable()->default('')->comment('推送id');
            $table->string('refund_account')->nullable()->default('')->comment('退款账户，支付宝账号');
            $table->string('refund_name')->nullable()->default('')->comment('退款姓名');
            $table->decimal('consumption_money')->nullable()->default(0.00)->comment('累计消费金额');
            $table->index('token');
            $table->index('mobile');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }


    /**
     * Run the migrations.
     *
     * @return void
     */
//    public function up()
//    {
//        Schema::create('users', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('name');
//            $table->string('email')->unique();
//            $table->string('password');
//            $table->rememberToken();
//            $table->timestamps();
//        });
//    }
}
