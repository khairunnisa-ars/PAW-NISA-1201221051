<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // ==================2==================
        // - Set timezone ke Asia/Jakarta
        date_default_timezone_set('Asia/Jakarta');

        // - Buat variabel nama, jam, waktu
        $nama = "Praktikan EAD"; // Sesuai dengan output contoh di modul
        $jam = (int)date('H'); // Ambil jam saat ini (0-23)
        $waktuAkses = date('H:i:s'); // Waktu akses HH:MM:SS

        // - Tentukan $salam berdasarkan jam (pagi, siang, sore, malam)
        $salam = match (true) {
            $jam >= 5 && $jam < 12 => 'Selamat Pagi',    // 05:00 - 11:59
            $jam >= 12 && $jam < 15 => 'Selamat Siang',   // 12:00 - 14:59
            $jam >= 15 && $jam < 18 => 'Selamat Sore',    // 15:00 - 17:59
            default => 'Selamat Malam',                   // Selain itu
        };

        // - Panggil fungsi getTanggal()
        $tanggalAkses = $this->getTanggal();

        // - Kirim data ke view 'dashboard' 
        return view('dashboard', compact('nama', 'salam', 'waktuAkses', 'tanggalAkses'));
    }

    private function getTanggal()
    {
        // ==================3==================
        // - Kembalikan tanggal sekarang dalam format dd-mm-yyyy
        date_default_timezone_set('Asia/Jakarta'); // Pastikan timezone tetap Asia/Jakarta
        return date('d-m-Y'); // Mengembalikan tanggal dalam format dd-mm-yyyy
    }
}