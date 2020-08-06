<?php

namespace App\Http\Controllers;
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
        'exists'=>'El campo :attribute que ingreso no existe en la base de datos'
    ];

    public function index()
    {
        return new LevelCollection(Level::all());
    }

    public function show(Level $level)
    {
        return response()->json(new LevelResources($level),200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|unique:levels|max:255',
            'number' => 'required|integer',
            'description' => 'required|string|max:255',
            'course_id'=>'required|exists:courses,id'
        ],self::$messages);

        $level = Level::create($request->all());
        return response()->json($level, 201);
    }

    public function update(Request $request, Level $level)
    {
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
        $level->delete();
        return response()->json(null, 204);
    }
}
