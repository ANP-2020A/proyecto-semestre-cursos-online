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
    public function show($id)
    {
        return SelectAnswer::find($id);
    }
    public function store(Request $request)
    {
        return SelectAnswer::create($request->all());
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
