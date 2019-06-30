<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintsToPlayerPicksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('player_picks', function (Blueprint $table) {
            $table->unsignedInteger('pool_id')->change();
            $table->unsignedInteger('player_id')->change();
            $table->unsignedInteger('houseguest_id')->change();

            $table->foreign('pool_id')->references('id')->on('pools');
            $table->foreign('player_id')->references('id')->on('players');
            $table->foreign('houseguest_id')->references('id')->on('players');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('player_picks', function (Blueprint $table) {
            $table->dropForeign(['pool_id']);
            $table->dropForeign(['player_id']);
            $table->dropForeign(['houseguest_id']);
        });

        Schema::table('player_picks', function (Blueprint $table) {
            $table->integer('pool_id')->change();
            $table->integer('player_id')->change();
            $table->integer('houseguest_id')->change();
        });
    }
}
