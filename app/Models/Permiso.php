<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permiso extends Model
{
    use HasFactory;


    //N:M User y Permiso, un usuario puede tener varios permisos y un permiso puede ser asignado a varios usuarios

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}