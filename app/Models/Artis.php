<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artis extends Model
{
    use HasFactory;

    protected $table = 'artis';

    protected $fillable = [
        'nama_artis',
        'biografi',
    ];

    public function berita()
    {
        return $this->hasMany(Berita::class, 'artis_id');
    }
}
