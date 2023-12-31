<?php

namespace App\Http\Controllers;

use App\Http\Resources\ImageResource;
use App\Models\Image;
use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;
use App\Jobs\AddFindText;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth:sanctum");
        $this->authorizeResource(Image::class,);
    }
    public function index()
    {
        return ImageResource::collection(auth()->user()->images );
    }
    public function show(Image $image)
    {
        return new ImageResource($image);
    }
    public function store(StoreImageRequest $request)
    {
        $response = Http::withHeaders([
            "accept" => "application/json",
            "content-type" => "application/json",
            "authorization" => env("API_TOKEN"),
        ])->post("https://api.getimg.ai/v1/stable-diffusion/text-to-image", [
            "prompt" => $request->prompt,
            "width" => $request->width??512,
            "height" => $request->height??512,
        ]);
        AddFindText::dispatch($request->prompt, auth()->user()->id);
        $result = json_decode($response);
        $imageBase64 = $result->image;
        $imageData = base64_decode($imageBase64);
        $name = time() . ".png";
        $path = "images/" . auth()->user()->id . "/" . $name;
        Storage::put($path, $imageData);
        $image = auth()->user()->images()->create([
            "name" => $name,
            "path" => $path,
        ]);
        return new ImageResource($image);
    }
    public function destroy(Image $image)
    {
        Storage::delete($image->path);
        $image->delete();
        return $this->succes("Image deleted");
    }
}
