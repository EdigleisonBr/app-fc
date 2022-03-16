<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referee extends Model
{
    use HasFactory;
    
    // campos que serão exclusivos e não serão aceitos via request get ou post
    protected $guarded = ['id'];

}
