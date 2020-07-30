<?php

namespace App\Http\Controllers;
use App\Contenido;
use Illuminate\Http\Request;
use App\Http\Resources\Contenido as ContenidoResource;
use App\Http\Resources\ContenidoCollection;

class ContenidoController extends Controller
{
    public function index()
    {
        return new ContenidoCollection(Contenido::paginate());
    }

    public function show(Contenido $contenido)
    {
        return response()->json(new ContenidoResource($contenido),200);
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
