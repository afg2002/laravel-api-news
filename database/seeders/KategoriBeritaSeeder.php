<?php

namespace Database\Seeders;

use Carbon\Carbon;
use DB;
use Illuminate\Database\Seeder;

class KategoriBeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategori_berita')->insert([
            [
                'nama_kategori' => 'Teknologi',
                'deskripsi' => 'Berita terbaru dan terupdate seputar teknologi dan inovasi.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_kategori' => 'Politik',
                'deskripsi' => 'Berita dan analisis tentang politik lokal dan internasional.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_kategori' => 'Olahraga',
                'deskripsi' => 'Informasi terkini tentang berbagai cabang olahraga.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_kategori' => 'Kesehatan',
                'deskripsi' => 'Berita dan tips tentang kesehatan dan gaya hidup sehat.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_kategori' => 'Seni dan Budaya',
                'deskripsi' => 'Artikel dan berita tentang seni, budaya, dan hiburan.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
