<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Parsers\BrowserParser;
use App\Parsers\OSParser;
use App\Parsers\GeoParser;
use App\Parsers\RefererParser;

class ParsersServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('parsers.browser', function ($app) {
            return new BrowserParser();
        });
        
        $this->app->singleton('parsers.os', function ($app) {
            return new OSParser();
        });
        
        $this->app->singleton('parsers.geo', function ($app) {
            return new GeoParser();
        });
        
        $this->app->singleton('parsers.referer', function ($app) {
            return new RefererParser();
        });
    }
}
