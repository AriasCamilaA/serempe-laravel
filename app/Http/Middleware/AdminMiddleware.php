<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role->Name === 'Admin') {
            return $next($request);
        }

        return redirect('/home');  // Redirige a la página de inicio si el usuario no es admin
    }
}
