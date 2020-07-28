<?php

use App\Answer;
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

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@authenticate');
Route::get('cursos', 'CursosController@index');
Route::get('cursos/{cursos}', 'CursosController@show');

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('user', 'UserController@getAuthenticatedUser');

    //Registros
    Route::get('registros', 'RegistroController@index');
    Route::get('registros/{registro}', 'RegistroController@show');
    Route::post('registros', 'RegistroController@store');
    Route::put('registros/{registro}', 'RegistroController@update');
    Route::delete('registros/{registro}', 'RegistroController@delete');
    //Preguntas
    Route::get('preguntas', 'PreguntaController@index');
    Route::get('preguntas/{preguntas}', 'PreguntaController@show');
    Route::post('preguntas', 'PreguntaController@store');
    Route::put('preguntas/{preguntas}', 'PreguntaController@update');
    Route::delete('preguntas/preguntas}', 'PreguntaController@delete');
    //Respuestas
    Route::get('answers', 'AnswerController@index');
    Route::get('answers/{id}', 'AnswerController@show');
    Route::post('answers', 'AnswerController@store');
    Route::put('answers/{id}', 'AnswerController@update');
    Route::delete('answers/{id}', 'AnswerController@delete');
    //Respuestas seleccionadas
    Route::get('select_answers', 'SelectAnswerController@index');
    Route::get('select_answers/{id}', 'SelectAnswerController@show');
    Route::post('select_answers', 'SelectAnswerController@store');
    Route::put('select_answers/{id}', 'SelectAnswerController@update');
    Route::delete('select_answers/{id}', 'SelectAnswerController@delete');
    //Historial
    Route::get('historial', 'HistorialController@index');
    Route::get('historial/{historial}', 'HistorialController@show');
    Route::post('historial', 'HistorialController@store');
    Route::put('historial/{historial}', 'HistorialController@update');
    Route::delete('historial/historial}', 'HistorialController@delete');
    //Certificados
    Route::get('certificates', 'CertificateController@index');
    Route::get('certificates/{id}', 'CertificateController@show');
    Route::post('certificates', 'CertificateController@store');
    Route::put('certificates/{id}', 'CertificateController@update');
    Route::delete('certificates/{id}', 'CertificateController@delete');
    //Cursos

    Route::post('cursos', 'CursosController@store');
    Route::put('cursos/{cursos}', 'CursosController@update');
    Route::delete('cursos/cursos}', 'CursosController@delete');
    //Nivel
    Route::get('nivel', 'NivelController@index');
    Route::get('nivel/{nivel}', 'NivelController@show');
    Route::post('nivel', 'NivelController@store');
    Route::put('nivel/{nivel}', 'NivelController@update');
    Route::delete('nivel/nivel}', 'NivelController@delete');
    //Contenido
    Route::get('contenido', 'ContenidoController@index');
    Route::get('contenido/{contenido}', 'ContenidoController@show');
    Route::post('contenido', 'ContenidoController@store');
    Route::put('contenido/{contenido}', 'ContenidoController@update');
    Route::delete('contenido/contenido}', 'ContenidoController@delete');
});

//Usuarios
/*Route::get('users', 'UserController@index');
Route::get('users/{user}', 'UserController@show');
Route::post('users', 'UserController@store');
Route::put('users/{user}', 'UserController@update');
Route::delete('users/user}', 'UserController@delete');
*/

