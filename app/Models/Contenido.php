<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contenido extends Model
{
    use HasFactory;

    //1:N entre los modelos User y Contenido, donde un usuario puede tener varios contenidos, pero un contenido pertenece solo a un usuario

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

