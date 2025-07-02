<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // 'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (!auth()->attempt($request->only('name', 'password'))) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $existingToken = auth()->user()->tokens()->where('name', 'API Token')->first();

        if($existingToken) {
            return response()->json(['Message' => "You already have an API token. Please delete it before creating a new one."]);
        }

        if (!$existingToken || $existingToken->expires_at->isPast()) {
            if ($existingToken) {
                $existingToken->delete();
            }
            $existingToken = auth()->user()->createToken('API Token', ['*'], now()->addDay());
        }

        return response()->json(['token' => $existingToken->plainTextToken]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // 'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            // 'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $token = $user->createToken('API Token')->plainTextToken;

        return response()->json(['token' => $token], 201);
    }

    public function logout(Request $request)
    {
        $token = $request->user()->currentAccessToken();
        if ($token) {
            $token->delete();
            return response()->json(['message' => 'Logged out successfully'], 200);
        }
        return response()->json(['message' => 'No active token found'], 404);
    }
}
