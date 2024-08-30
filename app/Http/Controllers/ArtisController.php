<?php

namespace App\Http\Controllers;

use App\Models\Artis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ResponseResource;

class ArtisController extends Controller
{
    // Mendapatkan semua artis
    public function index()
    {
        $artis = Artis::all();
        return new ResponseResource(true, "Berhasil mendapatkan daftar artis.", $artis);
    }

    // Mendapatkan satu artis berdasarkan ID
    public function show($id)
    {
        $artis = Artis::find($id);

        if (!$artis) {
            return new ResponseResource(false, "Artis tidak ditemukan.", null);
        }

        return new ResponseResource(true, "Berhasil mendapatkan artis.", $artis);
    }

    // Menyimpan artis baru
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_artis' => 'required|string|max:100|unique:artis,nama_artis',
            'biografi' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'sukses' => false,
                'pesan' => 'Validasi data gagal. Silakan periksa kembali input Anda.',
                'data' => $validator->errors()
            ], 400);
        }

        $artis = Artis::create($validator->validated());
        return new ResponseResource(true, "Artis berhasil ditambahkan.", $artis);
    }

    // Memperbarui artis yang sudah ada
    public function update(Request $request, $id)
    {
        $artis = Artis::find($id);

        if (!$artis) {
            return new ResponseResource(false, "Artis tidak ditemukan.", null);
        }

        $validator = Validator::make($request->all(), [
            'nama_artis' => 'sometimes|required|string|max:100|unique:artis,nama_artis,' . $artis->id,
            'biografi' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'sukses' => false,
                'pesan' => 'Validasi data gagal. Silakan periksa kembali input Anda.',
                'data' => $validator->errors()
            ], 400);
        }

        $artis->update($validator->validated());
        return new ResponseResource(true, "Artis berhasil diperbarui.", $artis);
    }

    // Menghapus artis
    public function destroy($id)
    {
        $artis = Artis::find($id);

        if (!$artis) {
            return new ResponseResource(false, "Artis tidak ditemukan.", null);
        }

        $artis->delete();
        return new ResponseResource(true, "Artis berhasil dihapus.", null);
    }
}
