<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSysconfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sysconfigs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('varname',100)->default('')->comment('变量名');
            $table->string('info',100)->default('')->comment('变量值');
            $table->text('value')->nullable()->comment('变量说明');
            $table->tinyInteger('is_show')->nullable()->default(0)->comment('是否显示，默认0显示，让客户看不到');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `sysconfigs` comment'系统参数配置表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sysconfigs');
    }
}
