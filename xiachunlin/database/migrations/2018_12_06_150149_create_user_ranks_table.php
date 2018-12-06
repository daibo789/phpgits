<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_ranks', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title')->nullable()->default('')->comment('会员等级名称');
            $table->integer('min_points')->nullable()->default(0)->comment('该等级的最低积分');
            $table->integer('max_points')->nullable()->default(0)->comment('该等级的最高积分');
            $table->tinyInteger('discount')->nullable()->default(0)->comment('该会员等级的商品折扣');
            $table->integer('listorder')->nullable()->default(0)->comment('排序');
            $table->integer('rank')->nullable()->default(0)->comment('等级');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_ranks');
    }
}
