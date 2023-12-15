<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth:sanctum")->except(["register", "login"]);
    }
    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                "token" => null,
            ]);
        }

        return $this->response([
            "token" => $user->createToken("email")->plainTextToken,
        ]);
    }
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            "role_id" => 2,
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);
        return $this->response([
            "token" => $user->createToken("email")->plainTextToken,
        ]);
    }
    public function user()
    {
        return $this->response(auth()->user());
    }
    public function logout()
    {
        auth()->user()->tokens()->delete();
        return $this->succes();
    }
}
