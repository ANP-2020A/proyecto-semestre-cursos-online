<?php

namespace App\Http\Controllers;
use App\Contenido;
use Illuminate\Http\Request;

class ContenidoController extends Controller
{
    public function index()
    {
    return Contenido::all();
    }

    public function show(Contenido $contenido)
    {
        return $contenido;
    }

    public function store(Request $request)
    {
        $contenido = Contenido::create($request->all());
        return response()->json($contenido, 201);
    }

    public function update(Request $request, Contenido $contenido)
    {
        $contenido ->update($request->all());
        return response()->json($contenido, 200);
    }

    public function delete(Request $request, Contenido $contenido)
    {
        $contenido->delete();
        return response()->json(null, 204);
    }

}
