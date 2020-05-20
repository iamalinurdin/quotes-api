<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register', 'API\AuthController@register');
Route::post('login', 'API\AuthController@login');
Route::get('me', 'API\UserController@me')->middleware('auth:api');
Route::post('quote/store', 'API\QuoteController@store')->middleware('auth:api');
Route::get('quote', 'API\QuoteController@index')->middleware('auth:api');
Route::get('quote/{quote}', 'API\QuoteController@show')->middleware('auth:api');
Route::put('quote/{id}', 'API\QuoteController@update')->middleware('auth:api');