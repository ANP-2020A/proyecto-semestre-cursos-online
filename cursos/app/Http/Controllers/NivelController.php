<?php

namespace App\Http\Controllers;
use App\Nivel;
use Illuminate\Http\Request;

class NivelController extends Controller
{
    public function index()
    {
        return Nivel::all();
    }

    public function show(Nivel $nivel)
    {
        return $nivel;
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
