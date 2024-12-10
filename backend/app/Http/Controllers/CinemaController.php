<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use Illuminate\Http\Request;

class CinemaController extends Controller
{
    public function index()
    {
        $cinemas = Cinema::all();
        return response()->json($cinemas);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $cinema = Cinema::create($request->all());
        return response()->json($cinema, 201);
    }

    public function show($id)
    {
        $cinema = Cinema::find($id);
        if ($cinema) {
            return response()->json($cinema);
        } else {
            return response()->json(['message' => 'Cinema not found'], 404);
        }
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $cinema = Cinema::find($id);
        if ($cinema) {
            $cinema->update($request->all());
            return response()->json($cinema);
        } else {
            return response()->json(['message' => 'Cinema not found'], 404);
        }
    }

    public function destroy($id)
    {
        $cinema = Cinema::find($id);
        if ($cinema) {
            $cinema->delete();
            return response()->json(['message' => 'Cinema deleted']);
        } else {
            return response()->json(['message' => 'Cinema not found'], 404);
        }
    }
}