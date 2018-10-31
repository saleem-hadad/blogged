<?php

use Illuminate\Support\Facades\Route;

// Blog routes..
Route::get('/', 'ArticleController@index');
Route::get('/{article}', 'ArticleController@show');

// Admin routes..
