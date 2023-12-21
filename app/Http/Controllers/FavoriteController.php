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
    public function index()
    {
        return ImageResource::collection(auth()->user()->favorites()->paginate(2));
    }
    public function show($id)
    {
        $image = Image::find($id);
        return new ImageResource($image);
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
