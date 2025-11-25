<?php

// HINT : Tambahkan method index, create, store, edit, update dan destroy pada UserController

namespace App\Http\Controllers;

// 1. Import model User
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    // 2. tampilkan daftar semua pengguna dari tabel users menggunakan compact
    public function index() {
        // Ambil semua data pengguna dari database
        $users = User::all(); 
        
        // Kirim data ke view menggunakan compact
        return view('users.index', compact('users'));
    }

    // 3. tampilkan form untuk menambah pengguna baru
    public function create() {
        // Tampilkan view untuk form penambahan pengguna
        return view('users.create');
    }

    // 4. simpan pengguna baru ke dalam tabel users
    public function store(Request $request) {
        // Aturan validasi untuk pembuatan user baru
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'phone' => 'nullable|string|max:15',
        ]);

        // Buat user baru. Karena form tidak meminta password, berikan password random yang di-hash.
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make(Str::random(12)),
        ]);
        
        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    // 5. tampilkan form untuk mengedit pengguna yang sudah ada
    public function edit($id) {
        // Cari pengguna berdasarkan ID, jika tidak ada, lempar error 404
        $user = User::findOrFail($id); 
        
        // Tampilkan view edit dan kirim data user
        return view('users.edit', compact('user'));
    }

    // 6. simpan perubahan pengguna ke dalam tabel users
    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
        
        // Aturan validasi untuk pembaruan user
        $request->validate([
            'name' => 'required|string|max:255',
            // Gunakan Rule::unique untuk mengabaikan email user saat ini
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'phone' => 'nullable|string|max:15',
            // Password bersifat opsional saat update, tetapi jika diisi, harus divalidasi
            'password' => 'nullable|string|min:8|confirmed', 
        ]);

        // Siapkan data yang akan diupdate
        $data = $request->only('name', 'email', 'phone');
        
        // Jika password diisi, hash dan tambahkan ke data update
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);
        
        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    // 7. hapus pengguna dari tabel users
    public function destroy($id) {
        // Cari pengguna berdasarkan ID
        $user = User::findOrFail($id);
        
        // Lakukan penghapusan
        $user->delete();

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}