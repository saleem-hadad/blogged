<?php

namespace BinaryTorch\Blogged;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class BloggedServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(Blogged::class, function () {
            return new Blogged();
        });

        $this->app->alias(Blogged::class, 'Blogged');

        $this->registerRoutes();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
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
}
