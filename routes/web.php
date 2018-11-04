<?php

use Illuminate\Support\Facades\Route;

// Dashboard route..
Route::view(config('blogged.routes.dashboard'), 'blogged::dashboard.index')->middleware('blogged');
Route::view(config('blogged.routes.dashboard') . '/{page}', 'blogged::dashboard.index')->where('page', '.*')->middleware('blogged');

// Blog routes..
Route::get(config('blogged.routes.blog') . '/', 'BlogController@index')->name('index');

// Dynamic model matching..
Route::get(config('blogged.routes.blog') . '/{article}', 'BlogController@show')->name('show');