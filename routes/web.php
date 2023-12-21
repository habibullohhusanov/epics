<?php

use App\Http\Controllers\auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return false;
});
Route::get("/verify-email/{id}/{hash}", [AuthController::class, "verify"]);