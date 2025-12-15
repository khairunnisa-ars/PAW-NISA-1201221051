<?php

namespace Database\Seeders;

use App\Models\MataKuliah;
use Illuminate\Database\Seeder;

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mataKuliahs = [
            [
                'nama' => 'Pemrograman Web',
                'kode' => 'IF101',
                'sks' => 3
            ],
            [
                'nama' => 'Basis Data',
                'kode' => 'IF102',
                'sks' => 3
            ],
            [
                'nama' => 'Algoritma dan Struktur Data',
                'kode' => 'IF103',
                'sks' => 4
            ],
            [
                'nama' => 'Jaringan Komputer',
                'kode' => 'IF104',
                'sks' => 3
            ],
            [
                'nama' => 'Sistem Operasi',
                'kode' => 'IF105',
                'sks' => 3
            ],
            [
                'nama' => 'Rekayasa Perangkat Lunak',
                'kode' => 'IF106',
                'sks' => 3
            ],
            [
                'nama' => 'Kecerdasan Buatan',
                'kode' => 'IF107',
                'sks' => 3
            ],
            [
                'nama' => 'Pemrograman Mobile',
                'kode' => 'IF108',
                'sks' => 3
            ],
            [
                'nama' => 'Keamanan Informasi',
                'kode' => 'IF109',
                'sks' => 2
            ],
            [
                'nama' => 'Interaksi Manusia dan Komputer',
                'kode' => 'IF110',
                'sks' => 2
            ],
            [
                'nama' => 'Manajemen Proyek TI',
                'kode' => 'IF111',
                'sks' => 2
            ],
            [
                'nama' => 'Data Mining',
                'kode' => 'IF112',
                'sks' => 3
            ],
            [
                'nama' => 'Cloud Computing',
                'kode' => 'IF113',
                'sks' => 3
            ],
            [
                'nama' => 'Internet of Things',
                'kode' => 'IF114',
                'sks' => 3
            ],
            [
                'nama' => 'Etika Profesi',
                'kode' => 'IF115',
                'sks' => 2
            ]
        ];

        foreach ($mataKuliahs as $mataKuliah) {
            MataKuliah::create($mataKuliah);
        }
    }
}
