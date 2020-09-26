<?php

namespace App\Http\Controllers;

use App\Answer;

use App\Question;
use Illuminate\Http\Request;
use App\Http\Resources\Answer as AnswerResources;
use App\Http\Resources\AnswerCollection;

class AnswerController extends Controller
{
    private static $messages = [
        'required'=>'El campo :attribute es obligatorio.',
        'unique'=>'La :attribute ya existe en las respuestas',
        'integer'=>'El formato de :attribute no es valido',
        'string'=> 'El formato de :attribute no es valido'
        //'exists'=>'El campo :attribute que ingreso no existe en la base de datos'
    ];

    public function index()
    {
        $this->authorize('viewAny', Answer::class);
        return new AnswerCollection( Answer::all());
    }

    public function ind(Question $question)
    {
        $answers = $question->answer;
        return response()->json(AnswerResources::collection($answers),200);
    }

    public function show( Answer $answer)
    {
        $this->authorize('view', $answer);
        return  response()->json(new AnswerResources($answer),200);
    }
    public function store(Request $request)
    {
        $this->authorize('create', Answer::class);
        $request->validate([
            'description' => 'required|unique:questions|string|max:255',
            'correct'=>'required|integer',
            //'question_id'=>'required|exists:questions,id'
        ],self::$messages);

        $answer = Answer::create($request->all());
        return response()->json(new AnswerResources($answer),201);
    }

    public function update(Request $request,Answer $answer)
    {
        $this->authorize('update', $answer);
        $request->validate([
            'description' => 'required|unique:questions,description,'.$answer->id.'|string|max:255',
            'correct'=>'required|integer',
            //'question_id'=>'required|exists:questions,id'
        ],self::$messages);

        $answer->update($request->all());
        return response()->json($answer,200);
    }
    public function delete(Request $request,Answer $answer)
    {
        $this->authorize('delete', $answer);
        $answer->delete();
        return response()->json(null,204);
    }
}
