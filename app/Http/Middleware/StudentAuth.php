<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfNotAdmin
{
    public function handle($request, Closure $next, $guard="student")
    {
        if(!auth()->guard($guard)->check()) {
            return redirect(view('welcome'));
        }

        return $next($request);
    }
}
