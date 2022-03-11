<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoalsAthletes extends Model
{
    use HasFactory;

    public function athlete(){
        return $this->hasOne(athlete::class, 'id', 'athleteId');
    }
}
