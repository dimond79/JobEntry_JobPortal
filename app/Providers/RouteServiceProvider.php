<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });

        // $this->app['router']->middleware('web')->group(function () {
        //     Route::get('/redirect', function () {
        //         if (Auth::guard('jobseeker')->check()) {
        //             return redirect()->route('jobseeker.dashboard');
        //         }

        //         if (Auth::guard('employer')->check()) {
        //             return redirect()->route('employer.dashboard');
        //         }

        //         if (Auth::guard('web')->check()) {
        //             return redirect('/admin');
        //         }

        //         return redirect('/login'); // fallback if no one is logged in
        //     });
        // });
    }
}
