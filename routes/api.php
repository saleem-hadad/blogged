<?php

use Illuminate\Support\Facades\Route;

Route::get(config('blogged.routes.dashboard'), 'DashboardController@index');