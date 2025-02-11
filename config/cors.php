<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie'], //rutas

    'allowed_methods' => ['*'], //métodos HTTP permitidos en solicitudes cors

    'allowed_origins' => ['*'], 

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0, // Define durante cuánto tiempo (en segundos) se deben almacenar en caché las respuestas preflight CORS. En este caso, 0 indica que la respuesta preflight no se almacenará en caché.

    'supports_credentials' => false,

];
