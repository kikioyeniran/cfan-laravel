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

// Landing Page Route
Route::get('/', function () {
    return view('welcome');
});

// Auth Controller Route
Auth::routes();

// Resource Controller Routes
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('categories', 'ArtCategoriesController');
Route::resource('artists', 'ArtistsController');
Route::resource('comp-details', 'CompDetailsController');
Route::resource('contacts', 'ContactsController');
Route::resource('gallery', 'GalleryController');
Route::resource('news', 'NewsController');
