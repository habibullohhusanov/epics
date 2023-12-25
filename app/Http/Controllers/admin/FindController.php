<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Find;
use Illuminate\Http\Request;

class FindController extends Controller
{
    public function index()
    {
        $finds = Find::all();
        return view('secret.finds', [
            'finds' => $finds,
        ]);
    }
}
