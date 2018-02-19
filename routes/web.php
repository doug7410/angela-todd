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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/woo', 'wooController@index');

Auth::routes();

Route::get('/angie', 'AngieController@index');

Route::post('/sliders', 'SliderController@store');

Route::delete('/sliders/{id}', 'SliderController@delete');

Route::post('/sliders/reorder', 'SliderController@update');

Route::post('/categories', 'CategoriesController@store');
Route::get('/categories', 'CategoriesController@index');
