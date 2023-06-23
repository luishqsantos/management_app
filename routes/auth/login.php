<?php

use Illuminate\Support\Facades\Route;

Route::post('login', 'Auth\LoginController@login');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::middleware('auth')->post('logout', 'Auth\LoginController@logout')->name('logout');
