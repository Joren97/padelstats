<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration 
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->integer('player_1_id');
            $table->integer('player_2_id');
            $table->integer('score_team_1');
            $table->integer('score_team_2');
            $table->integer('player_3_id');
            $table->integer('player_4_id');
            $table->dateTime('game_datetime')->nullable();
            // $table->unique(['player_1_id', 'player_2_id', 'player_3_id', 'player_4_id', 'game_datetime']);
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
        Schema::dropIfExists('games');
    }
};
