<?php

use Illuminate\Support\Facades\Route;

Route::resource('product', 'ProductController');

//Pedidos do Produto
Route::get('/product-order/create/{order}', 'ProductOrderController@create')->name('product_order.create');
Route::post('/product-order/store/{order}', 'ProductOrderController@store')->name('product_order.store');
Route::delete('/product-order/store/{productOrder}', 'ProductOrderController@destroy')->name('product_order.destroy');

//Produtos detalhes
Route::resource('product-detail', 'ProductDetailController');