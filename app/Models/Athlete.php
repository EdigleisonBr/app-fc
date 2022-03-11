<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Athlete extends Model
{
    use HasFactory;

    // campos que serão exclusivos e não serão aceitos via request get ou post
   protected $guarded = ['id'];

    // campos que serão preenchidos pelo Request::all()
    protected $fillable = [
        'name',
        'surname',
        'position',
        'birthName',
        'zipCode',
        'address',
        'number',
        'neighborhood',
        'city',
        'state',
        'shoeSize',
        'cell',
        'active',
        'userId',
    ];

    // aqui a solução para inserir produtos com status default 'A' sem precisar ter ele no form
    protected $attributes = [
        'active' => '0',
    ];

    protected $casts = [
        'cell' => 'integer',
    ];

    // regra dos campos
    public static $rules = [
        'name' => 'required',
        'surname' => 'required',
        'position' => 'required',
        'birthName' => 'required',
        'cel' => 'required',
    ];
}
