<?php

use App\Http\Controllers\admin\FindController;
use App\Http\Controllers\admin\ImageController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return false;
});

Route::resources([
    'user' => UserController::class,
    'image' => ImageController::class,
    'find' => FindController::class,
]);

Route::get("/verify-email/{id}/{hash}", [AuthController::class, "verify"]);