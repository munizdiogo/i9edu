<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class CheckPermission
{
    public function handle($request, Closure $next, $permission)
    {
        if (!auth()->user() || !auth()->user()->hasPermission($permission)) {
            abort(403);
        }
        return $next($request);
    }
}