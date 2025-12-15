<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DashboardController;

// Route ke root aplikasi (menampilkan dashboard)
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Support juga URL /dashboard dengan redirect ke route bernama 'dashboard'
Route::get('/dashboard', function () {
	return redirect()->route('dashboard');
});

// ==================1==================
// Tambahkan route GET ke /profil yang memanggil method index() dari MahasiswaController
Route::get('/profil', [MahasiswaController::class, 'index'])->name('profil');