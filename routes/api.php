<?php

use App\Http\Controllers\AuthController;

Route::middleware('auth:sanctum')->group(function () {
    // Rutas protegidas
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('password/forgot', [AuthController::class, 'sendPasswordResetLink']);
Route::post('password/reset', [AuthController::class, 'resetPassword']);