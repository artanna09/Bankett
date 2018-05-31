<?php

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

// Izveidot visus ceļus priekš Laravel iebūvētās lietotāju pārvaldes
Auth::routes();

// Atļaut piekļuvi šiem resursiem tikai administratoriem
Route::group(['middleware' => 'admin'], function() {
    Route::post('/blog/create', 'BlogController@store')->name('createPost');
    Route::get('/blog/delete/{id}', 'BlogController@destroy')->name('deletePost');
    Route::get('/blog/add', 'BlogController@create')->name('addPost');
    Route::get('/blog/edit/{id}', 'BlogController@edit')->name('editPost');
    Route::put('/blog/update/{id}', 'BlogController@update')->name('updatePost');
    Route::post('/services/create', 'ServicesController@store')->name('createService');
    Route::get('/services/add', 'ServicesController@create')->name('addService');
    Route::get('/services/delete/{id}', 'ServicesController@destroy')->name('deleteService');
    Route::get('/services/edit/{id}', 'ServicesController@edit')->name('editService');
    Route::put('/services/update/{id}', 'ServicesController@update')->name('updateService');
});

// Atļaut piekļuvi šiem resursem autentificētiem lietotājiem
Route::group(['middleware' => 'auth'], function() {
    Route::get('/blog', 'BlogController@index')->name('blog');
    Route::get('/blog/{id}', 'BlogController@show')->name('showPost');
    Route::get('/services', 'ServicesController@index')->name('services');
    Route::get('/services/favorites', 'ServicesController@favorites')->name('favorites');
    Route::get('/services/favorites/remove/{id}', 'ServicesController@removeFromFavorites')->name('removeFavorite');
    Route::get('/services/request', 'ServicesController@request')->name('requestService');
    Route::post('/services/request', 'ServicesController@emailRequest')->name('sendServiceRequest');
    Route::get('/services/type/{id}', 'ServicesController@filter')->name('filterServices');
    Route::get('/services/{id}', 'ServicesController@show')->name('showService');
    Route::get('/services/{id}/contact', 'ServicesController@contact')->name('contactService');
    Route::post('/services/contact', 'ServicesController@emailContact')->name('emailServiceContact');
    Route::post('/services/{id}', 'ServicesController@storeFeedback')->name('storeFeedback');
    Route::get('/services/favor/{id}', 'ServicesController@addToFavorites')->name('addToFavorites');
    Route::get('/services/delete/feedback/{id}', 'ServicesController@deleteFeedback')->name('deleteFeedback');
    Route::get('/user', 'UserController@index')->name('userProfile');
    Route::get('/user/edit', 'UserController@edit')->name('editUserProfile');
    Route::put('/user/update', 'UserController@update')->name('updateUserProfile');
    Route::get('/user/delete', 'UserController@destroy')->name('deleteUser');
    Route::get('/imageError', 'IndexController@imageError')->name('imageError');
});

// Atļaut piekļuvi šiem resursiem visiem lietotājiem
Route::get('/', 'IndexController@index')->name('index');
