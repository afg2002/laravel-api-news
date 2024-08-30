<?php

namespace App\Http\Controllers;

use App\Http\Resources\ResponseResource;
use App\Models\Berita;
use Auth;
use Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

   
    public function index()
    {

        // eager loading dengan with
        $berita = Cache::remember('berita',now()->addMinutes(10),function(){
            return Berita::with(['kategori', 'penulis', 'artis'])->get();
        });
        return new ResponseResource(true,"Sucess fetching data berita",$berita);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:150',
            'konten' => 'required|string',
            'kategori_id' => 'required|exists:kategori_berita,id',
            'artis_id' => 'nullable|exists:artis,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $penulis_id = Auth::user()->id;

        $berita = Berita::create([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'kategori_id' => $request->kategori_id,
            'penulis_id' => $penulis_id,
            'artis_id' => $request->artis_id,
        ]);


        return new ResponseResource(true, "Success insert data berita", $berita);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $berita = Berita::with(['kategori', 'penulis', 'artis'])->find($id);

        if (!$berita) {
            return new ResponseResource(false, 'Berita tidak ada.',null);
        }

        return new ResponseResource(true,"Sucess fetching data berita",$berita);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $berita = Berita::find($id);

        
        if (!$berita) {
            return new ResponseResource(false, 'Berita tidak ada.',null);
        }

        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:150',
            'konten' => 'required|string',
            'kategori_id' => 'required|exists:kategori_berita,id',
            'artis_id' => 'nullable|exists:artis,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $penulis_id = Auth::user()->id;
        
        $berita->update([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'kategori_id' => $request->kategori_id,
            'penulis_id' => $penulis_id,
            'artis_id' => $request->artis_id,
        ]);


        return new ResponseResource(true, "Success update data berita", $berita);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $berita = Berita::find($id);

        if (!$berita) {
            return response()->json(['message' => 'Berita tidak ada.'], 404);
        }

        $berita->delete();
        return new ResponseResource(true, "Success delete data berita", $berita);
    }
}
