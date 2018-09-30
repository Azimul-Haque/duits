<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        if (env("APP_ENV", "local")) {
        
        } else {
            $this->app->bind('path.public', function() {
                return realpath(base_path().'/../public_html');
            });
        }
    }
}
