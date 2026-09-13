<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotClient
{
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated with the client guard
        if (Auth::guard('client')->check()) {
            return $next($request);
        }

        // If not, redirect to the client login page
        return redirect()->route('client.login');
    }
}