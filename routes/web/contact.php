<?php

use Illuminate\Support\Facades\Route;

Route::resource('contact', 'ContactController');
Route::post('/contact/reply', 'ContactController@reply')->name('contact.reply');