<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class HorarioProfesional extends Model
{
    use HasFactory;

    protected $table = 'horarios_profesionales';
    protected $fillable = [
        'centro_id',
        'medico_id',
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
    public function centro():BelongsTo
    {
        return $this->belongsTo(Centro::class, 'centro_id');
    }
    public function medico():BelongsTo
    {
        return $this->belongsTo(Medico::class, 'medico_id');
    }



}
