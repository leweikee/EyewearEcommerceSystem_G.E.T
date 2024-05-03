<?php
namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    // public function handle($request, Closure $next)
    // {
    //     // Your middleware logic here
    //     return $next($request);
    // }

    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role == 1) {
            return $next($request);
        } 

        else {
            abort(403, 'Unauthorized action.');
        }
        
    }
}
