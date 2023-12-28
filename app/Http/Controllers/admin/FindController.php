<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Find;
use Illuminate\Http\Request;

class FindController extends Controller
{
    public function index()
    {
        $finds = Find::orderBy('id', 'DESC')->get();
        $count = 1;
        return view('secret.finds', [
            'finds' => $finds,
            'count' => $count,
        ]);
    }
    public function all_destroy()
    {
        $finds = Find::all();
        $count = 1;
        return view('secret.finds', [
            'finds' => $finds,
            'count' => $count,
        ]);
    }
}
