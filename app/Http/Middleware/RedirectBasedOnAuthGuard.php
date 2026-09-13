<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectBasedOnAuthGuard {
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('client')->check()) {
            return redirect()->route('client.login');
        }
        if (Auth::guard('web')->check()) {
            return $next($request);
        }
        return redirect()->route('client.login');
    }
}
