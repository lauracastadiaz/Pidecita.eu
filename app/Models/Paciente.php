<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Paciente extends Model
{
    use HasFactory;


    //Definición de relación 1-1 con user

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //1:N de paciente y citas: puedo tener multiples citas pero una cita pertenece solo a un paciente

    public function citas(): HasMany {
        
        return $this->hasMany(Cita::class);
    }
}
