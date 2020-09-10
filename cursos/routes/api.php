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
Route::get('courses', 'CourseController@index');
Route::get('courses/{course}', 'CourseController@show');

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('user', 'UserController@getAuthenticatedUser');

    //Registros
    Route::get('registers', 'RegisterController@index');
    Route::get('registers/{register}', 'RegisterController@show');
    Route::post('registers', 'RegisterController@store');
    Route::put('registers/{register}', 'RegisterController@update');
    Route::delete('registers/{register}', 'RegisterController@delete');
    //Preguntas
    Route::get('questions', 'QuestionController@index');
    Route::get('questions/{question}', 'QuestionController@show');

    Route::get('levels/{level}/questions', 'QuestionController@ind');
    Route::post('questions', 'QuestionController@store');
    Route::put('questions/{question}', 'QuestionController@update');
    Route::delete('questions/{question}', 'QuestionController@delete');
    //Respuestas
    Route::get('answers', 'AnswerController@index');
    Route::get('answers/{answer}', 'AnswerController@show');

    Route::get('questions/{question}/answers', 'AnswerController@ind');

    Route::post('answers', 'AnswerController@store');
    Route::put('answers/{answer}', 'AnswerController@update');
    Route::delete('answers/{answer}', 'AnswerController@delete');
    //Respuestas seleccionadas
    Route::get('select_answers', 'SelectAnswerController@index');
    Route::get('select_answers/{selectAnswer}', 'SelectAnswerController@show');
    Route::post('select_answers', 'SelectAnswerController@store');
    Route::put('select_answers/{selectAnswer}', 'SelectAnswerController@update');
    Route::delete('select_answers/{selectAnswer}', 'SelectAnswerController@delete');
    //Historial
    Route::get('records', 'RecordController@index');
    Route::get('records/{record}', 'RecordController@show');
    Route::post('records', 'RecordController@store');
    Route::put('records/{record}', 'RecordController@update');
    Route::delete('records/{record}', 'RecordController@delete');
    //Certificados
    Route::get('registers/{register}/certificates', 'CertificateController@index');
    Route::get('registers/{register}/certificates/{certificate}', 'CertificateController@show');
    Route::post('registers/{register}/certificates', 'CertificateController@store');
    Route::put('registers/{register}/certificates/{certificate}', 'CertificateController@update');
    Route::delete('registers/{register}/certificates/{certificate}', 'CertificateController@delete');
    //Cursos

    Route::post('courses', 'CourseController@store');
    Route::put('courses/{course}', 'CourseController@update');
    Route::delete('courses/{course}', 'CourseController@delete');
    //Nivel
    Route::get('levels', 'LevelController@index');
    Route::get('levels/{level}', 'LevelController@show');
    Route::post('levels', 'LevelController@store');
    Route::put('levels/{level}', 'LevelController@update');
    Route::delete('levels/{level}', 'LevelController@delete');
    //Contenido
    Route::get('contents', 'ContentController@index');
    Route::get('levels/{level}/contents', 'ContentController@ind');
    Route::post('contents', 'ContentController@store');
    Route::put('contents/{content}', 'ContentController@update');
    Route::delete('contents/{content}', 'ContentController@delete');

    //Pruebas para visualizar usuarios
    Route::get('users', 'UserController@index');
    Route::get('users/{user}', 'UserController@show');

    Route::get('users/{user}/courses', 'CourseController@ind');

    //Route::get('courses/{course}/registers', 'RegisterController@ind');
    Route::get('courses/{course}/levels', 'LevelController@ind');

});

//Usuarios
/*Route::get('users', 'UserController@index');
Route::get('users/{user}', 'UserController@show');
Route::post('users', 'UserController@store');
Route::put('users/{user}', 'UserController@update');
Route::delete('users/user}', 'UserController@delete');
*/

