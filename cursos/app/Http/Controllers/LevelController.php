<?php

namespace App\Http\Controllers;
use App\Course;
use App\Level;
use App\Http\Resources\Level as LevelResources;
use App\Http\Resources\LevelCollection;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index()
    {
        return new LevelCollection(Level::all());
    }

    public function show(Level $level)
    {
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
        $level = Level::create($request->all());
        return response()->json($level, 201);
    }

    public function update(Request $request, Level $level)
    {
        $level ->update($request->all());
        return response()->json($level, 200);
    }

    public function delete(Request $request, Level $level)
    {
        $level->delete();
        return response()->json(null, 204);
    }
}
