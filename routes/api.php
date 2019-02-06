<?php

use Illuminate\Support\Facades\Route;

// Blogged Articles...
Route::get('/articles', 'ArticleController@index');
Route::post('/articles', 'ArticleController@store');
Route::get('/articles/{article}', 'ArticleController@show')->where('article', '.*');
Route::put('/articles/{article}', 'ArticleController@update')->where('article', '.*');
Route::delete('/articles/{article}', 'ArticleController@destroy')->where('article', '.*');

// Blogged Categories...
Route::get('/categories', 'CategoryController@index');
Route::post('/categories', 'CategoryController@store');
Route::put('/categories/{category}', 'CategoryController@update')->where('category', '.*');
Route::delete('/categories/{category}', 'CategoryController@destroy')->where('category', '.*');

// Blog Images Uploads..
Route::post('/images', 'ImageController@store');
Route::delete('/images', 'ImageController@destroy');