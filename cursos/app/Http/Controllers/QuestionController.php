<?php

namespace App\Http\Controllers;
use App\Level;
use App\Question;
use App\Http\Resources\Question as QuestionResources;
use App\Http\Resources\QuestionCollection;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    private static $messages = [
        'required'=>'El campo :attribute es obligatorio.',
        'unique'=>':attribute ya existe en este cuestionario',
        'integer'=>'El formato de :attribute no es correcto',
        'string'=> 'El formato de :attribute no es valido'
        //'exists'=>'El :attribute que ingreso no existe en la base de datos'
    ];

    public function index()
    {
        $this->authorize('viewAny', Question::class);
        return new QuestionCollection(Question::all());
    }

    /**
     * Display a listing of the resource.
     *
     * @param Level $level
     * @return \Illuminate\Http\JsonResponse
     */

    public function ind(Level $level)
    {
        $questions = $level->question;
        return response()->json(QuestionResources::collection($questions),200);
    }

    public function show(Question $question)
    {
        $this->authorize('view', $question);
        return  response()->json(new QuestionResources($question),200);
    }

    public function store(Request $request)
    {
        $this->authorize('create', Question::class);
        $request->validate([
            'description' => 'required|string|unique:questions|max:255',
            'value' => 'required|integer',
            //'level_id'=>'required|exists:levels,id'
        ],self::$messages);

        $question = Question::create($request->all());
        return response()->json(new QuestionResources($question), 201);
    }

    public function update(Request $request, Question $question)
    {
        $this->authorize('update', $question);
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
        $this->authorize('delete', $question);
        $question->delete();
        return response()->json(null, 204);
    }
}
