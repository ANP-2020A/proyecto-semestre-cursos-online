<?php

namespace App\Http\Controllers;

use App\Course;
use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\Course as CourseResources;
use App\Http\Resources\CourseCollection;

class CourseController extends Controller
{
    private static $messages = [
        'required' => 'El campo :attribute es obligatorio.',
        'unique' => 'El campo :attribute que ingreso ya existe',
        'date' => 'El formato de :attribute no es valido',
        'integer' => 'El formato de :attribute no es valido',
        'string' => 'El formato de :attribute no es valido'
    ];

    public function index()
    {
        //$this->authorize('viewAny', Course::class);
        return new CourseCollection(Course::all());
    }

    /**
     * Display a listing of the resource.
     *
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function ind(User $user)
    {
        $courses = $user->courses;
        return response()->json(CourseResources::collection($courses), 200);
    }

    public function show(Course $course)
    {
        //$this->authorize('view', $course);
        return response()->json(new CourseResources($course),200);
    }

    public function store(Request $request)
    {
        $this->authorize('create', Course::class);
        $request->validate([
            'name' => 'required|string|unique:courses|max:255',
            'description' => 'required',
            'type' => 'required|string',
            'date_start' => 'required|date',
            'num_level' => 'required|integer',
            //'user_id'=>'required|exists:users,id'
            'image' => 'required|image|dimensions:min_width=200,min_height=200'
        ], self::$messages);

        //$course = Course::create($request->all());

        $course = new Course($request->all());
        $path = $request->image->store('public/courses');

        $course->image = $path;
        $course->save();

        return response()->json(new CourseResources($course), 201);
    }

    public function update(Request $request, Course $course)
    {
        $this->authorize('update', $course);
        $request->validate([
            'name' => 'required|string|unique:courses,name,' . $course->id . '|max:255',
            'description' => 'required',
            'type' => 'required|string|max:255',
            'date_start' => 'required|date',
            'num_level' => 'required|integer',
            //'user_id'=>'required|exists:users.id'
        ], self::$messages);

        $course->update($request->all());
        return response()->json($course, 200);
    }

    public function delete(Request $request, Course $course)
    {
        $this->authorize('delete', $course);
        $course->delete();
        return response()->json(null, 204);
    }
}
