<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
class LanguageMiddleware
{
    public function handle($request, Closure $next)
    {
        $lang = $request->header('lang');
        if (!$lang) {
            $lang = 'en';
        }
        \App::setLocale($lang);
        return $next($request);
    }
}