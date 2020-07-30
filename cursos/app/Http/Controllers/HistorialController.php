<?php

namespace App\Http\Controllers;
use App\Historial;
use App\Http\Resources\Historial as HistorialResource;
use App\Http\Resources\HistorialCollection;
use Illuminate\Http\Request;

class HistorialController extends Controller
{
    public function index()
    {
        return new HistorialCollection(Historial::all());
    }

    public function show(Historial $historial)
    {
        return response()->json(new HistorialResource($historial),200);
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
