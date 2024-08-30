<?php

namespace Database\Seeders;

use Carbon\Carbon;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('berita')->insert([
            [
                'judul' => 'Berita Teknologi Terbaru',
                'konten' => 'Ini adalah konten berita teknologi terbaru.',
                'kategori_id' => 1,
                'penulis_id' => 1,
                'artis_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'judul' => 'Politik dan Ekonomi',
                'konten' => 'Konten berita politik dan ekonomi.',
                'kategori_id' => 2,
                'penulis_id' => 1,
                'artis_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'judul' => 'Olahraga dan Kesehatan',
                'konten' => 'Berita olahraga terbaru dan informasi kesehatan.',
                'kategori_id' => 3,
                'penulis_id' => 1,
                'artis_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
