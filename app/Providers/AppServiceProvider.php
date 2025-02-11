<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *Este método se utiliza para registrar cualquier servicio que la aplicación necesite durante su ejecución. 
     *Ejemplos: se registran enlaces de contenedor, alias de clase, singleton, etc.
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     * inicializar y configurar cualquier servicio una vez que todos los otros servicios hayan sido registrados. 
     * Ejemplos: se definen rutas, se configuran eventos, se configuran políticas de acceso, se publican archivos de configuración, etc.
     * @return void
     */
    public function boot()
    {
        Paginator::defaultView('vendor.pagination.bootstrap-4');
    }
}
