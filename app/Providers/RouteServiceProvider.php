<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {

            // app()->setLocale( request()->segment(1) );

            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                // ->prefix( app()->getLocale() )
                ->group(base_path('routes/web/web.php'));

            // Web->Admin
            Route::middleware(['web', 'auth', 'isAdmin'])
                ->prefix(  /* app()->getLocale()  .*/ '/admin')
                ->group(base_path('routes/web/admin.php'));
            // Web->Portal
            Route::middleware(['web', 'auth'])
                ->prefix( /*app()->getLocale() .*/ '/portal')
                ->group(base_path('routes/web/portal.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
