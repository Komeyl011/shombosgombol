<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/change_lang', 'HomeController@changeLang')->name('language.change');
    /**
     * Show The requested comic page to the user
     */
    Route::get('/show/{key}', 'ComicsController@index')->name('comic.show');

    /**
     * Routes for content admins
     */
    Route::group(['middleware' => ['guest']], function () {
        Route::group(['namespace' => 'Auth'], function () {
            Route::get('/timoros/login', 'LoginController@index')->name('admin.login-show');
            Route::post('/timoros/login', 'LoginController@login')->name('admin.login-perform');
        });
    });
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    });
});

Route::group(['middleware' => ['auth']], function () {
    Route::group(['namespace' => 'App\Livewire'], function () {
        Route::get('/timoros', 'Admin')->name('admin.index');
        Route::get('/timoros/comics/showcase', 'AdminShowAll')->name('admin.comic.show-all');
        Route::get('/timoros/comic/upload', 'AdminUpload')->name('admin.comic.upload-page');
        Route::get('/timoros/comic/edit/{key}', 'AdminUpdate')->name('admin.comic.edit-page');
        Route::post('/timoros/comic/upload', 'AdminController@upload')->name('admin.comic.upload-perform');
        Route::post('/timoros/comic/edit', 'AdminController@edit')->name('admin.comic.edit-perform');
    });
});
