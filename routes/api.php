<?php

use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

Route::apiResources([
    "/images" => ImageController::class,
    "/favorite" => FavoriteController::class,
]);