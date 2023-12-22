<?php

use App\Http\Controllers\auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('secret', function () {
    return view('secret/dash');
});
Route::redirect('/', 'secret');

Route::get("/verify-email/{id}/{hash}", [AuthController::class, "verify"]);
