<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',150)->nullable()->default('')->comment('单页标题');
            $table->string('seotitle',150)->nullable()->default('')->comment('seo标题');
            $table->string('keywords')->nullable()->default('')->comment('关键词');
            $table->string('template',30)->nullable()->default('')->comment('模板名称');
            $table->string('description',250)->nullable()->default('')->comment('页面摘要信息');
            $table->integer('pubdate')->nullable()->default(0)->comment('更新时间');
            $table->mediumText('body')->comment('内容');
            $table->string('filename',60)->nullable()->default('')->comment('别名');
            $table->string('litpic',100)->nullable()->default('')->comment('缩略图');
            $table->integer('click')->nullable()->default(0)->comment('点击量');
            $table->integer('listorder')->nullable()->default(0)->comment('排序');
            $table->string('name')->default('')->comment('点击量');
            $table->tinyInteger('is_show')->nullable()->default(0)->comment('是否显示，默认0显示');
            $table->timestamps();
            $table->unique('filename');

        });
        DB::statement("ALTER TABLE `pages` comment'单页面表'"); // 表注释
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
