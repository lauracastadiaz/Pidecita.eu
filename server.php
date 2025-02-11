<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

 //obtener la uri de la solicitud
$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

// This file allows us to emulate Apache's "mod_rewrite" functionality from the
// built-in PHP web server. This provides a convenient way to test a Laravel
// application without having installed a "real" web server software here.

/*
---IF---
| Aquí se verifica si el URI no es solo una barra (/) 
| y si existe un archivo correspondiente al URI solicitado 
| dentro del directorio public del proyecto. Si se cumple esta condición, 
| el script devuelve false, lo que indica que el servidor web integrado de PHP 
| debe manejar la solicitud directamente (es decir, no se necesita redireccionamiento o reescritura) 

*/
if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
    return false;
}

//sino, incluir el archivo index.php del directorio public
require_once __DIR__.'/public/index.php';
