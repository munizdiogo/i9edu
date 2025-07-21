<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class EstruturaMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Session::has('id_estrutura')) {
            return redirect()->route('estrutura.selecionar');
        }
        return $next($request);
    }
}