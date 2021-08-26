<?php

namespace Exzachlyvv\LaravelLearn;

use Exzachlyvv\LaravelLearn\Commands\LearnCommand;
use Illuminate\Support\ServiceProvider;

class LaravelLearnServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-learn');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-learn');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('laravel-learn.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/laravel-learn'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/laravel-learn'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/laravel-learn'),
            ], 'lang');*/

            // Registering package commands.
            $this->commands([
                LearnCommand::class,
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'laravel-learn');

        // Register the main class to use with the facade
        $this->app->singleton('laravel-learn', function () {
            return new LaravelLearn;
        });
    }
}
