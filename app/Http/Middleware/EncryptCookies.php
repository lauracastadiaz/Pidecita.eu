<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class EncryptCookies extends Middleware
{
    /**
     * The names of the cookies that should not be encrypted.
     * especifica el nombre de las cookies que no se desean cifrar. 
     * Esto puede ser útil si hay ciertas cookies que no se necesitan cifrar por alguna razón, 
     * como cookies utilizadas por servicios de terceros o cookies que no contienen información sensible.
     * @var array
     */
    protected $except = [
        //
    ];
}
