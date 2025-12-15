<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;

Route::get('/login', function (Request $request) {
    return response()->json(['message' => 'Unauthorized'], 401);
});

// Public routes for authentication
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Public routes - No authentication required (for easy testing)
Route::apiResource('mahasiswa', MahasiswaController::class);
Route::apiResource('matakuliah', MataKuliahController::class);

// Protected routes with Sanctum authentication
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});

