<?php

namespace App\Http\Controllers;

use App\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index()
    {
        return Certificate::all();
    }
    public function show(Certificate $certificate)
    {
        return $certificate;
    }
    public function store(Request $request)
    {
        $certificate = Certificate::create($request->all());
        return response()->json($certificate, 201);
    }
    public function update(Request $request,Certificate $certificate)
    {
        $certificate->update($request->all());
        return response()->json($certificate, 200);
    }
    public function delete(Certificate $certificate)
    {
        $certificate->delete();
        return response()->json(null, 204);

    }
}
