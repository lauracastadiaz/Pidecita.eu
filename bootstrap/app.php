<?php

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of Laravel, and is
| the IoC container for the system binding all of the various parts.

| Aquí creamos una nueva instancia de la aplicación Laravel. Esta instancia
| sirve como el "pegamento" que une todos los componentes de Laravel y
| actúa como el contenedor de servicios IoC para la aplicación.
*/

$app = new Illuminate\Foundation\Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);

/*
|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
|
| Next, we need to bind some important interfaces into the container so
| we will be able to resolve them when needed. The kernels serve the
| incoming requests to this application from both the web and CLI. 
    
| Luego, vinculamos algunas interfaces importantes en el contenedor de
| servicios para que puedan ser resueltas cuando sea necesario. Estas
| interfaces incluyen los kernels para manejar solicitudes HTTP y de
| consola, así como el manejador de excepciones para manejar excepciones.
|
*/

$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| This script returns the application instance. The instance is given to
| the calling script so we can separate the building of the instances
| from the actual running of the application and sending responses.

| Esto se hace para que el script de inicio pueda separar la construcción 
| de las instancias de la ejecución real de la aplicación y el envío de respuestas.
*/

return $app;
