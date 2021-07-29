<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public const COMISSION = 8.5;

    public $fillable = [
        'name',
        'email',
        'comission'
        ];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'comission' => 'float'
    ];

    protected $rules = [
        'name' => 'required|string',
        'email' => 'required|email|unique:sellers,email'
    ];


}
