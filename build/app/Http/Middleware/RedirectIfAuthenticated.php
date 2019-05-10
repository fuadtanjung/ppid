<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        if ($guard == 'users') {
            if (Auth::guard($guard)->check()) {
                return redirect('/dashboard');
            }
        }
        else{
            if (Auth::guard('pengguna')->check()) {
                return redirect('/profil');
            }
        }
        return $next($request);
    }
}
