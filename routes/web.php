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
Route::get('/', 'PagesController@index');

// Other page routes
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

// Auth Controller Route
Auth::routes();

// Additional Resource Controller Routes
Route::get('/categories/disable/{id}', 'ArtCategoriesController@disable');
Route::get('/categories/restore/{id}', 'ArtCategoriesController@restore');
Route::get('/categories/disabled', 'ArtCategoriesController@disabled');

// Artist
Route::get('/artists/disable/{id}', 'ArtistsController@disable');
Route::get('/artists/restore/{id}', 'ArtistsController@restore');
Route::get('/artists/disabled', 'ArtistsController@disabled');
Route::get('/artists/all', 'ArtistsController@all');

// Artworks
Route::get('/artworks/archive/{id}', 'ArtWorksController@archive');
Route::get('/artworks/restore/{id}', 'ArtWorksController@restore');
Route::get('/artworks/archived', 'ArtWorksController@archived');
Route::get('/artworks/admin/{link}', 'ArtWorksController@adminDisplayByCat');
Route::get('/artworks/{link}', 'ArtWorksController@displayByCat');

// News
Route::get('/news/archive/{id}', 'NewsController@archive');
Route::get('/news/restore/{id}', 'NewsController@restore');
Route::get('/news/archived', 'NewsController@archived');
Route::get('/news/all', 'NewsController@all');
Route::get('/news/{link}', 'NewsController@displayByLink');

// Events
Route::get('/events/archive/{id}', 'EventsController@archive');
Route::get('/events/restore/{id}', 'EventsController@restore');
Route::get('/events/archived', 'EventsController@archived');
Route::get('/events/all', 'EventsController@all');
Route::get('/events/{link}', 'EventsController@displayByLink');

// Gallery
Route::get('/gallery/admin/{link}', 'GalleryController@adminDisplayByEvent');

// Resource Controller Routes
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('categories', 'ArtCategoriesController');
Route::resource('artists', 'ArtistsController');
Route::resource('artworks', 'ArtWorksController');
Route::resource('comp-details', 'CompDetailsController');
Route::resource('contacts', 'ContactsController');
Route::resource('gallery', 'GalleryController');
Route::resource('news', 'NewsController');
Route::resource('newsletter', 'NewsletterController');
Route::resource('events', 'EventsController');

//
