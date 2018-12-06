<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->nullable()->default('')->comment('角色名')->unique();
            $table->string('des')->nullable()->default('')->comment('描述');
            $table->tinyInteger('status')->nullable()->default(0)->comment('状态，0启用，1禁用');
            $table->smallInteger('pid')->nullable()->default(0)->comment('父角色id');
            $table->smallInteger('listorder')->nullable()->default(0)->comment('排序');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_roles');
    }
}
