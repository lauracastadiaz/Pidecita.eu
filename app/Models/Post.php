<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   use HasFactory;

    //refleja la estructura de la tabla contenido
    protected $table= 'contenido';

    //columnas a rellenar de forma masiva
    protected $fillable = ['titulo', 'id_autor', 'descripcion', 'fechaCreacion', 'fechaPublicacion', 'fechaDespublicacion'];
}
