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
    return redirect('home');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/faq', 'FaqController@index')->name('faq');
Route::get('/glosario', 'GlosarioController@index')->name('glosario');

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

// Preguntas Routes
Route::get('/preguntas', 'PreguntasController@index');
Route::get('/preguntas/new/', 'PreguntasController@create');
Route::post('/preguntas', 'PreguntasController@store');
Route::get('/preguntas/{id}/edit', 'PreguntasController@edit');
Route::post('/preguntas/{id}', 'PreguntasController@update');
Route::get('/preguntas/{id}', 'PreguntasController@show');
Route::get('/preguntas/{id}/delete', 'PreguntasController@delete');
Route::post('/preguntas/{id}/delete', 'PreguntasController@deleteConfirm');

// Cuestionarios Routes
Route::get('/cuestionarios', 'CuestionariosController@index');
Route::get('/cuestionarios/new/', 'CuestionariosController@create');
Route::post('/cuestionarios', 'CuestionariosController@store');
Route::get('/cuestionarios/{id}/edit', 'CuestionariosController@edit');
Route::post('/cuestionarios/{id}', 'CuestionariosController@update');
Route::get('/cuestionarios/{id}', 'CuestionariosController@show');
Route::get('/cuestionarios/{id}/delete', 'CuestionariosController@delete');
Route::post('/cuestionarios/{id}/delete', 'CuestionariosController@deleteConfirm');

// Responder Cuestionario Routes

Route::get('/responder/{id}', 'ResponderController@index');
Route::post('/responder/{id}', 'ResponderController@store');
// Route::get('/responder/new/', 'ResponderController@create');
// Route::post('/responder', 'ResponderController@store');
// Route::get('/responder/{id}/edit', 'ResponderController@edit');
// Route::post('/responder/{id}', 'ResponderController@update');
// Route::get('/responder/{id}', 'ResponderController@show');
// Route::get('/responder/{id}/delete', 'ResponderController@delete');
// Route::post('/responder/{id}/delete', 'ResponderController@deleteConfirm');
