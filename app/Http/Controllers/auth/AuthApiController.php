<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ResendRequest;
use App\Jobs\SendVerification;
use App\Models\User;
use App\Notifications\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthApiController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth:sanctum")->only(["logout","user"]);
    }
    public function user()
    {
        return $this->response(auth()->user());
    }
    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return $this->error('Account not found or password is incorrect.');
        }

        return $this->succes([
            "token" => $user->createToken("email")->plainTextToken,
        ]);
    }
    public function register(Request $request)
    {
        $test = User::where('email', $request->email)->first();
        if ($test) {
            return $this->error('Registered from this email.');
        }
        $user = User::create([
            "role_id" => 2,
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);
        SendVerification::dispatch($user);

        $token = $user->createToken('email')->plainTextToken;

        return $this->succes([
            'token' => $token,
            'message' => 'You are registered! Confirm email.',
        ]);
    }
    public function verify(Request $request)
    {
        $user = User::where("id", $request->route('id'))->first();
        if ($user) {
            if (
                $request->route('id') == $user->getKey() &&
                hash_equals((string) $request->route('hash'), sha1($user->getEmailForVerification()))
            ) {
                if ($user->hasVerifiedEmail()) {
                    return view('verify.verify', [
                        'user' => $user,
                        'title' => 'Successfully',
                        'message' => 'Email man already verified.'
                    ]);
                }
                $user->markEmailAsVerified();
                return view('verify.verify', [
                    'user' => $user,
                    'title' => 'Successfully',
                    'message' => 'Email man verified successfully.'
                ]);
            }
            return view('verify.verify', [
                'user' => $user,
                'title' => 'Eror',
                'message' => 'Invalid verification link.'
            ]);
        }
        return view('verify.verify', [
            'title' => 'Eror',
            'message' => 'The verification link is out of date.'
        ]);
    }
    public function resend(ResendRequest $request)
    {
        $user = User::where("email", $request->email)->first();
        if ($user) {
            if ($user->hasVerifiedEmail()) {
                return $this->error('Email man already verified.');
            }
            SendVerification::dispatch($user);
            return $this->succes();
        }
        return $this->error("Email not fount");
    }
    public function logout()
    {
        auth()->user()->tokens()->delete();
        return $this->succes();
    }
}
