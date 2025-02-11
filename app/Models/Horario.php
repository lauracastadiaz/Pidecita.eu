<?php

namespace App\Models;

use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Horario extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'centro_id',
        'lunes',
        'martes',
        'miercoles',
        'jueves',
        'viernes',
        'sabado',
        'domingo',
        'fechas_no_disponibles',
        'dias_descanso',
        'fechas_excepcionales'
    ];

    protected $casts = [
        'lunes' => 'array',
        'martes' => 'array',
        'miercoles' => 'array',
        'jueves' => 'array',
        'viernes' => 'array',
        'sabado' => 'array',
        'domingo' => 'array',
        'dias_descanso' => 'array',
        'fechas_excepcionales' => 'array',
        'fechas_no_disponibles' => 'array',
    ];

    // public function getLunesAttribute(string $value):array
    // {
        
    //     return json_decode($value, true);
    // }
    //relacion 1-1 con el modelo centro

    public function centro():BelongsTo
    {
        return $this->belongsTo(Centro::class, 'centro_id');
    }

    //relacion uno a muchos con medico (profesionales)

    // public function medico(): BelongsTo{
        
    //     return $this->belongsTo(Medico::class, 'medico_id');
    // }

    
}
