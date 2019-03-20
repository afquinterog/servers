<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Telescope\TelescopeServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \App\Models\ServerMetric::observe(\App\Observers\MetricObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->isLocal()) {
            $this->app->register(TelescopeServiceProvider::class);
        }

        $this->app->bind(
            'App\Cloud\GenericCloudProvider',
            'App\Cloud\Aws'
        );

        $this->app->singleton('App\Helpers\Metrics', function ($app) {
            return new \App\Helpers\Metrics;
        });
    }
}
