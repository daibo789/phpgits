<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagindicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tagindices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tag',36)->nullable()->default('')->comment('标签名称');
            $table->string('title',60)->nullable()->default('')->comment('标题');
            $table->string('description',150)->nullable()->default('')->comment('描述');
            $table->text('content')->comment('内容');
            $table->integer('pubdate')->nullable()->default(0)->comment('添加时间');
            $table->string('keywords',100)->nullable()->default('')->comment('关键词');
            $table->integer('click')->comment('点击量');
            $table->string('litpic',100)->nullable()->default('')->comment('缩略图或封面');
            $table->string('template',100)->nullable()->default('')->comment('模板名称');
            $table->string('filename',100)->nullable()->default('')->comment('别名');
            $table->tinyInteger('ischeck')->nullable()->default(0)->comment('是否审核，默认0审核');
            $table->timestamps();
            $table->unique('tag');

        });
        DB::statement("ALTER TABLE `tagindices` comment'tag标签表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tagindices');
    }
}
