<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserNameRequest;
use App\Http\Requests\UpdateUserPasswordReques;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function username(UpdateUserNameRequest $request)
    {
        auth()->user()->update([
            "name" => $request->name,
        ]);
        return $this->succes("Name changed");
    }
    public function password(UpdateUserPasswordReques $request)
    {
        if (Hash::check($request->password, auth()->user()->password)) {
            auth()->user()->update([
                "password" => $request->password,
            ]);
            return $this->succes("Name changed");
        } else {
            return $this->error("Password error");
        }
    }
}
