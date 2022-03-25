<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoccerMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soccer_matches', function (Blueprint $table) {
            $table->id();
            $table->date('matchDate');
            $table->string('hour');
            $table->foreignId('opposingTeamId')->nullable()->constrained('opposing_teams');
            $table->foreignId('refereesId')->nullable()->constrained('referees');
            $table->foreignId('placeId')->nullable()->constrained('places');
            $table->integer('goalsAgainst')->nullable();
            $table->integer('goalsInFavor')->nullable();
            $table->foreignId('userId')->constrained('users');
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
        Schema::dropIfExists('soccer_matches');
    }
}
