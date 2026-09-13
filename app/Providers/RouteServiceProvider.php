<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{

    public const HOME = '/';
    protected $namespace='App\Http\Controllers';

    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {

            Route::middleware(['web','throttle:300,1'])->namespace($this->namespace)->group(base_path('routes/web.php'));
            Route::middleware(['web','throttle:300,1'])->namespace($this->namespace)->group(base_path('routes/client.php'));
            Route::prefix('api')->namespace($this->namespace)->middleware('api')->group(base_path('routes/api.php'));
        });
    }


    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60);
        });
        // RateLimiter::for('global', function (Request $request) {
        //     return Limit::perMinute(1);
        // });
        // RateLimiter::for('web', function (Request $request) {
        //     return Limit::perMinute(1);
        // });

    }
}
