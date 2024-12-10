<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use Illuminate\Http\Request;

class HallController extends Controller
{
    public function index()
    {
        $halls = Hall::all();
        return response()->json($halls);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $hall = Hall::create($request->all());
        return response()->json($hall, 201);
    }

    public function show($id)
    {
        $hall = Hall::find($id);
        if ($hall) {
            return response()->json($hall);
        } else {
            return response()->json(['message' => 'Hall not found'], 404);
        }
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $hall = Hall::find($id);
        if ($hall) {
            $hall->update($request->all());
            return response()->json($hall);
        } else {
            return response()->json(['message' => 'Hall not found'], 404);
        }
    }

    public function destroy($id)
    {
        $hall = Hall::find($id);
        if ($hall) {
            $hall->delete();
            return response()->json(['message' => 'Hall deleted']);
        } else {
            return response()->json(['message' => 'Hall not found'], 404);
        }
    }
}