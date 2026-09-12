<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response; // <--- Asegúrate de que tenga el 'use'

class CheckClientRole
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->rol === 'usuario') {
            return $next($request);
        }

        abort(403, 'Acceso no autorizado para este rol.');
    }
}