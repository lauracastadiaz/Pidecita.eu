<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *definir las políticas de autorización de la aplicación.
     *Por ejemplo, definir una política que permita a los usuarios administrativos (médicos) editar los modelos de usuarios, pero no a los usuarios regulares (pacientes).
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *determinan si un usuario autorizado puede realizar una acción específica en la aplicación.
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
