<?php

namespace App\Http\Controllers\Admin;

use App\Models\Toko;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\ProductImages;
use Illuminate\Support\Facades\Auth;

class TokoController extends Controller
{
    public function pengaturanToko()
    {
        $userId = Auth::id();

        // Ambil data toko yang user_id-nya sesuai dengan pengguna yang sedang login
        $toko = Toko::where('user_id', $userId)->first();
        // dd($toko);
        $product = Product::where('user_id', $userId)->get();

        $banner = Banner::where('user_id', $userId)->first();
        // dd($banner);
        return view('admin.toko.pengaturan-toko', compact('toko', 'product', 'banner'));
    }

    public function ubahBanner($id)
    {
        $banner = Banner::where('toko_id', $id)->first();
        // dd($banner);
        return view('admin.toko.foto', compact('banner'));
    }

    public function ubahBannerProses(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'gambar_banner.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $banner = Banner::where('toko_id', $id)->first();

        // Pastikan ada file yang diunggah
        if ($request->hasFile('gambar_banner')) {
            $filePaths = [];

            // Iterasi setiap file yang diunggah
            foreach ($request->file('gambar_banner') as $file) {
                // Simpan file ke dalam storage dan dapatkan path-nya
                $filePath = $file->store('toko', 'public');
                $filePaths[] = $filePath;
            }

            // Simpan paths sebagai JSON di dalam kolom gambar_benner
            $banner->update([
                'gambar_banner' => json_encode($filePaths)
            ]);
        }

        return redirect()->route('pengaturan')->with('success', 'Banner berhasil diubah.');
    }


    public function ubahProduk($id)
    {
        $uprod = Product::find($id);
        return view('admin.toko.ubah-produk', compact('uprod'));
    }

    public function ubahProdukProses(Request $request, $id)
    {
        // Validasi data yang diterima
        $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:published,unpublished', // Sesuaikan dengan status yang Anda gunakan
            'price' => 'required|numeric|min:0',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Sesuaikan dengan kebutuhan
        ]);

        // Cari produk berdasarkan ID
        $uprod = Product::find($id);
        if (!$uprod) {
            return redirect()->route('ubah-produk', $id)->with('error', 'Produk tidak ditemukan.');
        }

        // Proses penyimpanan thumbnail baru jika ada
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $fileName = uniqid() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->storeAs('/uploads/products/thumbnail', $fileName);
            $thumbnailPath =  $fileName;
        } else {
            $thumbnailPath = $uprod->thumbnail;
        }

        // Update data produk
        $uprod->update([
            'product_name' => $request->input('product_name'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
            'price' => $request->input('price'),
            'thumbnail' => $thumbnailPath,
        ]);

        // Redirect ke halaman pengaturan produk dengan pesan sukses
        return redirect()->route('ubah-produk', $id)->with('success', 'Data produk berhasil diperbarui.');
    }


    public function ubahProfil()
    {
        $userId = Auth::id();

        // Ambil data toko yang user_id-nya sesuai dengan pengguna yang sedang login
        $toko = Toko::where('user_id', $userId)->first();
        $product = Product::where('user_id', $userId)->get();

        return view('admin.toko.ubah-profil', compact('toko', 'product'));
    }

    public function ubahTokoProses(Request $request)
    {
        // dd($request->all());
        // Validasi data yang dikirimkan
        $request->validate([
            'gambar_toko' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // sesuaikan dengan kebutuhan
            'nama_toko' => 'required',
            'alamat_toko' => 'required',
            'link_google_map' => 'required',
            'no_telp' => 'required',
            'jam_buka' => 'required',
            'jam_tutup' => 'required',
        ]);
        // dd($request->all());

        // Dapatkan user_id dari pengguna yang sedang login
        $userId = Auth::id();

        // Cari data toko yang akan diedit
        $toko = Toko::where('user_id', $userId)->first();



        // Update data toko dengan data yang diterima dari request
        $toko->update([
            'gambar_toko' => $request->file('gambar_toko') ? $request->file('gambar_toko')->store('toko', 'public') : $toko->gambar_toko,
            'nama_toko' => $request->input('nama_toko'),
            'alamat_toko' => $request->input('alamat_toko'),
            'link_google_map' => $request->input('link_google_map'),
            'no_telp' => $request->input('no_telp'),
            'jam_buka' => $request->input('jam_buka'),
            'jam_tutup' => $request->input('jam_tutup'),
        ]);

        // Redirect ke halaman pengaturan toko dengan pesan sukses
        return redirect()->route('ubah-profil')->with('success', 'Data toko berhasil diperbarui.');
    }


    public function countProduct()
    {
        $userId = Auth::id();
        return Product::where('user_id', $userId)->get();
    }
    public function cekProduk($id)
    {
        $count = $this->countProduct();
        $cek = Product::find($id)->with('toko')->first();
        $product = ProductImages::where('product_id', $id)->get();
        return view('admin.toko.cek-produk', compact('cek', 'product', 'count'));
    }
}
