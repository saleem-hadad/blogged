<?php

namespace BinaryTorch\Blogged;

use Illuminate\Routing\Router;
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

        Route::middlewareGroup('blogged', config('blogged.middleware', []));

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
        Route::group($this->apiRoutesConfig(), function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
        });

        Route::group($this->webRoutesConfig(), function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });
    }

    /**
     * @return array
     */
    protected function webRoutesConfig()
    {
        return [
            'namespace'  => 'BinaryTorch\Blogged\Http\Controllers',
            'domain'     => config('blogged.domain', null),
            'as'         => 'blogged.',
            'middleware' => 'web',
        ];
    }

    /**
     * @return array
     */
    protected function apiRoutesConfig()
    {
        return [
            'namespace'  => 'BinaryTorch\Blogged\Http\Controllers',
            'domain'     => config('blogged.domain', null),
            'prefix'     => 'blogged-api',
            'middleware' => 'blogged',
        ];
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConfigs();

        if ($this->app->runningInConsole()) {
            $this->registerPublishableResources();
            $this->registerConsoleCommands();
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
            'blogged_views' => [
                __DIR__.'/../resources/views/partials/sidebar.blade.php' => resource_path('views/vendor/blogged/partials/sidebar.blade.php'),
                __DIR__.'/../resources/views/partials/navbar.blade.php' => resource_path('views/vendor/blogged/partials/navbar.blade.php'),
                __DIR__.'/../resources/views/partials/footer.blade.php' => resource_path('views/vendor/blogged/partials/footer.blade.php'),
                __DIR__.'/../resources/views/partials/dashboard-links.blade.php' => resource_path('views/vendor/blogged/partials/dashboard-links.blade.php'),
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
