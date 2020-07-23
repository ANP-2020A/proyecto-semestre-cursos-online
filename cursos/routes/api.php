<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('registros', 'RegistroController@index');
Route::get('registros/{registro}', 'RegistroController@show');
Route::post('registros', 'RegistroController@store');
Route::put('registros/{registro}', 'RegistroController@update');
Route::delete('registros/{registro}', 'RegistroController@delete');

Route::get('users', 'UserController@index');
Route::get('users/{user}', 'UserController@show');
Route::post('users', 'UserController@store');
Route::put('users/{user}', 'UserController@update');
Route::delete('users/user}', 'UserController@delete');

Route::get('preguntas', 'PreguntaController@index');
Route::get('preguntas/{preguntas}', 'PreguntaController@show');
Route::post('preguntas', 'PreguntaController@store');
Route::put('preguntas/{preguntas}', 'PreguntaController@update');
Route::delete('preguntas/preguntas}', 'PreguntaController@delete');
