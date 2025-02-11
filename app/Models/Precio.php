<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Precio extends Model
{
    use HasFactory;
    protected $table = 'precios'; 

    protected $fillable = [
        'nombre',
        'precio_anterior',
        'precio_actual',
        'descripcion',
        'descripcion_detallada',
        'icono',
        'enlace',
        'caracteristicas',
    ];

 

}
