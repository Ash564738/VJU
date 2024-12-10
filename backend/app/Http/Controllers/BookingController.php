<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return response()->json($bookings);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $booking = Booking::create($request->all());
        return response()->json($booking, 201);
    }

    public function show($id)
    {
        $booking = Booking::find($id);
        if ($booking) {
            return response()->json($booking);
        } else {
            return response()->json(['message' => 'Booking not found'], 404);
        }
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::find($id);
        if ($booking) {
            $booking->update($request->all());
            return response()->json($booking);
        } else {
            return response()->json(['message' => 'Booking not found'], 404);
        }
    }

    public function destroy($id)
    {
        $booking = Booking::find($id);
        if ($booking) {
            $booking->delete();
            return response()->json(['message' => 'Booking deleted']);
        } else {
            return response()->json(['message' => 'Booking not found'], 404);
        }
    }
}