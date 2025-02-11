<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/';
    public const VERIFICATION= '/verify-email';
    public const LOGIN= '/login';

    public const REGISTRATION_SUCCESS= '/registration/success';


    

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {

       
        $this->configureRateLimiting();

        /* 
            define las rutas de la aplicación, incluidas las rutas de API y las rutas web. 
            Las rutas de la API están agrupadas bajo el prefijo /api, 
            mientras que las rutas web no tienen ningún prefijo. 
            Además, se aplica el middleware api a las rutas de la API y el middleware web a las rutas web.
        */
        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        }); //se configura un limitador de velocidad para las rutas de la API que limita el número de solicitudes a 60 por minuto por usuario o por dirección IP.
    }
}
