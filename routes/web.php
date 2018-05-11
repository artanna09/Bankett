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
    Route::get('/services/add', 'ServicesController@create')->name('addService');
    Route::post('/services', 'ServicesController@store')->name('createService');
});
Route::group(['middleware' => 'auth'], function() {
    Route::get('/blog', 'BlogController@index')->name('blog');
    Route::get('/blog/{id}', 'BlogController@show')->name('showPost');
    Route::get('/services', 'ServicesController@index')->name('services');
    Route::get('/services/memo', 'ServicesController@memo')->name('memo');
});
Route::get('/', 'IndexController@index');