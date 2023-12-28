<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Find;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->get();
        $count = 1;
        return view('secret.users', [
            'users' => $users,
            'count' => $count,
        ]);
    }

    public function show($id)
    {
        $user = User::where('id', $id)->first();
        $finds = Find::where("user_id", $id)->orderBy('id', 'DESC')->paginate(30);
        $images = Image::where("imageable_id", $id)->orderBy('id', 'DESC')->paginate(30);
        return view('secret.user', [
            'user' => $user,
            'finds' => $finds,
            'images' => $images,
        ]);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('succes', "User deleted");
    }
}
