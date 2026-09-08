<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';
    protected $fillable = [
        'toko_id',
        'produk_id',
        'user_id',
        'catatan',
        'pemesan',
        'jenis',
        'ukuran',
        'kuantitas',
        'pembayaran',
        'status',
        'selesai_tanggal',
    ];
    public function produk(): BelongsTo
    {
        return $this->belongsTo(Product::class, "produk_id", "id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function toko()
    {
        return $this->belongsTo(Toko::class, "toko_id", "id");
    }
}
