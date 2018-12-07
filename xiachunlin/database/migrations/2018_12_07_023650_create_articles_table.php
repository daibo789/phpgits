<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('typeid')->nullable()->default(0)->comment('栏目id');
            $table->tinyInteger('tuijian')->nullable()->default(0)->comment('推荐等级');
            $table->integer('click')->nullable()->default(0)->comment('点击量');
            $table->string('title')->default('')->comment('标题');
            $table->mediumText('body')->comment('内容');
            $table->string('writer')->default('')->comment('作者');
            $table->string('source')->default('')->comment('来源');
            $table->char('litpic',100)->default('')->comment('缩略图');
            $table->integer('pubdate')->nullable()->default(0)->comment('更新时间');
            $table->integer('addtime')->nullable()->default(0)->comment('添加时间');
            $table->string('keywords')->default('')->comment('关键词');
            $table->string('seotitle',150)->default('')->comment('seo标题');
            $table->string('description',250)->default('')->comment('描述');
            $table->tinyInteger('ischeck')->nullable()->default(0)->comment('是否审核，默认0审核');
            $table->integer('typeid2')->nullable()->default(0)->comment('副栏目id');
            $table->integer('user_id')->nullable()->default(0)->comment('是谁发布的');
            $table->integer('listorder')->nullable()->default(50)->comment('排序');
            $table->timestamps();
            $table->index('writer');
            $table->index(['typeid', 'ischeck']);
        });
        DB::statement("ALTER TABLE `articles` comment'文章表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
