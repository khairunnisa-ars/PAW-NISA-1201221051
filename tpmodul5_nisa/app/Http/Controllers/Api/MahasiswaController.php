<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use App\Models\Mahasiswa;
use App\Http\Resources\MahasiswaResource;


class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::orderBy('created_at', 'desc')->get();

        return response()->json([
            'success' => true,
            'message' => 'List Data Mahasiswa',
            'data' => $mahasiswa,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string',
            'nim' => 'required|string|unique:mahasiswa,nim',
            'jurusan' => 'required|string',
            'fakultas' => 'required|string',
            'foto_profil' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $foto_profil = $request->file('foto_profil');
        $foto_profil->storeAs('foto_profil', $foto_profil->hashName(), 'public');

        $mahasiswa = Mahasiswa::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'jurusan' => $request->jurusan,
            'fakultas' => $request->fakultas,
            'foto_profil' => 'foto_profil/' . $foto_profil->hashName(),
        ]);

        return (new MahasiswaResource(true, 'Data Mahasiswa Berhasil Ditambahkan!', $mahasiswa))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);

    }

    public function show($id)
    {
        $mahasiswa = Mahasiswa::find($id);

        if (!$mahasiswa) {
            return response()->json(['message' => 'Mahasiswa tidak ditemukan'], 404);
        }

        return new MahasiswaResource(true, 'Detail Data Mahasiswa!', $mahasiswa);
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::find($id);

        if (!$mahasiswa) {
            return response()->json(['message' => 'Mahasiswa tidak ditemukan'], 404);
        }


        $validator = Validator::make($request->all(), [
            'nama' => 'nullable|string',
            'nim' => ['nullable', 'string', Rule::unique('mahasiswa', 'nim')->ignore($mahasiswa->id)],
            'jurusan' => 'nullable|string',
            'fakultas' => 'nullable|string',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }


        if ($request->hasFile('foto_profil')) {

            Storage::disk('public')->delete($mahasiswa->foto_profil);

            $foto_profil = $request->file('foto_profil');
            $foto_profil->storeAs('foto_profil', $foto_profil->hashName(), 'public');

            $mahasiswa->update([
                'nama' => $request->nama ?? $mahasiswa->nama,
                'nim' => $request->nim ?? $mahasiswa->nim,
                'jurusan' => $request->jurusan ?? $mahasiswa->jurusan,
                'fakultas' => $request->fakultas ?? $mahasiswa->fakultas,
                'foto_profil' => 'foto_profil/' . $foto_profil->hashName(),
            ]);
        } else {

            $mahasiswa->update([
                'nama' => $request->nama ?? $mahasiswa->nama,
                'nim' => $request->nim ?? $mahasiswa->nim,
                'jurusan' => $request->jurusan ?? $mahasiswa->jurusan,
                'fakultas' => $request->fakultas ?? $mahasiswa->fakultas,
            ]);
        }

        return new MahasiswaResource(true, 'Data Mahasiswa Berhasil Diubah!', $mahasiswa);

    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);

        if (!$mahasiswa) {
            return response()->json(['message' => 'Mahasiswa tidak ditemukan'], 404);
        }

        // Hapus file jika ada
        if ($mahasiswa->foto_profil) {
            Storage::disk('public')->delete($mahasiswa->foto_profil);
        }

        $mahasiswa->delete();

        return response()->json(['success' => true, 'message' => 'Data Mahasiswa Berhasil Dihapus!'], Response::HTTP_NO_CONTENT);
    }
}
