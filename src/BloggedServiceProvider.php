<?php

namespace BinaryTorch\Blogged;

use Gate;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use BinaryTorch\Blogged\Commands\InstallCommand;
use BinaryTorch\Blogged\Commands\PoliciesCommand;

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

        Route::middlewareGroup('blogged-front', config('blogged.middleware-front', []));
        Route::middlewareGroup('blogged-back', config('blogged.middleware-back', []));

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->app->make('Illuminate\Database\Eloquent\Factory')->load(__DIR__ . '/../database/factories');

        $ns = $this->app->getNamespace();

        $this->registerPolicies();
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
            'middleware' => 'blogged-front',
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
            'middleware' => 'blogged-back',
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
        $this->commands(PoliciesCommand::class);
    }

    protected function registerPolicies()
    {
        $ns = $this->app->getNamespace();

        $policies = [
            \BinaryTorch\Blogged\Models\Article::class => $ns."Policies\BloggedArticlePolicy",
            \BinaryTorch\Blogged\Models\Category::class => $ns."Policies\BloggedCategoryPolicy",
        ];

        foreach ($policies as $model => $policy) {
            if (class_exists($policy)) {
                Gate::policy($model, $policy);
            }
        }
    }
}
