<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class EstruturaMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!session('id_estrutura')) {
            return redirect()->route('estruturas.index');
        }
        return $next($request);
    }
}