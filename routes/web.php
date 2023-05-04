<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'MainController@main')->name('site.index');

Route::get('/about', 'AboutController@about')->name('site.about');

Route::post('/contact', 'ContactController@store')->name('site.contact');
Route::get('/contact', 'ContactController@contact')->name('site.contact');


Route::get('/login/{error?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@authLogin')->name('site.login');

Route::middleware('authentication')
->prefix('/app')->group(function () {

    Route::get('/home', 'HomeController@index')->name('app.home');
    Route::get('/logout', 'LoginController@logout')->name('app.logout');

    //Fornecedores
    Route::resource('provider', 'ProviderController');

    //Produtos
    Route::resource('product', 'ProductController');

    //Clientes
    Route::resource('client', 'ClientController');

    //Pedido
    Route::resource('order', 'OrderController');

    //Pedidos do Produto
    Route::get('/product-order/create/{order}', 'ProductOrderController@create')->name('product_order.create');
    Route::post('/product-order/store/{order}', 'ProductOrderController@store')->name('product_order.store');

    //Route::delete('/product-order/store/{order}/{product}', 'ProductOrderController@destroy')->name('product_order.destroy');
    Route::delete('/product-order/store/{productOrder}', 'ProductOrderController@destroy')->name('product_order.destroy');

    //Produtos detalhes
    Route::resource('product-detail', 'ProductDetailController');

});

Route::fallback(function () {
    echo "Desculpe! O endedeço digitado não existe.";
});
