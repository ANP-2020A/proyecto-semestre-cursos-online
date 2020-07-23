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
    public function show($id)
    {
        return Certificate::find($id);
    }
    public function store(Request $request)
    {
        return Certificate::create($request->all());
    }
    public function update(Request $request, $id)
    {
        $certificate = Certificate::findOrFail($id);
        $certificate->update($request->all());
        return $certificate;
    }
    public function delete(Request $request, $id)
    {
        $certificate = Certificate::findOrFail($id);
        $certificate->delete();
        return 204;
    }
}
