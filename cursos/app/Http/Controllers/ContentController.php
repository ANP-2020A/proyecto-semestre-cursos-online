<?php

namespace App\Http\Controllers;
use App\Level;
use App\Content;
use App\Http\Resources\Content as ContentResources;
use App\Http\Resources\ContentCollection;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    private static $messages = [
        'required'=>'El campo :attribute es obligatorio.',
        'string'=> 'El formato de :attribute no es valido'
        //'exists'=>'El campo :attribute que ingreso no existe en la base de datos'
    ];

    public function index()
    {
        $this->authorize('viewAny', Content::class);
        return new ContentCollection(Content::paginate(20));
    }

    /**
     * Display a listing of the resource.
     *
     * @param Level $level
     * @return \Illuminate\Http\JsonResponse
     */

    public function ind(Level $level)
    {
        $contents = $level->content;
        return response()->json(ContentResources::collection($contents),200);
    }


    public function show(Content $content)
    {
        $this->authorize('view', $content);
        return response()->json(new ContentResources($content),200);
    }

    public function store(Request $request)
    {
        $this->authorize('create', Content::class);
        $request->validate([
            'description' => 'required|string|max:255',
          //  'level_id'=>'required|exists:levels,id'
        ],self::$messages);

        $content = Content::create($request->all());
        return response()->json(new ContentResources($content), 201);
    }

    public function update(Request $request, Content $content)
    {
        $this->authorize('update', $content);
        $request->validate([
            'description' => 'required|string|max:255',
            //'level_id'=>'required|exists:levels,id'
        ],self::$messages);

        $content ->update($request->all());
        return response()->json($content, 200);
    }

    public function delete(Request $request, Content $content)
    {
        $this->authorize('delete', $content);
        $content->delete();
        return response()->json(null, 204);
    }

}
