<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\RouteConfig;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton('routeConfig', function ($app) {
            return new RouteConfig();
        });
        
        $this->app->bind('docParser', function ($app) {
            return new \App\Services\DocParser();
        });
    }
}
