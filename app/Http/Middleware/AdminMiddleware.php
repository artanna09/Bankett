<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // Pārbauda, vai lietotājs ir administrators
    public function handle($request, Closure $next)
    {
        if (!(Auth::check() && Auth::user()->isAdmin()))
        {
            return redirect('')->withErrors('Access denied to ADMIN functionality!');
        }
        return $next($request);
    }
}
