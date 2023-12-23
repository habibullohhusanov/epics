<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::paginate(20);
        return view('secret.images', [
            'images' => $images
        ]);
    }

    public function show(string $id)
    {
        $image = Image::find($id);
        return view('secret.image');
    }

    public function destroy(Image $image)
    {
        $image->delete();
        return redirect()->back()->with('success', "Image deleted");
    }
}
