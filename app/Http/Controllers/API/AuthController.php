<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);


        $user = User::where('username', $credentials['username'])->first();


        if ($user && Hash::check($credentials['password'], $user->password)) {

            $token = $user->createToken('auth_token')->plainTextToken;


            return response()->json([
                'success' => true,
                'message' => 'Login successful',
                'token' => $token,
                'user' => $user
            ], 200);
        }


        return response()->json([
            'success' => false,
            'message' => 'Invalid credentials'
        ], 401);
    }

    public function logout(Request $request)
    {

        $request->user()->tokens()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Successfully logged out'
        ], 200);
    }
}
