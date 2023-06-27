<?php

use Illuminate\Support\Facades\Route;

Route::resource('user', 'UserController')->except(['create', 'store']);