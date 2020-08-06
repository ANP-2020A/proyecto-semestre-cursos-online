<?php

namespace App\Http\Controllers;
use App\Course;
use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\Course as CourseResources;
use App\Http\Resources\CourseCollection;

class CourseController extends Controller
{
    public function index()
    {
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
        return response()->json(CourseResources::collection($courses),200);
    }

    public function show(Course $course)
    {
        return response()->json(new CourseResources($course));
    }

    public function store(Request $request)
    {
        $course = Course::create($request->all());
        return response()->json($course, 201);
    }

    public function update(Request $request, Course $course)
    {
        $course ->update($request->all());
        return response()->json($course, 200);
    }

    public function delete(Request $request, Course $course)
    {
        $course->delete();
        return response()->json(null, 204);
    }
}
