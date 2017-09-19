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

Route::get('/users', 'UserController@index');
Route::get('/users/new/{role}', 'UserController@create');
Route::post('/users', 'UserController@store');
Route::get('/users/{id}/edit', 'UserController@edit');
Route::post('/users/{id}', 'UserController@update');
Route::get('/users/{id}', 'UserController@show');
Route::get('/users/{id}/delete', 'UserController@delete');
Route::post('/users/{id}/delete', 'UserController@deleteConfirm');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/questions', 'QuestionController@index');
Route::get('/questions/new/', 'QuestionController@create');
