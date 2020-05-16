<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register', 'API\AuthController@register');
Route::post('login', 'API\AuthController@login');
Route::get('me', 'API\UserController@me')->middleware('auth:api');