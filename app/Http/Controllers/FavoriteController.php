<?php

namespace App\Http\Controllers;

use App\Http\Resources\ImageResource;
use App\Models\Image;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth:sanctum");
    }
    public function show($id)
    {
        return new ImageResource(auth()->user()->favorites()->find($id)->first());
    }
    public function index()
    {
        return ImageResource::collection(auth()->user()->favorites()->paginate(10));
    }
    public function store(Request $request)
    {
        if (!auth()->user()->hasFavorites($request->image_id)) {
            auth()->user()->favorites()->attach($request->image_id);
            return $this->succes();
        } else {
            return $this->error("Already exsist");
        }
    }
    public function destroy($id)
    {
        if (auth()->user()->hasFavorites($id)) {
            auth()->user()->favorites()->detach($id);
            return $this->succes();
        } else {
            return $this->error("Not found");
        }
    }
}
