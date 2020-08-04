<?php

namespace App\Http\Controllers;
use App\Record;
use App\Http\Resources\Record as RecordResource;
use App\Http\Resources\RecordCollection;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function index()
    {
        return new RecordCollection(Record::all());
    }

    public function show(Record $record)
    {
        return response()->json(new RecordResource($record),200);
    }

    public function store(Request $request)
    {
        $record = Record::create($request->all());
        return response()->json($record, 201);
    }

    public function update(Request $request, Record $record)
    {
        $record ->update($request->all());
        return response()->json($record, 200);
    }

    public function delete(Request $request, Record $record)
    {
        $record->delete();
        return response()->json(null, 204);
    }
}
