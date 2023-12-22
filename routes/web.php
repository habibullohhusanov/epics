<?php

use App\Http\Controllers\admin\FindController;
use App\Http\Controllers\admin\ImageController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\auth\AuthController;
use Illuminate\Support\Facades\Route;
Route::get('secret', function () {
    return view('secret/dash');
})->middleware('auth');
Route::redirect('/', 'secret')->middleware('auth');
Route::middleware('auth')->group(function () {
    Route::resources([
        'users' => UserController::class,
        'images' => ImageController::class,
        'finds' => FindController::class,
    ]);
});

Route::get("/verify-email/{id}/{hash}", [AuthController::class, "verify"]);
