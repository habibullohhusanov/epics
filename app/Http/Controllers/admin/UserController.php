<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(20);
        return view('secret.users', [
            'users' => $users,
        ]);
    }

    public function show($id)
    {
        $user = User::where('id', $id);
        return view('secret.user', [
            'user' => $user,
        ]);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('succes', "User deleted");
    }
}
