<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    // Define el nombre de la tabla si no sigue la convención
    protected $table = 'productos'; // Nombre de la tabla en la base de datos

    // Definir los campos que pueden ser llenados masivamente
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'imagen', // Aquí se cambia de 'url' a 'imagen', ya que es lo que tienes en la base de datos
    ];

    
}
