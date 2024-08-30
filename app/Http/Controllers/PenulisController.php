<?php

namespace App\Http\Controllers;

use App\Models\Penulis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ResponseResource;

class PenulisController extends Controller
{
    public function index()
    {
        $penulis = Penulis::all();
        return new ResponseResource(true, "Berhasil mendapatkan daftar penulis.", $penulis);
    }

    public function show($id)
    {
        $penulis = Penulis::find($id);

        if (!$penulis) {
            return new ResponseResource(false, "Penulis tidak ditemukan.", null);
        }

        return new ResponseResource(true, "Berhasil mendapatkan penulis.", $penulis);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_penulis' => 'required|string|max:100|unique:penulis,nama_penulis',
            'biografi' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'sukses' => false,
                'pesan' => 'Validasi data gagal. Silakan periksa kembali input Anda.',
                'data' => $validator->errors()
            ], 400);
        }

        $penulis = Penulis::create($validator->validated());
        return new ResponseResource(true, "Penulis berhasil ditambahkan.", $penulis);
    }

    public function update(Request $request, $id)
    {
        $penulis = Penulis::find($id);

        if (!$penulis) {
            return new ResponseResource(false, "Penulis tidak ditemukan.", null);
        }

        $validator = Validator::make($request->all(), [
            'nama_penulis' => 'sometimes|required|string|max:100|unique:penulis,nama_penulis,' . $penulis->id,
            'biografi' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'sukses' => false,
                'pesan' => 'Validasi data gagal. Silakan periksa kembali input Anda.',
                'data' => $validator->errors()
            ], 400);
        }

        $penulis->update($validator->validated());
        return new ResponseResource(true, "Penulis berhasil diperbarui.", $penulis);
    }

    public function destroy($id)
    {
        $penulis = Penulis::find($id);

        if (!$penulis) {
            return new ResponseResource(false, "Penulis tidak ditemukan.", null);
        }

        $penulis->delete();
        return new ResponseResource(true, "Penulis berhasil dihapus.", null);
    }
}
