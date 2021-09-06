<?php

namespace tanyudii\LaravelException;

use Illuminate\Support\ServiceProvider;

class LaravelExceptionServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'tanyudii');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'tanyudii');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-exception.php', 'laravel-exception');

        // Register the service the package provides.
        $this->app->singleton('laravel-exception', function ($app) {
            return new LaravelException;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravel-exception'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/laravel-exception.php' => config_path('laravel-exception.php'),
        ], 'laravel-exception.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/tanyudii'),
        ], 'laravel-exception.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/tanyudii'),
        ], 'laravel-exception.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/tanyudii'),
        ], 'laravel-exception.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
