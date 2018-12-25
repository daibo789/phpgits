<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKuaidisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kuaidis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50)->nullable()->default('')->comment('快递公司名称');
            $table->string('code',50)->nullable()->default('')->comment('公司编码');
            $table->decimal('money',10,2)->nullable()->default(0.00)->comment('金额');
            $table->string('country',50)->nullable()->default('')->comment('国家编码');
            $table->string('des',250)->nullable()->default('')->comment('说明');
            $table->string('tel',60)->nullable()->default('')->comment('电话');
            $table->string('website',60)->nullable()->default('')->comment('官网');
            $table->integer('listorder')->nullable()->default(0)->comment('排序');
            $table->tinyInteger('status')->nullable()->default(0)->comment('是否显示，0显示');
            $table->timestamps();
//            $table->unique('pay_code');
//            $table->index('order_id');
//            $table->index('goods_id');
        });
        DB::statement("ALTER TABLE `kuaidis` comment'快递表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kuaidis');
    }
}
