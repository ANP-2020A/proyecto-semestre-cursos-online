<?php

namespace App\Http\Controllers;
use App\Content;
use Illuminate\Http\Request;
use App\Http\Resources\Content as ContentResource;
use App\Http\Resources\ContentCollection;

class ContentController extends Controller
{
    public function index()
    {
        return new ContentCollection(Content::paginate());
    }

    public function show(Content $content)
    {
        return response()->json(new ContentResource($content),200);
    }

    public function store(Request $request)
    {
        $contenido = Content::create($request->all());
        return response()->json($contenido, 201);
    }

    public function update(Request $request, Content $content)
    {
        $content ->update($request->all());
        return response()->json($content, 200);
    }

    public function delete(Request $request, Content $content)
    {
        $content->delete();
        return response()->json(null, 204);
    }

}
