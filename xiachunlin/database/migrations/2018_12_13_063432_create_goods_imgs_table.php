<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsImgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_imgs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url',150)->nullable()->default('')->comment('图片地址');
            $table->integer('goods_id')->nullable()->default(0)->comment('产品id');
            $table->integer('add_time')->nullable()->default(0)->comment('添加时间');
            $table->string('des',150)->nullable()->default('')->comment('图片说明信息');
            $table->integer('listorder')->nullable()->default(50)->comment('排序');
            $table->timestamps();
//            $table->unique('sn');

        });
        DB::statement("ALTER TABLE `goods_imgs` comment'商品图片'"); // 表注释
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods_imgs');
    }
}
