<?php

namespace App\Providers;

use App\Http\Middleware\Admin;
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
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            $this->mapPanelRoutes();
            $this->mapAdminRoutes();
            if (!app()->environment('production')) {
                $this->mapDevRoutes();
            }
        });
    }

    /**
     * Configure panel routes
     *
     * @return void
     */
    protected function mapPanelRoutes()
    {
        foreach (glob(base_path('routes/web/*.php')) as $routeFile) {
            $routeFileName = explode('.', basename($routeFile))[0];
            Route::middleware(['web', 'auth:sanctum', 'verified'])
                ->prefix($routeFileName)
                ->name($routeFileName.'.')
                ->group($routeFile);
        }
    }

    /**
     * Configure admin routes
     *
     * @return void
     */
    protected function mapAdminRoutes()
    {
        foreach (glob(base_path('routes/admin/*.php')) as $routeFile) {
            $routeFileName = explode('.', basename($routeFile))[0];
            Route::middleware(['web', 'auth:sanctum', 'verified', Admin::class])
                ->prefix('admin/'.$routeFileName)
                ->name('admin.'.$routeFileName.'.')
                ->group($routeFile);
        }
    }

    public function mapDevRoutes()
    {
        foreach (glob(base_path('routes/dev/*.php')) as $routeFile) {
            $routeFileName = explode('.', basename($routeFile))[0];
            Route::middleware(['web'])
                ->prefix('dev/'.$routeFileName)
                ->name('dev.'.$routeFileName.'.')
                ->group($routeFile);
        }
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
