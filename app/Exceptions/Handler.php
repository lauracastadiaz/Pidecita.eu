<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     * 
     * Estos son arrays donde puedes especificar tipos de excepciones que no quieres que se reporten o
     * cuyos mensajes no quieres que se incluyan en los datos de sesión flash cuando ocurren.
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     * 
     * cualquier excepción que no sea manejada de manera específica en otros lugares de la 
     * aplicación será manejada aquí
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
