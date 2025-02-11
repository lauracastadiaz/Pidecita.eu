<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;


    protected $fillable = [
        'nombre_rol', 'descripcion',
    ];

    /**
     * RELACIONES
     */

    public function users()
    {
        return $this->belongsToMany(User::class);
    }




    // relacion N:M con User : los usuarios pueden tener multiples roles y los roles pueden pertenecer a multiples usuarios

    // public function users(): BelongsToMany {

    //     return $this->belongsToMany(User::class);
    // }

}