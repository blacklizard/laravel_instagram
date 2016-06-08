<?php

namespace Jeevan\Laravel;

use Jeevan\Instagram;
use Illuminate\Support\ServiceProvider;

class InstagramServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('instagram', function ($app) {

            $config = config('instagram.config');
            $scope = config('instagram.scope');

            return new Instagram($config, $scope);
        });
    }

    /**
     * Register any other events for your application.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/instagram.php' => config_path('instagram.php'),
        ]);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['instagram'];
    }
}