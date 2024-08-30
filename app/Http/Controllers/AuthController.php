<?php

namespace App\Http\Controllers;

use App\Http\Resources\ResponseResource;
use App\Models\Penulis;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        $validator = validator($credentials, [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return new ResponseResource(false, 'Validasi data gagal. Silakan periksa kembali input Anda.', $validator->errors());
        }

        if (!$token = JWTAuth::attempt($credentials)) {
            return new ResponseResource(false, 'Login gagal, kredensial tidak cocok.', null);
        }

        try{
            $penulis = Penulis::where('username', $request->username)->first();

            if (!$penulis) {
                return new ResponseResource(false, 'Penulis tidak ditemukan.', null);
            }
            return new ResponseResource(true, 'Login berhasil.', [
                'token' => $token,
                'penulis' => $penulis
            ]);
        }catch(JWTException $e){
            return new ResponseResource(false, 'Tidak dapat membuat token, coba lagi nanti.', null);
        }
        
        
    }
}
