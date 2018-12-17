<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_brands', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->nullable()->default(0)->comment('父级id');
            $table->integer('add_time')->nullable()->default(0)->comment('添加时间');
            $table->string('title',30)->nullable()->default('')->comment('名称');
            $table->string('seotitle',150)->nullable()->default('')->comment('seo标题');
            $table->string('keywords',60)->nullable()->default('')->comment('关键词');
            $table->string('description',255)->nullable()->default('')->comment('s描述');
            $table->text('content')->comment('内容');
            $table->string('litpic',100)->nullable()->default('')->comment('缩略图');
            $table->tinyInteger('status')->nullable()->default(1)->comment('是否显示,1显示');
            $table->integer('listorder')->nullable()->default(50)->comment('排序');
            $table->string('cover_img',100)->nullable()->default('')->comment('封面');
            $table->integer('click')->nullable()->default(0)->comment('点击量');
            $table->timestamps();
//            $table->unique('name');
//            $table->unique('typedir');
//            $table->key('pid');
        });
        DB::statement("ALTER TABLE `goods_brands` comment'商品品牌表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods_brands');
    }
}
