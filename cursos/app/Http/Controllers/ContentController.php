<?php

namespace App\Http\Controllers;
use App\Content;
use Illuminate\Http\Request;
use App\Http\Resources\Content as ContentResource;
use App\Http\Resources\ContentCollection;

class ContentController extends Controller
{
    private static $messages = [
        'required'=>'El campo :attribute es obligatorio.',
        //'exists'=>'El campo :attribute que ingreso no existe en la base de datos'
    ];

    public function index()
    {
        return new ContentCollection(Content::paginate(20));
    }

    public function show(Content $content)
    {
        return response()->json(new ContentResource($content),200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
          //  'level_id'=>'required|exists:levels,id'
        ],self::$messages);

        $content = Content::create($request->all());
        return response()->json($content, 201);
    }

    public function update(Request $request, Content $content)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            //'level_id'=>'required|exists:levels,id'
        ],self::$messages);

        $content ->update($request->all());
        return response()->json($content, 200);
    }

    public function delete(Request $request, Content $content)
    {
        $content->delete();
        return response()->json(null, 204);
    }

}
