<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->only('name', 'email', 'password', 'password_confirmation'), [
            'name' => ['required', 'min:2', 'max:50', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6', 'max:255', 'confirmed', 'string'],
        ]);
        if ($validator->fails())
            return response()->json([
                'status' => false,
                'error' => $validator->errors()
            ], 400);
        $input = $request->only('name', 'email', 'password');
        $input['password'] = Hash::make($request['password']);
        $user = User::create($input);
        $user->update([
            'token' => Str::uuid()
        ]);

        return response()->json([
            'status' => true,
            'result' => [
                'user' => $user,
                'token' => $user->token
            ],
        ], 200);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->only('email', 'password'), [
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required', 'min:6', 'max:255', 'string'],
        ]);
        if ($validator->fails())
            return response()->json([
                'status' => false,
                'error' => $validator->errors(),
            ], 400);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = $request->user();
            $user->update([
                'token' => Str::uuid()
            ]);
            return response()->json([
                'status' => true,
                'result' => [
                    'user' => $user,
                    'token' => $user->token
                ],
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'error' => [
                    'message' => "The password is incorrect"
                ],
            ], 400);
        }
    }
}
