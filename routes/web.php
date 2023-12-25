<?php

use App\Http\Controllers\admin\FindController;
use App\Http\Controllers\admin\ImageController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\auth\AuthApiController;
use App\Http\Controllers\auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('secret', function () {
    return view('secret/dash');
})->name("secret")->middleware('auth');

Route::redirect('/', 'secret')->middleware('auth');

Route::get("login", [AuthController::class, "login_blade"]);
Route::post("login", [AuthController::class, "login"])->name("login");
Route::get("logout", [AuthController::class, "logout"]);

Route::resources([
    'users' => UserController::class,
    'images' => ImageController::class,
    'finds' => FindController::class,
]);

Route::get("/verify-email/{id}/{hash}", [AuthApiController::class, "verify"]);
