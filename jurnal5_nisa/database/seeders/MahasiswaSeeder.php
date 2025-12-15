<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mahasiswas = [
            [
                'nama' => 'Ahmad Fauzi',
                'nim' => '1201220001',
                'jurusan' => 'Teknik Informatika',
                'fakultas' => 'Teknik'
            ],
            [
                'nama' => 'Siti Nurhaliza',
                'nim' => '1201220002',
                'jurusan' => 'Sistem Informasi',
                'fakultas' => 'Teknik'
            ],
            [
                'nama' => 'Budi Santoso',
                'nim' => '1201220003',
                'jurusan' => 'Teknik Elektro',
                'fakultas' => 'Teknik'
            ],
            [
                'nama' => 'Dewi Lestari',
                'nim' => '1201220004',
                'jurusan' => 'Manajemen',
                'fakultas' => 'Ekonomi'
            ],
            [
                'nama' => 'Eko Prasetyo',
                'nim' => '1201220005',
                'jurusan' => 'Akuntansi',
                'fakultas' => 'Ekonomi'
            ],
            [
                'nama' => 'Fitri Handayani',
                'nim' => '1201220006',
                'jurusan' => 'Ilmu Hukum',
                'fakultas' => 'Hukum'
            ],
            [
                'nama' => 'Gilang Ramadhan',
                'nim' => '1201220007',
                'jurusan' => 'Pendidikan Dokter',
                'fakultas' => 'Kedokteran'
            ],
            [
                'nama' => 'Hana Pertiwi',
                'nim' => '1201220008',
                'jurusan' => 'Ilmu Komunikasi',
                'fakultas' => 'Ilmu Sosial dan Politik'
            ],
            [
                'nama' => 'Irfan Hakim',
                'nim' => '1201220009',
                'jurusan' => 'Teknik Sipil',
                'fakultas' => 'Teknik'
            ],
            [
                'nama' => 'Jasmine Azzahra',
                'nim' => '1201220010',
                'jurusan' => 'Psikologi',
                'fakultas' => 'Psikologi'
            ],
            [
                'nama' => 'Khairul Anwar',
                'nim' => '1201220011',
                'jurusan' => 'Teknik Mesin',
                'fakultas' => 'Teknik'
            ],
            [
                'nama' => 'Linda Wijaya',
                'nim' => '1201220012',
                'jurusan' => 'Desain Komunikasi Visual',
                'fakultas' => 'Seni dan Desain'
            ],
            [
                'nama' => 'Muhammad Rizki',
                'nim' => '1201220013',
                'jurusan' => 'Teknik Industri',
                'fakultas' => 'Teknik'
            ],
            [
                'nama' => 'Nurul Fadilah',
                'nim' => '1201220014',
                'jurusan' => 'Farmasi',
                'fakultas' => 'Farmasi'
            ],
            [
                'nama' => 'Omar Abdullah',
                'nim' => '1201220015',
                'jurusan' => 'Hubungan Internasional',
                'fakultas' => 'Ilmu Sosial dan Politik'
            ]
        ];

        foreach ($mahasiswas as $mahasiswa) {
            Mahasiswa::create($mahasiswa);
        }
    }
}
