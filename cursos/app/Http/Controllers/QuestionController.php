<?php

namespace App\Http\Controllers;

use App\Question;
use App\Http\Resources\Question as QuestionResource;
use App\Http\Resources\QuestionCollection;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    private static $messages = [
        'required'=>'El campo :attribute es obligatorio.',
        'unique'=>':attribute ya existe en este cuestionario',
        'integer'=>'El formato de :attribute no es correcto',
        //'exists'=>'El :attribute que ingreso no existe en la base de datos'
    ];

    public function index()
    {
        return new QuestionCollection(Question::all());
    }

    public function show(Question $question)
    {
        return  response()->json(new QuestionResource($question),200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|unique:questions|max:255',
            'value' => 'required|integer',
            //'level_id'=>'required|exists:levels,id'
        ],self::$messages);

        $question = Question::create($request->all());

        return response()->json($question, 201);
    }

    public function update(Request $request, Question $question)
    {
        $request->validate([
            'description' => 'required|string|unique:questions,description'.$question->id.'|max:255',
            'value' => 'required|integer',
            //'user_id'=>'required|exists:users.id'
        ],self::$messages);

        $question->update($request->all());
        return response()->json($question, 200);
    }

    public function delete(Request $request, Question $question)
    {
        $question->delete();
        return response()->json(null, 204);
    }
}
