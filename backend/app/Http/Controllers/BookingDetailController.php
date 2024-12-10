<?php

namespace App\Http\Controllers;

use App\Models\BookingDetail;
use Illuminate\Http\Request;

class BookingDetailController extends Controller
{
    public function index()
    {
        $bookingDetails = BookingDetail::all();
        return response()->json($bookingDetails);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $bookingDetail = BookingDetail::create($request->all());
        return response()->json($bookingDetail, 201);
    }

    public function show($id)
    {
        $bookingDetail = BookingDetail::find($id);
        if ($bookingDetail) {
            return response()->json($bookingDetail);
        } else {
            return response()->json(['message' => 'Booking Detail not found'], 404);
        }
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $bookingDetail = BookingDetail::find($id);
        if ($bookingDetail) {
            $bookingDetail->update($request->all());
            return response()->json($bookingDetail);
        } else {
            return response()->json(['message' => 'Booking Detail not found'], 404);
        }
    }

    public function destroy($id)
    {
        $bookingDetail = BookingDetail::find($id);
        if ($bookingDetail) {
            $bookingDetail->delete();
            return response()->json(['message' => 'Booking Detail deleted']);
        } else {
            return response()->json(['message' => 'Booking Detail not found'], 404);
        }
    }
}