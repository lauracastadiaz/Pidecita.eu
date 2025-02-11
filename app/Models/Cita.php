<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cita extends Model
{
    use HasFactory;


    //1:N de paciente y citas: una cita pertenece solo a un paciente

    public function paciente(): BelongsTo{

        return $this->belongsTo(Paciente::class);
    }

    public function medico(): BelongsTo{
        
        return $this->belongsTo(Medico::class);
    }

    // 1:N especialidad y citas donde una especialidad puede tener varias citas pero una cita pertenece solo a una especialidad

    public function especialidades(): BelongsTo {
        
        return $this->belongsTo(Especialidad::class);
    }

}
