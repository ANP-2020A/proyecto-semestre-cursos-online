<?php

namespace App\Http\Controllers;

use App\Register;
use App\Http\Resources\RegisterCollection;
use App\Http\Resources\Register as RegisterResource;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return new RegisterCollection(Register::paginate(15));
    }

    public function show(Register $register)
    {
        return  response()->json(new RegisterResource($register),200);
    }

    public function store(Request $request)
    {
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
