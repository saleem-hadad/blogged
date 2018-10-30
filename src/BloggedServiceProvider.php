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
     * Register the Horizon routes.
     *
     * @return void
     */
    protected function registerRoutes()
    {
        Route::group([
            'prefix'     => config('blogged.uri', 'blog'),
            'namespace'  => 'BinaryTorch\Blogged\Http\Controllers',
            'middleware' => ['web'],
        ], function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });
    }
}
