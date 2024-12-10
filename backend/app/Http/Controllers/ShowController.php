<?php

namespace App\Http\Controllers;

use App\Models\Show;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function index()
    {
        $shows = Show::all();
        return response()->json($shows);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $show = Show::create($request->all());
        return response()->json($show, 201);
    }

    public function show($id)
    {
        $show = Show::find($id);
        if ($show) {
            return response()->json($show);
        } else {
            return response()->json(['message' => 'Show not found'], 404);
        }
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $show = Show::find($id);
        if ($show) {
            $show->update($request->all());
            return response()->json($show);
        } else {
            return response()->json(['message' => 'Show not found'], 404);
        }
    }

    public function destroy($id)
    {
        $show = Show::find($id);
        if ($show) {
            $show->delete();
            return response()->json(['message' => 'Show deleted']);
        } else {
            return response()->json(['message' => 'Show not found'], 404);
        }
    }
}