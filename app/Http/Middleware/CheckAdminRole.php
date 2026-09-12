<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminRole
{
    public function handle(Request $request, Closure $next): Response
    {
        // Si no está logueado o su rol no es admin, abortamos o redirigimos
        if (!auth()->check() || auth()->user()->rol !== 'admin') {
            abort(403, 'Acceso no autorizado.');
        }

        return $next($request);
    }
}