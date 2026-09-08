<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    use HasFactory;
    protected $table = 'toko';
    protected $fillable = [
        'user_id',
        'gambar_toko',
        'nama_toko',
        'alamat_toko',
        'link_google_map',
        'no_telp',
        'email',
        'password',
        'jam_buka',
        'jam_tutup',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }
}
