<?php

namespace App\Providers;

use App\Statistics\HitsStatistic;
use App\Statistics\UniqueCookieStatistic;
use App\Statistics\UniqueIPStatistic;
use Illuminate\Support\ServiceProvider;

class StatistServiceProvider extends ServiceProvider
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
        $this->app->bind('statist.hits', function ($app, $args) {
            return new HitsStatistic($args[0]);
        });
        
        $this->app->bind('statist.unique_ip', function ($app, $args) {
            return new UniqueIPStatistic($args[0]);
        });
        
        $this->app->bind('statist.unique_cookie', function ($app, $args) {
            return new UniqueCookieStatistic($args[0]);
        });
    }
}
