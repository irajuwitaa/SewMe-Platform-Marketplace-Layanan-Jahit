<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pesanan;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;
use App\Models\Rating;

class PesananController extends Controller
{
    public function pesananAdmin(Request $request)
    {
        // Dapatkan user_id dari pengguna yang sedang login
        $userId = Auth::id();

        // Ambil data pesanan yang produk terkait memiliki user_id yang sesuai
        $query = Pesanan::whereHas('produk', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        });

        // Lakukan pencarian jika ada query pencarian yang dikirimkan
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('pemesan', 'like', "%$search%")
                    ->orWhere('jenis', 'like', "%$search%")
                    ->orWhere('ukuran', 'like', "%$search%")
                    ->orWhere('kuantitas', 'like', "%$search%")
                    ->orWhere('pembayaran', 'like', "%$search%")
                    ->orWhereHas('produk', function ($query) use ($search) {
                        $query->where('product_name', 'like', "%$search%"); // Pencarian pada atribut product_name
                    });
            });
        }

        // Ambil data pesanan berdasarkan query yang telah dibuat
        $pesanan = $query->with('produk')->get();

        // Kirim data pesanan ke view
        return view('pesanan.admin.pesanan', compact('pesanan'));
    }



    public function detailPesanan($id)
    {
        $detail = Pesanan::with('produk', 'user')->find($id);
        return view('pesanan.admin.detail-pesanan', compact('detail'));
    }

    public function editStatus(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'status' => 'required|integer|in:1,2,3',
        ]);

        $detail = Pesanan::find($id);
        if (!$detail) {
            return redirect()->back()->with('error', 'Pesanan tidak ditemukan.');
        }

        $detail->status = $request->input('status');
        $detail->save();

        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui.');
    }
    public function editTanggalSelesai(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'selesai_tanggal' => 'required|date', // Pastikan input adalah tanggal
        ]);

        $detail = Pesanan::find($id);
        if (!$detail) {
            return redirect()->back()->with('error', 'Pesanan tidak ditemukan.');
        }

        $detail->selesai_tanggal = $request->input('selesai_tanggal');
        $detail->save();

        return redirect()->back()->with('success', 'Tanggal pesanan berhasil diperbarui.');
    }

    public function riwayatPesanan()
    {
        $riwayat = Pesanan::where('status', 3)->with(['user', 'produk'])->get();
        return view('pesanan.admin.riwayat-pesanan-admin', compact('riwayat'));
    }

    public function pesanan()
    {
        // Dapatkan user_id dari pengguna yang sedang login
        $userId = Auth::id();

        // Ambil data pesanan yang sesuai dengan user_id
        $pesanan = Pesanan::where('user_id', $userId)->with('produk', 'user', 'toko')->get();
        // dd($pesanan);

        // Kirim data pesanan ke view
        return view('pesanan.user.pesanan', ['pesanan' => $pesanan]);
    }
    public function riwayat()
    {
        $riwayat = Pesanan::where('status', 3)->with(['user', 'produk'])->get();
        return view('pesanan.user.riwayat-pesanan', compact('riwayat'));
    }

    public function add(Request $request)
    {
        // dd($request);
        $data = [
            'toko_id' => 'required|string',
            'produk_id' => 'required',
            'user_id' => 'required',
            'jenis' => 'required|string',
            'ukuran' => 'required|string',
            'pemesan' => 'required|string',
            'kuantitas' => 'required|numeric',
        ];

        $validator = Validator::make($request->all(), $data);
        if ($validator->fails()) {
            dd('ERROR validator', $validator);
            // Redirect back to the create form with error messages
            return back()->withErrors($validator->errors());
        } else {
            $validatedData = $validator->validated();
            $product = Pesanan::create($validatedData);
            // dd('TIDAK ERROR', $product);
            return back()->with('flash_message_success', 'Create keranjang success');
        }
    }

    public function keranjangSaya(Request $request)
    {
        $user_id = Auth::user()->id;
        $datas = Pesanan::where('user_id', $user_id)->get();

        $dataDetails = [];
        foreach ($datas as $data) {
            $product = Product::findOrFail($data->produk_id);
            $user = User::findOrFail($product->user_id);

            $dataDetails[] = [
                'data' => $data,
                'product' => $product,
                'user' => $user,
            ];
        }

        return view('keranjang.index', compact('dataDetails'));
    }

    public function detailProduk($produk_id)
    {
        $data = Product::where('id', $produk_id)->get();
        // dd($data);
        if ($data) {
            return view('keranjang.index', compact('data'));
        } else {
            return redirect()->route('keranjang.index')->with('error', 'Product not found.');
        }
    }

    public function remove($id)
    {
        $user_id = Auth::user()->id;
        // dd($user_id);
        $keranjang = Pesanan::where('id', $id)->where('user_id', $user_id)->firstOrFail();
        $t = $keranjang->delete();
        // dd($t);
        return redirect()->route('keranjang')->with('flash_message_success', 'Delete keranjang success');
    }

    public function update(Request $request)
    {
        dd($request);
    }
}
