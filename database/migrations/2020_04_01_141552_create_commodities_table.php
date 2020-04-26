<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommoditiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commodities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("product_name")->comment("产品名称");
            $table->integer("count")->comment("商品数量 目前只能是\"件\"");
            $table->bigInteger("store_id")->comment("对应门店id");
            $table->bigInteger("title_id")->comment("对应类别id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commodities');
    }
}
