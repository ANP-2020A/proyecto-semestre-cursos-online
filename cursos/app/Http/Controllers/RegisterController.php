<?php

namespace App\Http\Controllers;

use App\Course;
use App\Register;
use App\Http\Resources\RegisterCollection;
use App\Http\Resources\Register as RegisterResources;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
   /* private static $messages = [
        'required'=>'El campo :attribute es obligatorio.',
        'exists'=>'El campo :attribute que ingreso no existe en la base de datos'
    ];*/

    public function index()
    {
        return new RegisterCollection(Register::paginate(15));
    }

    public function show(Register $register)
    {
        return  response()->json(new RegisterResources($register),200);
    }

    /*public function ind(Course $course)
    {
        $registers = $course->register;
        return response()->json(RegisterResources::collection($registers),200);
    }*/

    public function store(Request $request)
    {

       /* $request->validate([
            'progress' => 'required|integer',
            'score' => 'required|integer',
            'course_id'=>'required|exists:courses,id'

        ],self::$messages);*/

        $register = Register::create($request->all());

        return response()->json($register, 201);
    }

    public function update(Request $request, Register $register)
    {
        $register->update($request->all());
        return response()->json($register, 200);
    }

    public function delete(Request $request, Register $register)
    {
        $register->delete();
        return response()->json(null, 204);
    }
}
