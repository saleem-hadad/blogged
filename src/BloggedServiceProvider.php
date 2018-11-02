<?php

namespace BinaryTorch\Blogged;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use BinaryTorch\Blogged\Commands\InstallCommand;

class BloggedServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerRoutes();
        
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'blogged');
        
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->app->make('Illuminate\Database\Eloquent\Factory')->load(__DIR__ . '/../database/factories');
    }

    /**
     * Register the Blogged routes.
     *
     * @return void
     */
    protected function registerRoutes()
    {
        Route::group($this->routesConfig(), function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });
    }

    /**
     * @return array
     */
    protected function routesConfig()
    {
        return [
            'prefix'     => config('blogged.uri', 'blog'),
            'namespace'  => 'BinaryTorch\Blogged\Http\Controllers',
            'middleware' => ['web'],
        ];
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadHelpers();
        $this->registerConfigs();

        if ($this->app->runningInConsole()) {
            $this->registerPublishableResources();
            $this->registerConsoleCommands();
        }
    }

    /**
     * Load helpers.
     */
    protected function loadHelpers()
    {
        foreach (glob(__DIR__.'/Helpers/*.php') as $filename) {
            require_once $filename;
        }
    }

    /**
     * Register the package configs.
     */
    protected function registerConfigs()
    {
        $this->mergeConfigFrom(dirname(__DIR__).'/publishable/config/blogged.php', 'blogged');
    }

    /**
     * Register the publishable files.
     */
    protected function registerPublishableResources()
    {
        $publishablePath = dirname(__DIR__) . '/publishable';

        $publishable = [
            'blogged_config' => [
                "{$publishablePath}/config/blogged.php" => config_path('blogged.php'),
            ],
            'blogged_assets' => [
                "{$publishablePath}/assets/" => public_path('vendor/binarytorch/blogged/assets'),
            ],
        ];

        foreach ($publishable as $group => $paths) {
            $this->publishes($paths, $group);
        }
    }

    /**
     * Register the commands accessible from the Console.
     */
    protected function registerConsoleCommands()
    {
        $this->commands(InstallCommand::class);
    }
}
