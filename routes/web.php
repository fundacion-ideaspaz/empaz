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
Route::get('/', function () {
    $role = Auth::user()->role;
    switch($role){
        case 'empresa':
            return redirect('/perfil/empresa');
        default:
            return redirect('/profile/user');
    }
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/faq', 'FaqController@index')->name('faq');
Route::get('/glosario', 'GlosarioController@index')->name('glosario');

// Wizard Steps

Route::get('/cuestionarios/new/', 'WizardController@new');
Route::get('/cuestionarios/{cuest_id}/dimensiones/',
            'WizardController@dimensiones');
Route::get('/cuestionarios/{cuest_id}/indicadores', 'WizardController@indicadores');
Route::post('/cuestionarios/{id}/indicadores/{indicador_id}', 'DimensionesController@storeIndicadores');
Route::get('/cuestionarios/{cuest_id}/preguntas/', 'WizardController@preguntas');
Route::post('/cuestionarios/{id}/preguntas/{pregunta_id}', 'IndicadoresController@storePreguntas');

// Users Routes
Route::get('/users', 'UserController@index');
Route::get('/users/new/{role}', 'UserController@create');
Route::post('/users', 'UserController@store');
Route::get('/users/{id}/edit', 'UserController@edit');
Route::post('/users/{id}', 'UserController@update');
Route::get('/users/{id}', 'UserController@show');
Route::get('/users/{id}/delete', 'UserController@delete');
Route::post('/users/{id}/delete', 'UserController@deleteConfirm');
Route::get('/users/{id}/activate/{code}', 'ProfileController@activateAccount');
Route::get('/profile/empresa', 'ProfileController@profileEmpresa');
Route::get('/profile/user', 'ProfileController@profileUser');

// Dimensiones Routes
Route::get('/dimensiones', 'DimensionesController@index');
Route::get('/dimensiones/new/', 'DimensionesController@create');
Route::post('/dimensiones', 'DimensionesController@store');
Route::get('/dimensiones/{id}/edit', 'DimensionesController@edit');
Route::post('/dimensiones/{id}/indicadores/{indicador_id}/delete',
            'DimensionesController@deleteIndicadores');
Route::post('/dimensiones/{id}', 'DimensionesController@update');
Route::get('/dimensiones/{id}', 'DimensionesController@show');
Route::get('/dimensiones/{id}/delete', 'DimensionesController@delete');
Route::post('/dimensiones/{id}/delete', 'DimensionesController@deleteConfirm');

// Indicadores Routes
Route::get('/indicadores', 'IndicadoresController@index');
Route::get('/indicadores/new/', 'IndicadoresController@create');
Route::post('/indicadores', 'IndicadoresController@store');
Route::get('/indicadores/{id}/edit', 'IndicadoresController@edit');
Route::post('/indicadores/{id}/preguntas/{pregunta_id}/delete',
            'IndicadoresController@deletePreguntas');
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
Route::post('/cuestionarios', 'CuestionariosController@store');
Route::get('/cuestionarios/{id}/edit', 'CuestionariosController@edit');
Route::post('/cuestionarios/{id}/dimensiones/{dimension_id}', 'CuestionariosController@storeDimensiones');
Route::post('/cuestionarios/{id}/dimensiones/{dimension_id}/delete',
            'CuestionariosController@deleteDimensiones');
Route::post('/cuestionarios/{id}', 'CuestionariosController@update');
Route::get('/cuestionarios/{id}', 'CuestionariosController@show');
Route::get('/cuestionarios/{id}/delete', 'CuestionariosController@delete');
Route::post('/cuestionarios/{id}/delete', 'CuestionariosController@deleteConfirm');

// Responder Cuestionario Routes

Route::get('/responder/{id}', 'ResponderController@index');
Route::post('/responder/{id}', 'ResponderController@store');

//  Reportes

Route::get('reportes/{cuest_id}', 'DashboardController@reporteIndicadores');
