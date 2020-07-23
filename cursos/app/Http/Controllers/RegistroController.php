<?php

namespace App\Http\Controllers;

use App\Registro;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function index()
    {
        return Registro::all();
    }

    public function show(Registro $registro)
    {
        return $registro;
    }

    public function store(Request $request)
    {
        $registro = Registro::create($request->all());

        return response()->json($registro, 201);
    }

    public function update(Request $request, Registro $registro)
    {
        $registro->update($request->all());
        return response()->json($registro, 200);
    }

    public function delete(Request $request, Registro $registro)
    {
        $registro->delete();
        return response()->json(null, 204);
    }
}
