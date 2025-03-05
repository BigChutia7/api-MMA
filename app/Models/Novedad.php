<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novedad extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'novedades'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'url' 
    ];

}
