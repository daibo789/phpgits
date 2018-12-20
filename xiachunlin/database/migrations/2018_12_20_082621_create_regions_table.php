<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('region', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable()->default('')->comment('名称');
            $table->integer('parent_id')->nullable()->default(0)->comment('父级id');
            $table->tinyInteger('type')->nullable()->default(0)->comment('层级，0国家，1省，2市，3区');
            $table->string('sort_name')->nullable()->default('')->comment('拼音或英文简写');
            $table->tinyInteger('is_oversea')->nullable()->default(0)->comment('0国内地址，1国外地址');
            $table->string('area_code')->nullable()->default('')->comment('电话区号');
            $table->tinyInteger('status')->nullable()->default(1)->comment('状态');
            $table->timestamps();
            $table->index('parent_id');
        });
        DB::statement("ALTER TABLE `region` comment'地区表'"); // 表注释
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('region');
    }
}
