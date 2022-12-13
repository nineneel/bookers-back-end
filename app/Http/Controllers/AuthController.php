<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $rules = [
            "name" => "required|string",
            "email" => "required|string|unique:users",
            "password" => "required|string|min:6"
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        UserRole::create([
            'user_id' => $user->id,
            'role_id' => 2
        ]);

        $token = $user->createToken('Personal Access Token')->plainTextToken;
        $response = [
            'user' => $user, 'token' => $token
        ];

        return response()->json($response, 200);
    }

    public function login(Request $request)
    {

        $user = User::with(['roles'])->where('email', $request->email)->first();

        $is_admin = true;

        foreach ($user->roles as $role) {
            if ($role->name == 'user') {
                $is_admin = false;
                break;
            }
        }

        if ($is_admin) {
            $response = [
                'message' => "You are an Admin!",
            ];

            return response()->json($response, 400);
        }

        if ($user && Hash::check($request->password, $user->password)) {
            $token = $user->createToken('Personal Access Token')->plainTextToken;
            $response = [
                'user' => $user,
                'token' => $token,
            ];

            return response()->json($response, 200);
        }

        $response = [
            'message' => "Incorrect Email or Password",
        ];

        return response()->json($response, 400);
    }
}
