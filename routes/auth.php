<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\user\UserController;
use Illuminate\Support\Facades\Route;

Route::get("user", [AuthController::class, "user"]);
Route::post("login", [AuthController::class, "login"]);
Route::get("logout", [AuthController::class, "logout"]);
Route::post("register", [AuthController::class, "register"]);
Route::post("resend", [AuthController::class, "resend"]);
