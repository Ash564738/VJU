<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        return response()->json($payments);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $payment = Payment::create($request->all());
        return response()->json($payment, 201);
    }

    public function show($id)
    {
        $payment = Payment::find($id);
        if ($payment) {
            return response()->json($payment);
        } else {
            return response()->json(['message' => 'Payment not found'], 404);
        }
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $payment = Payment::find($id);
        if ($payment) {
            $payment->update($request->all());
            return response()->json($payment);
        } else {
            return response()->json(['message' => 'Payment not found'], 404);
        }
    }

    public function destroy($id)
    {
        $payment = Payment::find($id);
        if ($payment) {
            $payment->delete();
            return response()->json(['message' => 'Payment deleted']);
        } else {
            return response()->json(['message' => 'Payment not found'], 404);
        }
    }
}