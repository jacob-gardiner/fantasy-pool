<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintsToGameActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('game_actions', function (Blueprint $table) {
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
        Schema::table('game_actions', function (Blueprint $table) {
            $table->dropForeign(['pool_id']);
        });

        Schema::table('game_actions', function (Blueprint $table) {
            $table->integer('pool_id')->change();
        });
    }
}
