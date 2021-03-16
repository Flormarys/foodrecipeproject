<?php
/**
 * @author  Flormarys Diaz <flormarysdiaz@gmail.com>
 * @license GPLv3 (or any later version)
 * PHP 7.3.27 
 */

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
Route::post('/', 'IngredientController@index');
Route::prefix('ingredients')->group(function () {
	Route::get('create', 'IngredientController@create');
	Route::get('show/{id}', 'IngredientController@show');
	Route::get('edit/{id}', 'IngredientController@edit');
	Route::post('create', 'IngredientController@store');
	Route::post('edit/{id}', 'IngredientController@update');
	Route::post('{id}', 'IngredientController@destroy');
});

// Routes List for the RecipeListController
Route::prefix('recipes')->group(function () {
	Route::get('', 'RecipeListController@index');
	Route::post('show/{id}', 'RecipeListController@show');
	Route::post('select{id}', 'RecipeListController@store');
});

// Routes List for the HistoricRecipeController
Route::get('historic', 'HistoricRecipeController@index');
Route::post('historic', 'HistoricRecipeController@index');

// Routes List for the UserController
Route::prefix('users')->group(function () {
	Route::get('edit', 'UserController@edit');
	Route::post('update', 'UserController@update');
});

Auth::routes();

