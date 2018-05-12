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

Auth::routes();
Route::group(['middleware' => 'admin'], function() {
    Route::get('/blog/add', 'BlogController@create')->name('addPost');
    Route::post('/blog', 'BlogController@store')->name('createPost');
    Route::post('/services', 'ServicesController@store')->name('createService');
    Route::post('/services', 'ServicesController@destroy')->name('deleteService');
    Route::get('/services/edit/{id}', 'ServicesController@edit')->name('editService');
});
Route::group(['middleware' => 'auth'], function() {
    Route::get('/blog', 'BlogController@index')->name('blog');
    Route::get('/blog/{id}', 'BlogController@show')->name('showPost');
    Route::get('/services', 'ServicesController@index')->name('services');
    Route::get('/services/add', 'ServicesController@create')->name('addService');
    Route::get('/services/memo', 'ServicesController@memo')->name('memo');
    Route::get('/services/request', 'ServicesController@request')->name('requestService');
    Route::post('/services', 'ServicesController@email')->name('sendServiceRequest');
    Route::get('/services/type/{id}', 'ServicesController@sort')->name('sortServices');
    Route::get('/services/{id}', 'ServicesController@show')->name('showService');
    Route::get('/services/{id}/email', 'ServicesController@email')->name('emailService');
});
Route::get('/', 'IndexController@index');