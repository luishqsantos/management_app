<?php

use Illuminate\Support\Facades\Auth;
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

Route::post('/contact', 'SiteContactController@store')->name('site.contact');
Route::get('/contact', 'SiteContactController@index')->name('site.contact');


Route::middleware('auth')
->prefix('/app')->group(function () {

    Route::get('/home', 'HomeController@index')->name('app.home');

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
    Route::delete('/product-order/store/{productOrder}', 'ProductOrderController@destroy')->name('product_order.destroy');

    //Produtos detalhes
    Route::resource('product-detail', 'ProductDetailController');

    //Contatos
    Route::resource('contact', 'ContactController');
    Route::post('/contact/reply', 'ContactController@reply')->name('contact.reply');

});

Route::fallback(function () {
    echo "Desculpe! O endedeço digitado não existe.";
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
