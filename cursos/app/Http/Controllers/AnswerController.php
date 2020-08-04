<?php

namespace App\Http\Controllers;

use App\Answer;

use Illuminate\Http\Request;
use App\Http\Resources\Answer as AnswerResource;
use App\Http\Resources\AnswerCollection;

class AnswerController extends Controller
{
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
        return Answer::create($request->all());
    }
    public function update(Request $request,Answer $answer)
    {

        $answer->update($request->all());
        return $answer;
    }
    public function delete(Request $request,Answer $answer)
    {
        $answer->delete();
        return 204;
    }
}
