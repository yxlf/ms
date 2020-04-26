<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCommodityIdToRcordoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rcordouts', function (Blueprint $table) {
            //
            $table->bigInteger("commodity_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rcordouts', function (Blueprint $table) {
            //
            $table->dropColumn("commodity_id");
        });
    }
}
