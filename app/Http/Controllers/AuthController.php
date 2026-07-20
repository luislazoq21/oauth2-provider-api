<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegisterUserRequest $request)
    {
        $data = $request->validated();

        $user = User::create($data);

        return response()->json([
            'message' => 'User created successfully',
            'user' => $user,
        ], 201);
    }

    public function login(LoginUserRequest $request)
    {
        if (!Auth::guard('web')->attempt($request->validated())) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        $user = Auth::user();
        $user->tokens()->delete();
        // $token = $user->createToken('PersonalAccessToken', ['read-tasks'])->accessToken;
        $token = $user->createToken('PersonalAccessToken', ['write-tasks'])->accessToken;

        return response()->json([
            'message' => 'User logged in successfully',
            'access_token' => $token
        ]);
    }
}
