<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';

    protected $primaryKey = 'id';

    protected $fillable = [
        'judul',
        'konten',
        'kategori_id',
        'penulis_id',
        'artis_id',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriBerita::class, 'kategori_id');
    }
    public function penulis()
    {
        return $this->belongsTo(Penulis::class, 'penulis_id');
    }

    public function artis()
    {
        return $this->belongsTo(Artis::class, 'artis_id');
    }

}
