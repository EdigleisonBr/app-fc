<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoalsAthletesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goals_athletes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('soccerMatchId')->constrained('soccer_matches');
            $table->foreignId('athleteId')->constrained('athletes');
            $table->integer('goals');
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
        Schema::dropIfExists('goals_athletes');
    }
}
