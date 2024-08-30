<?php

namespace App\Http\Controllers;

use App\Http\Resources\ResponseResource;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = KategoriBerita::all();
        return new ResponseResource(true, "Berhasil mendapatkan daftar kategori berita.", $kategori);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'sometimes|required|string|max:100|unique:kategori_berita,nama_kategori',
            'deskripsi' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }


        $kategori = KategoriBerita::create($validator->validated());
        return new ResponseResource(true, "Kategori berita berhasil ditambahkan.", $kategori);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kategori = KategoriBerita::find($id);

        if (!$kategori) {
            return new ResponseResource(false, "Kategori berita tidak ditemukan.", null);
        }

        return new ResponseResource(true, "Berhasil mendapatkan kategori berita.", $kategori);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kategori = KategoriBerita::find($id);

        if (!$kategori) {
            return new ResponseResource(false, "Kategori berita tidak ditemukan.", null);
        }

        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'sometimes|required|string|max:100|unique:kategori_berita,nama_kategori,' . $kategori->id,
            'deskripsi' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }


        $kategori->update($validator->validated());
        return new ResponseResource(true, "Kategori berita berhasil diperbarui.", $kategori);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = KategoriBerita::find($id);

        if (!$kategori) {
            return new ResponseResource(false, "Kategori berita tidak ditemukan.", null);
        }

        $kategori->delete();
        return new ResponseResource(true, "Kategori berita berhasil dihapus.", null);
    }
}
