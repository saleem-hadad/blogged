<?php

use Illuminate\Support\Facades\Route;

// Dashboard routes..
Route::get(config('blogged.routes.dashboard'), 'DashboardController@index')->middleware('blogged')->name('dashboard');

// Blog routes..
Route::get('/', 'ArticleController@index')->name('index');

// Dynamic model matching..
Route::get('/{article}', 'ArticleController@show')->name('show');