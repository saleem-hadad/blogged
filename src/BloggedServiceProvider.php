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
        $this->registerRoutes();
        
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'Blogged');
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
        //
    }
}
