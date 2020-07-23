<?php

namespace App\Http\Controllers;

use App\SelectAnswer;
use Illuminate\Http\Request;

class SelectAnswerController extends Controller
{
    public function index()
    {
        return SelectAnswer::all();
    }
    public function show(SelectAnswer $selectAnswer)
    {
        return $selectAnswer;
    }
    public function store(Request $request)
    {
        $selectAnswer = Answer::create($request->all());
        return response()->json($selectAnswer, 201);
    }
    public function update(Request $request,SelectAnswer $selectAnswer)
    {
        $selectAnswer = SelectAnswer::findOrFail($id);
        return response()->json($selectAnswer, 200);
        ;
    }
    public function delete(SelectAnswer $selectAnswer)
    {
        $selectAnswer->delete();
        return response()->json(null, 204);

    }
}
