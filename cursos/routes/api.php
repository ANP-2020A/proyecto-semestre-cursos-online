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



//<<< HEAD
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();

//Respuestas
    Route::get('answers', 'AnswerController@index');
    Route::get('answers/{answer}', 'AnswerController@show');
    Route::post('answers', 'AnswerController@store');
    Route::put('answers/{answer}', 'AnswerController@update');
    Route::delete('answers/{answer}', 'AnswerController@delete');
//Certificados
    Route::get('certificates', 'CertificateController@index');
    Route::get('certificates/{certificate}', 'CertificateController@show');
    Route::post('certificates', 'CertificateController@store');
    Route::put('certificates/{certificate}', 'CertificateController@update');
    Route::delete('certificates/{certificate}', 'CertificateController@delete');
//Respuestas seleccionadas
    Route::get('selectanswers', 'SelectAnswerController@index');
    Route::get('selectanswers/{selectAnswer}', 'SelectAnswerController@show');
    Route::post('selectanswers', 'SelectAnswerController@store');
    Route::put('selectanswers/{selectAnswer}', 'SelectAnswerController@update');
    Route::delete('selectanswers/{selectAnswer}', 'SelectAnswerController@delete');
