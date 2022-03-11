<?php

namespace App\Models;

use App\Models\SoccerMatche;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $table = 'opposing_teams';

    // campos que serão exclusivos e não serão aceitos via request get ou post
    protected $guarded = ['id'];

     // campos que serão preenchidos pelo Request::all()
     protected $fillable = [
        'name',
        'responsible',
        'cell',
    ];

}
