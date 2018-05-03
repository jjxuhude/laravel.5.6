<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\RouteConfig;

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
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton('routeConfig',function ($app){
            return new RouteConfig();
        });
    }
}
