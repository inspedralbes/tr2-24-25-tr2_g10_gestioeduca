<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyCsrfToken
{
    /**
     * Los URIs que deberían ser excluidos de la verificación CSRF.
     *
     * @var array
     */
    protected $except = [
        'api/*',  // Excluye las rutas API de la verificación CSRF
    ];

    /**
     * Maneja una solicitud entrante.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        return parent::handle($request, $next);
    }
}

?>
