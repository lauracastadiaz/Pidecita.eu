<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustHosts as Middleware;

class TrustHosts extends Middleware
{
    /**
     * Get the host patterns that should be trusted.
     * los patrones de host que deben ser confiables para la aplicación. 
     * Esto es importante para proteger la aplicación contra ciertos ataques, como los ataques de suplantación de host (host spoofing)
     * @return array
     */
    public function hosts()
    {
        return [
            $this->allSubdomainsOfApplicationUrl(),
        ];
    }
}
