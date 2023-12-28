<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::orderBy('id', 'DESC')->get();
        $count = 1;
        return view('secret.images', [
            'images' => $images,
            'count' => $count,
        ]);
    }

    public function show(string $id)
    {
        $image = Image::find($id);
        return view('secret.image');
    }

    public function destroy(Image $image)
    {
        Storage::delete($image->path);
        $image->delete();
        return redirect()->back()->with('success', "Image deleted");
    }
}
