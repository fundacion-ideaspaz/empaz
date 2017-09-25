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

Route::get('/', function () {
    return view('welcome');
});

// Users Routes
Route::get('/users', 'UserController@index');
Route::get('/users/new/{role}', 'UserController@create');
Route::post('/users', 'UserController@store');
Route::get('/users/{id}/edit', 'UserController@edit');
Route::post('/users/{id}', 'UserController@update');
Route::get('/users/{id}', 'UserController@show');
Route::get('/users/{id}/delete', 'UserController@delete');
Route::post('/users/{id}/delete', 'UserController@deleteConfirm');

// Dimensiones Routes
Route::get('/dimensiones', 'DimensionesController@index');
Route::get('/dimensiones/new/', 'DimensionesController@create');
Route::post('/dimensiones', 'DimensionesController@store');
Route::get('/dimensiones/{id}/edit', 'DimensionesController@edit');
Route::post('/dimensiones/{id}', 'DimensionesController@update');
Route::get('/dimensiones/{id}', 'DimensionesController@show');
Route::get('/dimensiones/{id}/delete', 'DimensionesController@delete');
Route::post('/dimensiones/{id}/delete', 'DimensionesController@deleteConfirm');

// Indicadores Routes
Route::get('/indicadores', 'IndicadoresController@index');
Route::get('/indicadores/new/', 'IndicadoresController@create');
Route::post('/indicadores', 'IndicadoresController@store');
Route::get('/indicadores/{id}/edit', 'IndicadoresController@edit');
Route::post('/indicadores/{id}', 'IndicadoresController@update');
Route::get('/indicadores/{id}', 'IndicadoresController@show');
Route::get('/indicadores/{id}/delete', 'IndicadoresController@delete');
Route::post('/indicadores/{id}/delete', 'IndicadoresController@deleteConfirm');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/questions', 'QuestionController@index');
Route::get('/questions/new/', 'QuestionController@create');
