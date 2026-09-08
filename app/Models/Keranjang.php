<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    protected $table = 'keranjang';
    protected $fillable = [
        'produk_id',
        'user_id',
        'kuantitas',
        'catatan',
        'ukuran',
    ];
}
