<?php

use Illuminate\Support\Facades\Route;

// Blog routes..
Route::get('/', 'ArticleController@index')->name('index');

// Dashboard routes..
Route::get(config('blogged.routes.dashboard'), 'DashboardController@index')->middleware('blogged')->name('dashboard.index');

// Dynamic model matching..
Route::get('/{article}', 'ArticleController@show')->name('show');