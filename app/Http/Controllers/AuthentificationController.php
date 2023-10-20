<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthentificationController extends Controller
{
    public function login(Request $request) {
        $request->validate([
            'email' =>'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages ([
                'acount' => ['The provided credentials are incorrect']
            ]);
        }

        return $user->createToken('user login')->plainTextToken;
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' =>'required|email|unique:users',
            'password' => 'required'
        ]);

       $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password,
       ]);

       return response()->json($user);
    }

    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            "message" => "anda sudah logout"
        ]);
    }
}