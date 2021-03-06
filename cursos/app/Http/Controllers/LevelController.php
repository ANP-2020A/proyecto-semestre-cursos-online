<?php

namespace App\Http\Controllers;
use App\Course;
use App\Level;
use App\Http\Resources\Level as LevelResources;
use App\Http\Resources\LevelCollection;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    private static $messages = [
        'required'=>'El campo :attribute es obligatorio.',
        'unique'=>'El :attribute ya existe en este curso',
        'integer'=>'El formato de :attribute no es valido',
        'exists'=>'El campo :attribute que ingreso no existe en la base de datos',
        'string'=> 'El formato de :attribute no es valido'
    ];

    public function index()
    {
        $this->authorize('viewAny', Level::class);
        return new LevelCollection(Level::all());
    }

    public function show(Level $level)
    {
        $this->authorize('view', $level);
        return response()->json(new LevelResources($level),200);
    }
    /**
     * Display a listing of the resource.
     *
     * @param Course $course
     * @return \Illuminate\Http\JsonResponse
     */
    public function ind(Course $course)
    {
        $levels = $course->level;
        return response()->json(LevelResources::collection($levels),200);
    }

    public function store(Request $request)
    {
        $this->authorize('create', Level::class);
        $request->validate([
            'title' => 'required|string|unique:levels|max:255',
            'number' => 'required|integer',
            'description' => 'required|string|max:255',
            'course_id'=>'required|exists:courses,id'
        ],self::$messages);

        $level = Level::create($request->all());
        return response()->json(new LevelResources($level), 201);
    }

    public function update(Request $request, Level $level)
    {
        $this->authorize('update', $level);
        $request->validate([
            'title' => 'required|string|unique:levels,title,'.$level->id.'|max:255',
            'number' => 'required|integer',
            'description' => 'required|string|max:255',
            'course_id'=>'required|exists:courses,id'
        ],self::$messages);

        $level ->update($request->all());
        return response()->json($level, 200);
    }

    public function delete(Request $request, Level $level)
    {
        $this->authorize('delete', $level);
        $level->delete();
        return response()->json(null, 204);
    }
}
