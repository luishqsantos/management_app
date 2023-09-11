<?php

use Illuminate\Support\Facades\Route;

Route::resource('user', 'UserController')->except(['create', 'store']);

Route::get('user/{user}/reset', 'UserController@getResetPasswordForm')->name('reset.password');