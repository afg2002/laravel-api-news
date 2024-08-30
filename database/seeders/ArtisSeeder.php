<?php

namespace Database\Seeders;

use Carbon\Carbon;
use DB;
use Illuminate\Database\Seeder;

class ArtisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('artis')->insert([
            [
                'nama_artis' => 'John Smith',
                'biografi' => 'Biografi John Smith: Artis yang dikenal dengan karya-karya besar dalam musik klasik dan kontemporer.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_artis' => 'Alexander the Great',
                'biografi' => 'Biografi Alexander the Great: Artis berpengaruh yang dikenal karena karya-karya revolusioner dalam bidang seni rupa.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_artis' => 'Plato',
                'biografi' => 'Biografi Plato: Filsuf dan penulis yang juga dikenal sebagai artis dengan pandangan mendalam tentang seni dan estetika.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
