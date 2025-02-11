<?php

namespace App\Http\Middleware;

use Fideloper\Proxy\TrustProxies as Middleware;
use Illuminate\Http\Request;

class TrustProxies extends Middleware
{
    /**
     * The trusted proxies for this application.
     *se encarga de especificar qué proxies deben ser confiables para la aplicación. Esto es importante cuando la aplicación Laravel se ejecuta detrás de un proxy o un balanceador de carga, ya que necesitamos decirle a Laravel que confíe en ciertos proxies para obtener correctamente la dirección IP real del cliente.
     * @var array|string|null
     */
    protected $proxies;

    /**
     * The headers that should be used to detect proxies.
     * especifica los encabezados que Laravel debe utilizar para determinar si una solicitud ha pasado a través de un proxy.
     * @var int
     */
    protected $headers = Request::HEADER_X_FORWARDED_FOR | Request::HEADER_X_FORWARDED_HOST | Request::HEADER_X_FORWARDED_PORT | Request::HEADER_X_FORWARDED_PROTO | Request::HEADER_X_FORWARDED_AWS_ELB;
}
