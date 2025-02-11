<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Especialidad extends Model
{
    use HasFactory;



    protected $table = 'especialidades';

    protected $fillable = [
        'nombre',
        'descripcion',
        'user_id',
        'duracion'
    ];
    


    //N:M medico y especialidad : un médico puede tener varias especialidades y una especialidad puede estar asociada a varios médicos
    public function medicos(){

        return $this->belongsToMany(Medico::class, 'especialidad_medico','medico_id', 'especialidad_id');
    }


    // 1:N especialidad y citas donde una especialidad puede tener varias citas pero una cita pertenece solo a una especialidad

    public function citas(): HasMany {
        
        return $this->hasMany(Cita::class);
    }


    // N:M entre Centro y Especialidad, donde un centro puede ofrecer varias especialidades y una especialidad puede estar disponible en varios centros

    public function centros()
    {
        return $this->belongsToMany(Centro::class, 'centro_especialidad', 'especialidad_id', 'centro_id');
    }




}
