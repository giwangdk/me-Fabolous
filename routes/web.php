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
    });

    
    Route::prefix('mua-admin')
    ->middleware(['auth', 'mua'])
    ->namespace('MUA')
    ->group(function () {
        Route::get('/', 'DashboardController@index')->name('mua-dashboard');
        Route::resource('my-profile', 'ProfileController');
        Route::resource('makeupartist', 'MakeupartistController');
        Route::resource('gallery', 'GalleryController');
        Route::resource('pricelist', 'PricelistController');
        Route::resource('review', 'ReviewController');
    });


Auth::routes();

// Route::get('/', 'HomeController@index')->name('home');
