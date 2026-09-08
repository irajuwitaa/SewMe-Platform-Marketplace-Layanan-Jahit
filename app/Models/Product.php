<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'description',
        'status',
        'price',
        'thumbnail',
        'jenis',
        'stock',
        'user_id',
        'toko_id'
    ];

    public function toko()
    {
        return $this->belongsTo(Toko::class, "toko_id", "id");
    }
    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }
}
class Slider extends Model
{
    use HasFactory;
    protected $fillable = [
        'foto'
    ];
}
