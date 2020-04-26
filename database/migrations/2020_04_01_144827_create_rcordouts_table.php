<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRcordoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rcordouts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name")->comment("商品名称");
            $table->integer("count")->comment("数量");
            $table->decimal("price", 8, 2)->comment("价格");
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
        Schema::dropIfExists('rcordouts');
    }
}
