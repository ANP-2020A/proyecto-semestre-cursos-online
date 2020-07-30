<?php

namespace App\Http\Controllers;
use App\Nivel;
use App\Http\Resources\Nivel as NivelesResources;
use App\Http\Resources\NivelCollection;
use Illuminate\Http\Request;

class NivelController extends Controller
{
    public function index()
    {
        return new NivelCollection(Nivel::all());
    }

    public function show(Nivel $nivel)
    {
        return response()->json(new NivelesResources($nivel),200);
    }

    public function store(Request $request)
    {
        $nivel = Nivel::create($request->all());
        return response()->json($nivel, 201);
    }

    public function update(Request $request, Nivel $nivel)
    {
        $nivel ->update($request->all());
        return response()->json($nivel, 200);
    }

    public function delete(Request $request, Nivel $nivel)
    {
        $nivel->delete();
        return response()->json(null, 204);
    }
}
