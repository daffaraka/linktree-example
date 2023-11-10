<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'kategori_id',
        'produk',
        'gambar',
        'deskripsi',
        'link'
    ];

    public function kategori() {
        return $this->belongsTo(Kategori::class,'kategori_id');
    }
}
