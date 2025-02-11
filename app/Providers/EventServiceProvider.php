<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     * definir qué eventos deben ser escuchados y qué listeners deben manejar esos eventos. 
     * @var array
     */
    protected $listen = [
        Registered::class => [ //se dispara cuando un usuario se registra
            SendEmailVerificationNotification::class,//asociado a este listener que envia la notificacion al usuario recien registrado
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
