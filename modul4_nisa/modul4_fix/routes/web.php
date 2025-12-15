<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// 1. Tambahkan route untuk menampilkan daftar pengguna (GET /users)
Route::get('/users', [UserController::class, 'index'])->name('users.index');

// 2. Tambahkan route untuk menampilkan form tambah pengguna (GET /users/create)
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

// 3. Tambahkan route untuk menyimpan pengguna baru (POST /users)
Route::post('/users', [UserController::class, 'store'])->name('users.store');

// 4. Tambahkan route untuk menampilkan form edit pengguna (GET /users/{user}/edit)
// Note: Menggunakan {user} sebagai parameter ID
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');

// 5. Tambahkan route untuk menyimpan perubahan pengguna (PUT/PATCH /users/{user})
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
// Menggunakan PUT karena ini adalah operasi pembaruan penuh

// 6. Tambahkan route untuk menghapus pengguna (DELETE /users/{user})
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');