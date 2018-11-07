<?php

use Illuminate\Support\Facades\Route;

Route::get('/articles', 'ArticleController@index');
Route::post('/articles', 'ArticleController@store');