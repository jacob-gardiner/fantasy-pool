<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConstraintsToHouseguestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('houseguests', function (Blueprint $table) {
            $table->unsignedInteger('pool_id')->change();

            $table->foreign('pool_id')->references('id')->on('pools');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('houseguests', function (Blueprint $table) {
            $table->dropForeign(['pool_id']);
        });

        Schema::table('houseguests', function (Blueprint $table) {
            $table->integer('pool_id')->change();
        });
    }
}
