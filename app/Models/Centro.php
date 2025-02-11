<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Centro extends Model
{
    use HasFactory;

    protected $table = 'centros';
   
    protected $fillable = [
     'nombre',
     'user_id',
     'direccion'
    ];

    //Relación 1:N con el modelo Horario

    public function horario():HasOne
    {
        return $this->hasOne(Horario::class, 'centro_id');
    }
    public function horarioProfesional():HasOne
    {
        return $this->hasOne(Horario::class, 'centro_id');
    }





    //N:M centro y medico: un médico puede estar asociado a varios centros y un centro puede tener varios médicos

    public function medicos() {
        
        return $this->belongsToMany(Medico::class, 'centro_medico', 'centro_id', 'medico_id');
    }



    //N:M entre Centro y Especialidad, donde un centro puede ofrecer varias especialidades y una especialidad puede estar disponible en varios centros

    public function especialidades()
    {
        return $this->belongsToMany(Especialidad::class, 'centro_especialidad', 'centro_id', 'especialidad_id');
    }



}