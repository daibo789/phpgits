<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('typeid')->nullable()->default(0)->comment('栏目id');
            $table->tinyInteger('tuijian')->nullable()->default(0)->comment('推荐等级');
            $table->integer('click')->nullable()->default(0)->comment('点击量');
            $table->string('title',150)->nullable()->default('')->comment('标题');
            $table->mediumText('body')->comment('内容');
            $table->string('sn',60)->nullable()->default('')->comment('货号');
            $table->decimal('price',10,2)->nullable()->default(0.00)->comment('产品价格');
            $table->string('litpic',100)->nullable()->default('')->comment('缩略图');
            $table->integer('pubdate')->default(0)->nullable()->comment('更新时间');
            $table->integer('add_time')->default(0)->nullable()->comment('添加时间');
            $table->string('keywords',100)->nullable()->default('')->comment('关键词');
            $table->string('seotitle',150)->nullable()->default('')->comment('seo标题');
            $table->string('description',240)->nullable()->default('')->comment('描述');
            $table->tinyInteger('status')->nullable()->default(0)->comment('商品状态 0正常 1已删除 2下架 3申请上架');
            $table->decimal('shipping_fee',10,2)->nullable()->default(0.00)->comment('运费');
            $table->decimal('market_price',10,2)->nullable()->default(0.00)->comment('原价');
            $table->integer('goods_number')->default(0)->nullable()->comment('库存');
            $table->integer('user_id')->default(0)->nullable()->comment('谁发布的');
            $table->integer('sale')->default(0)->nullable()->comment('销量');
            $table->decimal('cost_price',10,2)->nullable()->default(0.00)->comment('成本价格');
            $table->decimal('goods_weight',10,2)->nullable()->default(0.00)->comment('重量');
            $table->integer('point')->default(0)->nullable()->comment('购买该商品时每笔成功交易赠送的积分数量');
            $table->integer('comments')->default(0)->nullable()->comment('评论次数');
            $table->integer('promote_start_date')->default(0)->comment('促销价格开始日期');
            $table->decimal('promote_price',10,2)->nullable()->default(0.00)->comment('促销价格');
            $table->integer('promote_end_date')->nullable()->default(0)->comment('促销价格结束日期');
            $table->string('goods_img',250)->nullable()->default('')->comment('商品的实际大小图片，如进入该商品页时介绍商品属性所显示的大图片');
            $table->tinyInteger('warn_number')->nullable()->default(0)->comment('商品报警数量');
            $table->mediumText('spec')->comment('商品规格，json');
            $table->integer('listorder')->nullable()->default(0)->comment('排序');
            $table->integer('brand_id')->nullable()->default(0)->comment('商品品牌');
            $table->timestamps();
            $table->unique('sn');

        });
        DB::statement("ALTER TABLE `goods` comment'商品表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods');
    }
}
