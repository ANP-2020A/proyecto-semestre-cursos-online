<?php

namespace App\Http\Controllers;

use App\Preguntas;
use Illuminate\Http\Request;

class PreguntaController extends Controller
{
    public function index()
    {
        return Preguntas::all();
    }

    public function show(Preguntas $preguntas)
    {
        return $preguntas;
    }

    public function store(Request $request)
    {
        $preguntas = Preguntas::create($request->all());

        return response()->json($preguntas, 201);
    }

    public function update(Request $request, Preguntas $preguntas)
    {
        $preguntas->update($request->all());
        return response()->json($preguntas, 200);
    }

    public function delete(Request $request, Preguntas $preguntas)
    {
        $preguntas->delete();
        return response()->json(null, 204);
    }
}
