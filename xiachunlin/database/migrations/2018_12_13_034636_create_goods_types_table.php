<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->nullable()->default(0)->comment('父级栏目id');
            $table->integer('addtime')->nullable()->default(0)->comment('添加时间');
            $table->string('name',30)->nullable()->default('')->comment('栏目名称');
            $table->string('seotitle',150)->nullable()->default('')->comment('seo标题');
            $table->string('keywords',60)->nullable()->default('')->comment('关键词');
            $table->string('description',255)->nullable()->default('')->comment('s描述');
            $table->text('content',255)->comment('内容');
            $table->string('typedir',30)->nullable()->default('')->comment('别名');
            $table->string('templist',50)->nullable()->default('')->comment('列表页模板');
            $table->string('temparticle',50)->nullable()->default('')->comment('详情页模板');
            $table->string('litpic',100)->nullable()->default('')->comment('缩略图');
            $table->string('seokeyword',60)->nullable()->default('')->comment('判断相关,可不填');
            $table->tinyInteger('status')->nullable()->default(1)->comment('是否显示,1显示');
            $table->integer('listorder')->nullable()->default(50)->comment('排序');
            $table->string('cover_img',100)->nullable()->default('')->comment('封面');
            $table->timestamps();
            $table->unique('name');
            $table->unique('typedir');
            $table->index('pid');
        });
        DB::statement("ALTER TABLE `goods_types` comment'商品分类表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods_types');
    }
}
