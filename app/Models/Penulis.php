<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Penulis extends Authenticatable implements JWTSubject
{
    use HasFactory;

    protected $table = 'penulis';

    protected $fillable = ['nama_penulis', 'username', 'password', 'bio'];

    protected $hidden = ['password'];


    public function berita()
    {
        return $this->hasMany(Berita::class, 'penulis_id');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
