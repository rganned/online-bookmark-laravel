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

//
Route::get('/', 'HomeController@index')->name('index');

//
Route::group(['prefix' => 'settings'], function () {
    Route::get('/', 'SettingsController@index');
    Route::put('/update/bookmark', 'SettingsController@update_bookmark');
    Route::put('/update/account', 'SettingsController@update_account');
});

//
Route::group(['prefix' => 'collections'], function () {
    Route::get('/{id}', 'CollectionController@show');
    Route::post('/new', 'CollectionController@store');
    Route::get('/edit/{id}', 'CollectionController@edit');
    Route::put('/update/{id}', 'CollectionController@update');
    Route::get('/delete/{id}', 'CollectionController@destroy');
});

//
Route::group(['prefix' => 'bookmarks'], function () {
    Route::post('/new', 'BookmarkController@store');
    Route::get('/edit/{id}', 'BookmarkController@edit');
    Route::put('/update/{id}', 'BookmarkController@update');
    Route::get('/delete/{id}', 'BookmarkController@destroy');

});

//
Route::get('/home', function() { return view('home'); })->name('home');
Route::get('/about', function() { return view('about'); })->name('about');
Route::get('/policy', function() { return view('policy'); })->name('policy');

//
Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::redirect('register', 'login', 301); // silinecek

//
Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
 
    return "Cleared!";
 });