<?php

namespace App\Http\Controllers;
use App\Historial;
use Illuminate\Http\Request;

class HistorialController extends Controller
{
    public function index()
    {
        return Historial::all();
    }

    public function show(Historial $historial)
    {
        return $historial;
    }

    public function store(Request $request)
    {
        $historial = Historial::create($request->all());
        return response()->json($historial, 201);
    }

    public function update(Request $request, Historial $historial)
    {
        $historial ->update($request->all());
        return response()->json($historial, 200);
    }

    public function delete(Request $request, Historial $historial)
    {
        $historial->delete();
        return response()->json(null, 204);
    }
}
