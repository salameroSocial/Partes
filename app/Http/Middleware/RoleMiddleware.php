<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        // Verificar si el usuario está autenticado
        if (!Auth::check()) {
            return redirect('/login');  // Redirigir al login si no está autenticado
        }

        // Verificar si el usuario tiene el rol requerido
        if (!Auth::user()->hasRole($role)) {
            abort(403, 'Access denied. Something went wrong'); // Error 403 si no tiene el rol
        }

        return $next($request);
    }
}
