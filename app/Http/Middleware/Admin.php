<?php
namespace App\Http\Middleware;

use Closure;

class Admin
{
    public function handle($request, Closure $next)
    {
        
        if ($request->user() == null || !$request->user()->hasRole('admin') || !$request->user()->isAdmin()) {
            return redirect()->route('login');
        }
        return $next($request);
    }
}
?>