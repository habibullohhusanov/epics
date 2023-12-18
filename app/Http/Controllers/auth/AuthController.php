<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Jobs\SendVerification;
use App\Models\User;
use App\Notifications\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth:sanctum")->except(["register", "login", "verify"]);
    }
    public function user()
    {
        return $this->response(auth()->user());
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
        SendVerification::dispatch($user);

        $token = $user->createToken('api-token')->plainTextToken;

        return $this->succes([
            'token' => $token,
            'message' => 'You are registered! Confirm email.',
        ]);
    }
    public function verify(Request $request)
    {
        $user = User::where("id", $request->route('id'))->first();
        if (
            $request->route('id') == $user->getKey() &&
            hash_equals((string) $request->route('hash'), sha1($user->getEmailForVerification()))
        ) {
            if ($user->hasVerifiedEmail()) {
                return response()->json(['message' => 'Email man already verified.'], 200);
            }
            $user->markEmailAsVerified();
            return response()->json(['message' => 'Email man verified successfully.'], 200);
        }
        return response()->json(['message' => 'Invalid verification link.'], 403);
    }
    public function resend(Request $request)
    {
        $user = User::where("email", $request->email)->first();
        if ($user) {
            SendVerification::dispatch($user);
            return $this->succes();
        }
        return $this->error("Email not fount")
    }
    public function logout()
    {
        auth()->user()->tokens()->delete();
        return $this->succes();
    }
}
