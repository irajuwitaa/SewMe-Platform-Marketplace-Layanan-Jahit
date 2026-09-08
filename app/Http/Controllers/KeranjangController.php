<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang; // Pastikan model diimport

class KeranjangController extends Controller
{
    // Menampilkan halaman keranjang
    public function index()
    {
        return view('keranjang.index');
    }

    // Menampilkan data keranjang untuk user tertentu
    public function show(Request $request)
    {
        $userId = $request->query('user_id');
        $data = Keranjang::where('user_id', $userId)->get();

        // Jika tidak ada data, koleksi akan tetap kosong, bukan null
        return view('user.keranjang.index', compact('datakeranjang'));
    }
    // Tambah item ke keranjang
    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'produk_id' => 'required|integer',
            'user_id' => 'required|integer',
            'kuantitas' => 'required|integer',
            'catatan' => 'nullable|string',
            'ukuran' => 'nullable|string',
        ]);

        $keranjang = Keranjang::create($validatedData);

        return response()->json($keranjang, 201);
    }

    // Perbarui item di keranjang
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kuantitas' => 'required|integer',
            'catatan' => 'nullable|string',
            'ukuran' => 'nullable|string',
        ]);

        $keranjang = Keranjang::findOrFail($id);
        $keranjang->update($validatedData);

        return response()->json($keranjang);
    }

    // Hapus item dari keranjang
    public function remove($id)
    {
        $keranjang = Keranjang::findOrFail($id);
        $keranjang->delete();

        return response()->json(null, 204);
    }

    // Mendapatkan item dalam keranjang untuk user tertentu (untuk keperluan API)
    public function getItems(Request $request)
    {
        $userId = $request->query('user_id');
        $items = Keranjang::where('user_id', $userId)->get();

        return response()->json($items);
    }
}
