<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->nullable()->default('')->comment('菜单名称');
            $table->integer('pid')->nullable()->default(0)->comment('父级id');
            $table->string('action',50)->nullable()->default('')->comment('操作名称');
            $table->string('data',50)->nullable()->default('')->comment('额外参数');
            $table->tinyInteger('type')->nullable()->default(0)->comment('菜单类型 1：权限认证+菜单；0：只作为菜单');
            $table->string('icon',50)->nullable()->default('')->comment('菜单图标');
            $table->string('des',250)->nullable()->default('')->comment('备注');
            $table->tinyInteger('status')->nullable()->default(0)->comment('态，1显示，0不显示');
            $table->integer('listorder')->nullable()->default(50)->comment('排序ID');
            $table->index('status');
            $table->index('pid');

        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
