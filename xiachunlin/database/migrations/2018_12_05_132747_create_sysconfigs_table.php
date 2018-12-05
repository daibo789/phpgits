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
            $table->timestamps();
            $table->string('varname')->comment('变量名')->unique();
            $table->string('info')->comment('变量名');
            $table->string('value')->comment('变量说明');
            $table->string('is_show')->comment('是否显示，默认0显示，让客户看不到');
        });
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
