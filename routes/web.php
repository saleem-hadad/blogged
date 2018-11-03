<?php

use Illuminate\Support\Facades\Route;

// Dashboard route..
Route::view(config('blogged.routes.dashboard'), 'blogged::dashboard.index')->middleware('blogged');

// Blog routes..
Route::get('/', 'BlogController@index')->name('index');

// Dynamic model matching..
Route::get('/{article}', 'BlogController@show')->name('show');