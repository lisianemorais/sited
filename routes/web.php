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

Route::get('/', 'TedController@index')->name('index');
Route::get('/create', 'TedController@create')->name('create');
Route::post('/store', 'TedController@store')->name('store');
Route::put('/{ted}/edit', 'TedController@edit')->name('edit');
Route::post('/update/{ted}', 'TedController@update')->name('update');
Route::delete('/destroy/{ted}', 'TedController@destroy')->name('destroy');

