<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArctypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arctypes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->nullable()->default(0)->comment('父级栏目id');
            $table->integer('addtime')->nullable()->default(0)->comment('添加时间');
            $table->string('name')->default('')->comment('栏目名称');
            $table->string('seotitle',150)->default('')->comment('seo标题');
            $table->string('keywords',60)->default('')->comment('关键词');
            $table->string('description',255)->default('')->comment('描述');
            $table->mediumText('content')->comment('内容');
            $table->string('typedir',30)->nullable()->default('')->comment('别名');
            $table->string('templist',50)->nullable()->default('')->comment('列表页模板');
            $table->string('temparticle',50)->nullable()->default('')->comment('文章页模板');
            $table->string('litpic',100)->nullable()->default('')->comment('封面或缩略图');
            $table->string('seokeyword',60)->nullable()->default('')->comment('判断相关,可不填');
            $table->integer('model')->nullable()->default(0)->comment('栏目所属的模型');
            $table->integer('listorder')->nullable()->default(0)->comment('排序');
            $table->tinyInteger('is_show')->nullable()->default(0)->comment('是否显示，默认0显示');
            $table->timestamps();
            $table->unique('name');
            $table->unique(['typedir']);
        });
        DB::statement("ALTER TABLE `arctypes` comment'文章表'"); // 表注释
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arctypes');
    }
}
