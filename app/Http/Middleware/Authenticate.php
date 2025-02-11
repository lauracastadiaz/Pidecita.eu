<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     * middleware que se encarga de redireccionar a los usuarios que no están autenticados 
     * a la página de inicio de sesión.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request) //Determina la ruta a la que se redireccionará al usuario si no está autenticado. 
    {
        if (! $request->expectsJson()) {
            return route('login');
        }

        /*
        Por defecto, redirige a la ruta login (página de inicio de sesión) 
        si la solicitud no espera una respuesta JSON (expectsJson() devuelve false). 
        Esto significa que si un usuario intenta acceder a una ruta que requiere autenticación, será 
        redirigido a la página de inicio de sesión, a menos que la solicitud espere una respuesta JSON. 
        */
    }
}
