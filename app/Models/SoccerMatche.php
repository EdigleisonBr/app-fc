<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team;
use App\Models\Place;
use App\Models\Referee;

class SoccerMatche extends Model
{
    use HasFactory;

        // campos que serão preenchidos pelo Request::all()
        protected $fillable = [
            'opposingTeamId',
            'refereesId',
            'placeId',
            'userId',
            'matchDate',
        ];
    
    public function place() {
        return $this->hasOne(Place::class, 'id', 'placeId');
    }

    public function team(){
        return $this->hasOne(Team::class, 'id', 'opposingTeamId');
    }

    public function referee(){
        return $this->hasOne(Referee::class, 'id', 'refereesId');
    }
}
