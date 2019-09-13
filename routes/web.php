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

// Routes List for the IngredientController
Route::get('/', 'IngredientController@index');
Route::get('ingredients/create', 'IngredientController@create');
Route::post('ingredients/create', 'IngredientController@store');
Route::get('ingredients/show/{id}', 'IngredientController@show');
Route::get('ingredients/edit/{id}', 'IngredientController@edit');
Route::post('ingredients/edit/{id}', 'IngredientController@update');
Route::post('ingredients/{id}', 'IngredientController@destroy');

// Routes List for the RecipeListController
Route::get('recipes', 'RecipeListController@index');
Route::post('recipes/show/{id}', 'RecipeListController@show');
Route::post('recipes/select{id}', 'RecipeListController@store');

// Routes List for the HistoricRecipeController
Route::get('historic', 'HistoricRecipeController@index');

Auth::routes();
