<?php

namespace App\Http\Controllers;

use App\Record;
use App\SelectAnswer;
use App\Http\Resources\SelectAnswerCollection;
use App\Http\Resources\SelectAnswer as SelectAnswerResource;
use Illuminate\Http\Request;

class SelectAnswerController extends Controller
{
    public function index()
    {
        return new SelectAnswerCollection(SelectAnswer::all());
    }
    public function show(SelectAnswer $selectAnswer)
    {
        return  response()->json(new SelectAnswerResource($selectAnswer),200);
    }
    public function store(Request $request)
    {
        $record = Record::create($request->all());
        return response()->json($record,201);
    }
    public function update(Request $request, $id)
    {
        $answer = SelectAnswer::findOrFail($id);
        $answer->update($request->all());
        return $answer;
    }
    public function delete(Request $request, $id)
    {
        $answer = SelectAnswer::findOrFail($id);
        $answer->delete();
        return 204;
    }
}
