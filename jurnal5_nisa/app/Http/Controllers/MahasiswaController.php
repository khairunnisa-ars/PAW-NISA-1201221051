<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Http\Resources\MahasiswaResource;
use Illuminate\Support\Facades\Validator;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return new MahasiswaResource(true, 'List Data Mahasiswa', $mahasiswa);
    }

    public function show($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        
        if (!$mahasiswa) {
            return new MahasiswaResource(false, 'Data Mahasiswa Tidak Ditemukan!', null);
        }

        return new MahasiswaResource(true, 'Detail Data Mahasiswa!', $mahasiswa);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|unique:mahasiswas,nim',
            'jurusan' => 'required|string|max:255',
            'fakultas' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 422);
        }

        $mahasiswa = Mahasiswa::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'jurusan' => $request->jurusan,
            'fakultas' => $request->fakultas,
        ]);

        return new MahasiswaResource(true, 'Data Mahasiswa Berhasil Ditambahkan!', $mahasiswa);
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::find($id);

        if (!$mahasiswa) {
            return new MahasiswaResource(false, 'Data Mahasiswa Tidak Ditemukan!', null);
        }

        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|unique:mahasiswas,nim,' . $id,
            'jurusan' => 'required|string|max:255',
            'fakultas' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 422);
        }

        $mahasiswa->update([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'jurusan' => $request->jurusan,
            'fakultas' => $request->fakultas,
        ]);

        return new MahasiswaResource(true, 'Data Mahasiswa Berhasil Diubah!', $mahasiswa);
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);

        if (!$mahasiswa) {
            return new MahasiswaResource(false, 'Data Mahasiswa Tidak Ditemukan!', null);
        }

        $mahasiswa->delete();

        return new MahasiswaResource(true, 'Data Mahasiswa Berhasil Dihapus!', null);
    }
}

