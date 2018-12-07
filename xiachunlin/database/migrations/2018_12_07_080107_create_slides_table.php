<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',60)->nullable()->default('')->comment('标题');
            $table->string('url',100)->nullable()->default('')->comment('跳转的url');
            $table->tinyInteger('target')->nullable()->default(0)->comment('0_blank,1_self');
            $table->smallInteger('group_id')->nullable()->default(0)->comment('group_id');
            $table->string('pic',100)->nullable()->default('')->comment('图片地址');
            $table->integer('listorder')->nullable()->default(0)->comment('排序');
            $table->tinyInteger('is_show')->nullable()->default(0)->comment('是否显示，默认0显示');
            $table->tinyInteger('type')->nullable()->default(0)->comment('0:pc，1:weixin，2:app，3:wap');
            $table->timestamps();
//            $table->unique('filename');

        });
        DB::statement("ALTER TABLE `slides` comment'轮播图表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slides');
    }
}
