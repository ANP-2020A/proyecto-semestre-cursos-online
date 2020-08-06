<?php

namespace App\Http\Controllers;

use App\Certificate;
use App\Register;
use Illuminate\Http\Request;
use App\Http\Resources\Certificate as CertificateResource;
use App\Http\Resources\CertificateCollection;

class CertificateController extends Controller
{
    /**
     * @param Register $register
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Register $register)
    {
        return response()->json(CertificateResource::collection($register->certificate),200);
    }

    /**
     * @param Register $register
     * @param \App\Certificate $certificate
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Register $register, Certificate $certificate)
    {
        $certificate = $register->certificate()->where('id',$certificate->id)->firstOrFail();
        return response()->json($certificate,200);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param Register $register
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, Register $register)
    {
        $request->validate([
            'description' => 'required|string'
        ]);
        $certificate = $register->certificate()->save(new Certificate($request->all()));
        return response()->json($certificate,201);
    }
    public function update(Request $request, Certificate $certificate)
    {
        $certificate->update($request->all());
        return $certificate;
    }
    public function delete(Request $request, Certificate $certificate)
    {
        $certificate->delete();
        return 204;
    }
}
