<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin()
    {
        $user = auth()->user();
        $profile = User::where('id', $user->id)->first();
        return view('dashboard.admin.index', ['name' => $profile['name']]);
    }

    public function statistikPenjual()
    {
        return view('dashboard.admin.statistik-penjual');
    }

    public function user()
    {
        $user = auth()->user();
        $profile = User::where('id', $user->id)->first();
        return view('dashboard.user.index', ['name' => $profile['name']]);
    }

    public function superAdmin()
    {
        $user = User::where('role_id', 1)->get();
        $penjahit = User::where('role_id', 2)->get();
        $pesanan = Pesanan::all();
        $akunPenjahit = count($penjahit);
        $akunUser = count($user);
        $totalPesanan = count($pesanan);
        // dd($user);

        return view('dashboard.superAdmin.index', compact('akunUser', 'akunPenjahit', 'totalPesanan'));
    }
}
