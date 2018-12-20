<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedBacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feed_backs', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content')->comment('意见反馈内容');
            $table->integer('add_time')->nullable()->default(0)->comment('添加时间');
            $table->integer('user_id')->nullable()->default(0)->comment('用户id');
            $table->string('title')->nullable()->default('')->comment('标题，选填');
            $table->string('mobile')->nullable()->default('')->comment('机号码，选填');
            $table->string('type')->nullable()->default('')->comment('意见反馈类型，选填');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `feed_backs` comment'意见反馈表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feed_backs');
    }
}
