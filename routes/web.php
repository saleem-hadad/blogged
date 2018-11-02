<?php

use Illuminate\Support\Facades\Route;

// Blog routes..
Route::get('/', 'ArticleController@index')->name('index');
Route::get('/{article}', 'ArticleController@show')->name('show');

// Admin routes..
