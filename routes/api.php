<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

Route::apiResources([
    "/images" => ImageController::class,
]);