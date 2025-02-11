<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification como rutas apu o rutas de webhook.
     *
     * @var array
     */
    protected $except = [
        //
    ];
}
