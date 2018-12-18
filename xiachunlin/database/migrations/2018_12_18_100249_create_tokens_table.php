<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('tokens', function (Blueprint $table) {
            $table->tinyInteger('comment_type')->nullable()->default(0)->comment('用户评论的类型;0评论的是商品,1评论的是文章');
            $table->integer('id_value')->nullable()->default(0)->comment('文章或者商品的id,文章对应的是article的article_id;商品对应的是goods的goods_id');
            $table->text('content')->comment('评论的内容');
            $table->string('litpic',100)->default('')->comment('封面或缩略图');
            $table->tinyInteger('comment_rank')->nullable()->default(5)->comment('该文章或者商品的重星级;只有1到5星;由数字代替;其中5代表5星');
            $table->integer('add_time')->nullable()->default(0)->comment('评论的时间');
            $table->string('ip_address',20)->default('')->comment('评论时的用户IP');
            $table->tinyInteger('status')->nullable()->default(5)->comment('是否被管理员批准显示;1是;0未批准显示');
            $table->integer('parent_id')->nullable()->default(0)->comment('评论的父节点,取值该表的comment_id字段,如果该字段为0,则是一个普通评论,否则该条评论就是该字段的值所对应的评论的回复');
            $table->integer('user_id')->nullable()->default(0)->comment('发表该评论的用户的用户id,取值user的user_id');
            $table->tinyInteger('is_anonymous')->nullable()->default(0)->comment('是否匿名，0否');
            $table->integer('order_id')->nullable()->default(0)->comment('订单id');
            $table->timestamps();
            $table->index(['comment_type','user_id']);
        });
        DB::statement("ALTER TABLE `tokens` comment'商品/文章评论表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tokens');
    }
}
