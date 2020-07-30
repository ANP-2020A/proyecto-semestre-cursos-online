<?php

namespace App\Http\Controllers;
use App\Cursos;
use Illuminate\Http\Request;
use App\Http\Resources\Cursos as CursosResources;
use App\Http\Resources\CursosCollection;

class CursosController extends Controller
{
    public function index()
    {
        return new CursosCollection(Cursos::all());
    }

    public function show(Cursos $cursos)
    {
        return response()->json(new CursosResources($cursos));
    }

    public function store(Request $request)
    {
        $cursos = Cursos::create($request->all());
        return response()->json($cursos, 201);
    }

    public function update(Request $request, Cursos $cursos)
    {
        $cursos ->update($request->all());
        return response()->json($cursos, 200);
    }

    public function delete(Request $request, Cursos $cursos)
    {
        $cursos->delete();
        return response()->json(null, 204);
    }
}
