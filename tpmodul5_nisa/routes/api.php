<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MahasiswaController;


// Rute-rute CRUD untuk resource mahasiswa
Route::apiResource('mahasiswa', MahasiswaController::class);
