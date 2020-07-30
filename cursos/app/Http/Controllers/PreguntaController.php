<?php

namespace App\Http\Controllers;

use App\Preguntas;
use App\Http\Resources\Preguntas as PreguntasResource;
use App\Http\Resources\PreguntasCollection;
use Illuminate\Http\Request;

class PreguntaController extends Controller
{
    public function index()
    {
        return new PreguntasCollection(Preguntas::all());
    }

    public function show(Preguntas $preguntas)
    {
        return  response()->json(new PreguntasResource($preguntas),200);
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
