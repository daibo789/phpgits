<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('tokens', function (Blueprint $table) {
            $table->string('token',255)->default('')->comment('token');
            $table->tinyInteger('type')->nullable()->default(0)->comment('0:app, 1:admin, 2:weixin, 3:wap, 4: pc');
            $table->integer('uid')->nullable()->default(0)->comment('uid');
            $table->text('data')->comment('token相关信息,json_encode字串');
            $table->timestamps();
            $table->timestamp('expired_at')->nullable();
//            $table->index(['comment_type','user_id']);
        });
        DB::statement("ALTER TABLE `tokens` comment'token表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tokens');
    }
}
