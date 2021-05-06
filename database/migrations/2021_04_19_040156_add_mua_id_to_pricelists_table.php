<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMuaIdToPricelistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pricelists', function (Blueprint $table) {
            $table->unsignedBigInteger('mua_id');

            $table->foreign('mua_id')->references('id')->on('makeupartists');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pricelists', function (Blueprint $table) {
            $table->dropForeign('mua_id');
            $table->dropColumn('mua_id');
        });
    }
}
