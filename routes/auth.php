<?php

use App\Http\Controllers\auth\AuthApiController;
use Illuminate\Support\Facades\Route;

Route::get("user", [AuthApiController::class, "user"]);
Route::post("login", [AuthApiController::class, "login"]);
Route::get("logout", [AuthApiController::class, "logout"]);
Route::post("register", [AuthApiController::class, "register"]);
Route::post("resend", [AuthApiController::class, "resend"]);
