<?php

namespace App\Http\Controllers;

use App\Models\Toko;

use App\Models\Banner;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TokoUserController extends Controller
{
    public function detailToko($id)
    {
        $toko = Toko::with('user')->findOrFail($id);
        $products = Product::where('user_id', $toko->user_id)->get();
        $banner = Banner::where('toko_id', $toko->id)->first();
        // dd($banner);
        return view('user.toko.detail-toko', compact('toko', 'products', 'banner'));
    }
}
