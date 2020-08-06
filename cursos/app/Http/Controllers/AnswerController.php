<?php

namespace App\Http\Controllers;

use App\Answer;

use Illuminate\Http\Request;
use App\Http\Resources\Answer as AnswerResource;
use App\Http\Resources\AnswerCollection;

class AnswerController extends Controller
{
    private static $messages = [
        'required'=>'El campo :attribute es obligatorio.',
        'unique'=>'La :attribute ya existe en las respuestas',
        'integer'=>'El formato de :attribute no es valido',
        //'exists'=>'El campo :attribute que ingreso no existe en la base de datos'
    ];

    public function index()
    {
        return new AnswerCollection( Answer::all());
    }
    public function show( Answer $answer)
    {
        return  response()->json(new AnswerResource($answer),200);
    }
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|unique:questions|string|max:255',
            'correct'=>'required|integer',
            //'question_id'=>'required|exists:questions,id'
        ],self::$messages);

        return Answer::create($request->all());
    }
    public function update(Request $request,Answer $answer)
    {

        $request->validate([
            'description' => 'required|unique:questions,descrption,'.$answer->id.'|string|max:255',
            'correct'=>'required|integer',
            //'question_id'=>'required|exists:questions,id'
        ],self::$messages);

        $answer->update($request->all());
        return $answer;
    }
    public function delete(Request $request,Answer $answer)
    {
        $answer->delete();
        return 204;
    }
}
