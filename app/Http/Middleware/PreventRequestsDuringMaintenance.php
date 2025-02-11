<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as Middleware;

class PreventRequestsDuringMaintenance extends Middleware //para prevenir solicitudes durante el modo de mantenimiento.
{
    /**
     * The URIs that should be reachable while maintenance mode is enabled.
     * 
     * las URIs que deberían ser accesibles incluso cuando el modo de mantenimiento está activado
     *
     * @var array
     */
    protected $except = [
        //
    ];
}
