<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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



Route::get('/', 'HomeController@index')->name('home');
Route::get('/categories', 'CategoryController@index')->name('categories');
Route::get('/about', 'AboutController@index')->name('about');
Route::get('/detail/{id}', 'DetailController@index')->name('detail');
Route::post('/detail/{id}', 'DetailController@store')->name('detail');
Route::get('/book/{id}', 'BookController@index')->name('book');
Route::get('/my-order', 'MyOrderController@index')->name('my-order');


Route::post('/checkout/{id}', 'CheckoutController@process')->name('checkout');
Route::get('/bayar/{id}', 'CheckoutController@bayar')->name('bayar');
// Route::post('/detail-book/{id}', 'CheckoutController@detail')->name('detail-book');
Route::post('/checkout/callback', 'CheckoutController@callback')->name('midtrans-callback');




Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->namespace('Admin')
    ->group(function () {
        Route::get('/', 'DashboardController@index')->name('admin-dashboard');
        Route::resource('category', 'CategoryController');
        Route::resource('user', 'UserController');
        Route::resource('makeupartist', 'MakeupartistController');
        Route::resource('gallery', 'GalleryController');
        Route::resource('pricelist', 'PricelistController');
        Route::resource('review', 'ReviewController');
        Route::resource('transaction', 'TransactionController');
        Route::resource('invoice', 'InvoiceController');
    });

    
    Route::prefix('mua-admin')
    ->middleware(['auth', 'mua'])
    ->namespace('MUA')
    ->group(function () {
        Route::get('/', 'DashboardController@index')->name('mua-dashboard');
        Route::get('/myprofile', 'ProfileController@index')->name('myprofile');
        Route::get('/myprofile/edit', 'ProfileController@edit')->name('myprofile.edit');
        Route::put('/myprofile', 'ProfileController@update')->name('myprofile.update');
        Route::resource('gallery', 'GalleryController', ['names' => 'gallery-mua']);
        Route::resource('pricelist', 'PricelistController', ['names' => 'pricelist-mua']);
        Route::resource('review', 'ReviewController', ['names' => 'review-mua']);
        Route::resource('transaction', 'TransactionController', ['names' => 'transaction-mua']);
        Route::resource('invoice', 'InvoiceController', ['names' => 'invoice-mua']);
    });


Auth::routes();

// Route::get('/', 'HomeController@index')->name('home');
