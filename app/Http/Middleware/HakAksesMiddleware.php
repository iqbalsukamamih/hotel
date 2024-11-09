<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HakAksesMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->hakakses != 'admin') {
            abort(404);
        }
        return $next($request);
    }
}
