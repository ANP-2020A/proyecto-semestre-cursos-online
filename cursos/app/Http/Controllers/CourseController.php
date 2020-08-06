<?php

namespace App\Http\Controllers;
use App\Course;
use Illuminate\Http\Request;
use App\Http\Resources\Course as CourseResources;
use App\Http\Resources\CourseCollection;

class CourseController extends Controller
{
    private static $messages = [
        'required'=>'El campo :attribute es obligatorio.',
        'unique'=>'El campo :attribute que ingreso ya existe',
        'date'=>'El formato de :attribute no es valido',
        'integer'=>'El formato de :attribute no es valido'
    ];

    public function index()
    {
        return new CourseCollection(Course::all());
    }

    public function show(Course $course)
    {
        return response()->json(new CourseResources($course));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|unique:courses|max:255',
            'description' => 'required',
            'type' => 'required|string',
            'date_start' => 'required|date',
            'num_level'=> 'required|integer',
            //'user_id'=>'required|exists:users,id'
        ],self::$messages);

        $course = Course::create($request->all());
        return response()->json($course, 201);
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required|string|unique:courses,name,'.$course->id.'|max:255',
            'description' => 'required',
            'type' => 'required|string|max:255',
            'date_start' => 'required|date',
            'num_level'=> 'required|integer',
            //'user_id'=>'required|exists:users.id'
        ],self::$messages);

        $course ->update($request->all());
        return response()->json($course, 200);
    }

    public function delete(Request $request, Course $course)
    {
        $course->delete();
        return response()->json(null, 204);
    }
}
