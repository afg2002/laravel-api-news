<?php

namespace Database\Seeders;

use Carbon\Carbon;
use DB;
use Illuminate\Database\Seeder;

class PenulisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('penulis')->insert([
            [
                'nama_penulis' => 'Afghan Eka Pangestu',
                'username' => 'afghan',
                'password' => bcrypt('password123'),
                'bio' => 'Penulis handal.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_penulis' => 'Venny',
                'username' => 'venny',
                'password' => bcrypt('venny'),
                'bio' => 'Penulis cerdik.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    
    }
}
