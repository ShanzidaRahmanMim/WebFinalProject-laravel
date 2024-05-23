<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Http\Request;


class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }
    public function handle($request, Closure $next, ...$guards)
    {
        // Assuming that `auth()->user()->role == 2` is checking if the user is authenticated and authorized
        if (auth()->user() && auth()->user()->role == 2) {
            return $next($request);
        }
        
        return redirect()->route('login');
    }

}
