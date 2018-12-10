<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaglistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taglists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tid')->nullable()->default(0)->comment('标签id');
            $table->integer('aid')->nullable()->default(0)->comment('文章id');
            $table->timestamps();
//            $table->unique('filename');

        });
        DB::statement("ALTER TABLE `taglists` comment'轮播图表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taglists');
    }
}
