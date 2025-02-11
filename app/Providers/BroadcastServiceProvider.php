<?php

namespace App\Providers;

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Broadcast::routes(); //define las rutas necesarias para que el servidor de transmisión y los clientes se comuniquen entre sí. 

        require base_path('routes/channels.php'); // contiene las definiciones de canales utilizados para autenticar y autorizar la transmisión de eventos a través de los canales especificados.
    }
}
