<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        // ==================2==================
        // - Buat object mahasiswa dengan data dummy (nama, nim, email, jurusan, fakultas, foto)
        // - Kirim object tersebut ke view 'profil'
        $mahasiswa = (object) [
            'nama' => 'Khairunnisa',
            'nim' => '1201221051',
            'email' => 'khairunnisaars@gmail.com',
            'jurusan' => 'S1 Sistem Informasi',
            'fakultas' => 'Rekayasa Industri',
            // gunakan path di folder public/images; ganti file foto sesuai kebutuhan
            'foto' => 'images/foto-nisa.png',
        ];

        return view('profil', compact('mahasiswa'));
    }
}
