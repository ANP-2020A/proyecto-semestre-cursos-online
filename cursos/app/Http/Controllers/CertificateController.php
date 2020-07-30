<?php

namespace App\Http\Controllers;

use App\Certificate;
use Illuminate\Http\Request;
use App\Http\Resources\Certificate as CertificateResource;
use App\Http\Resources\CertificateCollection;

class CertificateController extends Controller
{
    public function index()
    {
        return new CertificateCollection(Certificate::paginate());
    }
    public function show( Certificate $certificate)
    {
        return  response()->json(new CertificateResource($certificate),200);
    }
    public function store(Request $request)
    {
        return Certificate::create($request->all());
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
