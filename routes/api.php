<?php

use App\Http\Controllers\ArtisController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\PenulisController;
use App\Http\Middleware\JwtMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::apiResource('berita', BeritaController::class)->middleware(JwtMiddleware::class);
Route::apiResource('kategori', KategoriBeritaController::class)->middleware(JwtMiddleware::class);
Route::apiResource('penulis', PenulisController::class)->middleware(JwtMiddleware::class);
Route::apiResource('artis', ArtisController::class)->middleware(JwtMiddleware::class);

Route::post('/login', [AuthController::class, 'login']);

