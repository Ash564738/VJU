<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return response()->json($movies);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $movie = Movie::create($request->all());
        return response()->json($movie, 201);
    }

    public function show($id)
    {
        $movie = Movie::find($id);
        if ($movie) {
            return response()->json($movie);
        } else {
            return response()->json(['message' => 'Movie not found'], 404);
        }
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $movie = Movie::find($id);
        if ($movie) {
            $movie->update($request->all());
            return response()->json($movie);
        } else {
            return response()->json(['message' => 'Movie not found'], 404);
        }
    }

    public function destroy($id)
    {
        $movie = Movie::find($id);
        if ($movie) {
            $movie->delete();
            return response()->json(['message' => 'Movie deleted']);
        } else {
            return response()->json(['message' => 'Movie not found'], 404);
        }
    }
}