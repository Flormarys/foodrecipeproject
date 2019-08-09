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

// Routs List for the IngredientController

Route::get('/', 'IngredientController@index');
Route::get('/edit', 'IngredientController@edit');
Route::get('/show', 'IngredientController@show');
Route::get('/create', 'IngredientController@create');
Route::post('/create', 'IngredientController@store');


Auth::routes();
