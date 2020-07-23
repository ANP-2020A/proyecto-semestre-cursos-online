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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Respuestas
Route::get('answers', 'AnswerController@index');
Route::get('answers/{id}', 'AnswerController@show');
Route::post('answers', 'AnswerController@store');
Route::put('answers/{id}', 'AnswerController@update');
Route::delete('answers/{id}', 'AnswerController@delete');
//Certificados
Route::get('certificates', 'CertificateController@index');
Route::get('certificates/{id}', 'CertificateController@show');
Route::post('certificates', 'CertificateController@store');
Route::put('certificates/{id}', 'CertificateController@update');
Route::delete('certificates/{id}', 'CertificateController@delete');
//Respuestas seleccionadas
Route::get('select_answers', 'SelectAnswerController@index');
Route::get('select_answers/{id}', 'SelectAnswerController@show');
Route::post('select_answers', 'SelectAnswerController@store');
Route::put('select_answers/{id}', 'SelectAnswerController@update');
Route::delete('select_answers/{id}', 'SelectAnswerController@delete');


