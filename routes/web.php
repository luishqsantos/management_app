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

//Home Site
Route::get('/', 'MainController@main')->name('site.index');

//sobre
Route::get('/about', 'AboutController@about')->name('site.about');

//Contato
Route::resource('/contact', 'SiteContactController')->only(['index', 'store'])->name('index', 'site.contact');

//Auth Login
Route::prefix('')->group(base_path('routes/auth/login.php'));

//Auth Email
Route::prefix('')->group(base_path('routes/auth/email.php'));

//Auth
Route::prefix('')->group(base_path('routes/auth/password.php'));

//Auth Register
Route::middleware('auth')->prefix('')->group(base_path('routes/auth/register.php'));

//Admin
Route::middleware('auth')->prefix('/app')->group(function () {

    //Home Admin
    Route::get('/', 'HomeController@index')->name('app.home');

    //Fornecedores
    Route::prefix('')->group(base_path('routes/web/provider.php'));

    //Produtos
    Route::prefix('')->group(base_path('routes/web/product.php'));

    //Clientes
    Route::prefix('')->group(base_path('routes/web/client.php'));

    //Pedido
    Route::prefix('')->group(base_path('routes/web/order.php'));

    //Contatos
    Route::prefix('')->group(base_path('routes/web/contact.php'));
});


Route::fallback(function () {
    return view('fallback.fallback');
});