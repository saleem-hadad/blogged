<?php

namespace BinaryTorch\Blogged;

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
