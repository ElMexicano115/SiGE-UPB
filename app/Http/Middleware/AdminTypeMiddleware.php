<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminTypeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  int  $type
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $type)
    {
        // Verificar si el usuario está autenticado
        if (!Auth::check()) {
            return redirect('login')->with('error', 'Debes iniciar sesión primero.');
        }

        // Verificar si el usuario tiene el tipo de administrador correcto
        $user = Auth::user();
        if ($user->admin != $type) {
            return redirect('/')->with('error', 'No tienes permiso para acceder a esta página.');
        }

        return $next($request);
    }
}
