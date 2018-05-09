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
Route::get('/', 'IndexController@index');
Route::get('/blog/add', 'BlogController@create')->name('addPost')->middleware('admin');
Route::get('/blog', 'BlogController@index')->name('blog');
Route::post('/blog', 'BlogController@store')->name('createPost')->middleware('admin');
Route::get('/services/add', 'ServicesController@create')->name('addService');
Route::post('/services', 'ServicesController@store')->name('createService');
