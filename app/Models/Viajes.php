<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Viajes extends Model
{
    use HasFactory;

    public $connection = 'mongodb';

    public $fillable = [
        'destino',
        'fecha',
        'alimentos',
        'viajeros'
    ];

}