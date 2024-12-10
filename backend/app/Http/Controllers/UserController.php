<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email|max:100',
            'password' => 'required|string|min:6|max:255',
            'phone' => 'nullable|string|max:15',
            'role' => 'nullable|in:customer,admin',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'phone' => $request->input('phone'),
            'role' => $request->input('role', 'customer'),
        ]);

        return response()->json([
            'message' => 'User created successfully',
            'user' => $user
        ], 201);
    }

    public function show($id)
    {
        $user = User::find($id);
        if ($user) {
            return response()->json($user);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'nullable|string|max:100',
            'email' => 'nullable|email|unique:users,email,' . $id . '|max:100',
            'password' => 'nullable|string|min:6|max:255',
            'phone' => 'nullable|string|max:15',
            'role' => 'nullable|in:customer,admin',
        ]);

        $user = User::find($id);
        if ($user) {
            $user->update($request->only(['name', 'email', 'password', 'phone', 'role']));
            if ($request->filled('password')) {
                $user->update(['password' => bcrypt($request->input('password'))]);
            }
            return response()->json($user);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return response()->json(['message' => 'User deleted']);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }
}
