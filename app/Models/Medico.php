<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;



class Medico extends Model
{
    use HasFactory;

   protected $table = 'medicos';
   
   protected $fillable = [
    'nombre',
    'user_id',
    'telefono',
    'email',
    'direccion',
    'nif',
    
   ];

   public function horarioProfesional(): HasOne{

    return $this->hasOne(HorarioProfesional::class, 'medico_id');
}


    //Definición de relación 1-1 con user

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }

    //relacion 1:N entre el modelo Medico y el modelo Cita, donde un médico puede tener múltiples citas, pero una cita solo pertenece a un médico.

    public function citas(): HasMany{

        return $this->hasMany(Cita::class);
    }

    //N:M centro y medico: un médico puede estar asociado a varios centros y un centro puede tener varios médicos

    public function centros() {
        
        return $this->belongsToMany(Centro::class, 'centro_medico', 'medico_id', 'centro_id');
    }

    //N:M medico y especialidad : un médico puede tener varias especialidades y una especialidad puede estar asociada a varios médicos

    public function especialidades() {

        return $this->belongsToMany(Especialidad::class, 'especialidad_medico', 'medico_id', 'especialidad_id');
    }

    // public function horario(): HasOne{

    //     return $this->HasOne(Horario::class, 'centro_id');
    // }
    



}