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

Route::get('ingredients/create', 'IngredientController@create');

Route::post('ingredients/create', 'IngredientController@store');

Route::get('ingredients/show/{id}', 'IngredientController@show');

Route::get('ingredients/edit/{id}', 'IngredientController@edit');

Route::post('ingredients/edit/{id}', 'IngredientController@update');

Route::post('/{id}', 'IngredientController@destroy');


Auth::routes();
