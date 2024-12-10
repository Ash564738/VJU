<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    public function index()
    {
        $seats = Seat::all();
        return response()->json($seats);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $seat = Seat::create($request->all());
        return response()->json($seat, 201);
    }

    public function show($id)
    {
        $seat = Seat::find($id);
        if ($seat) {
            return response()->json($seat);
        } else {
            return response()->json(['message' => 'Seat not found'], 404);
        }
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $seat = Seat::find($id);
        if ($seat) {
            $seat->update($request->all());
            return response()->json($seat);
        } else {
            return response()->json(['message' => 'Seat not found'], 404);
        }
    }

    public function destroy($id)
    {
        $seat = Seat::find($id);
        if ($seat) {
            $seat->delete();
            return response()->json(['message' => 'Seat deleted']);
        } else {
            return response()->json(['message' => 'Seat not found'], 404);
        }
    }
}