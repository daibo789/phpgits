<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFriendlinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friendlinks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('webname',11)->nullable()->default('')->comment('友情链接名称');
            $table->string('url',100)->nullable()->default('')->comment('友情链接url');
            $table->smallInteger('group_id')->nullable()->default(0)->comment('分组id');
            $table->integer('listorder')->nullable()->default(0)->comment('排序');
            $table->timestamps();
//            $table->unique('filename');

        });
        DB::statement("ALTER TABLE `friendlinks` comment'友情链接表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('friendlinks');
    }
}
