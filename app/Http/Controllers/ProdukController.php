<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductImages;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
    public function produkSaya()
    {
        $user_id = Auth::user()->id;
        $products = Product::where('user_id', $user_id)->get();
        // dd($products);
        return view('admin.produk.produk-saya', compact('products'));
    }
    public function tambahProdukAdmin()
    {
        $toko = Toko::where('user_id', Auth::user()->id)->first();
        return view('admin.produk.tambah-produk-admin', compact('toko'));
    }

    public function editProdukAdmin($id)
    {
        $user_id = Auth::user()->id;
        $product = Product::where('id', $id)->where('user_id', $user_id)->firstOrFail();
        $productImages = ProductImages::where('product_id', $id)->get();
        // dd($product);
        return view('admin.produk.edit-produk-admin', compact('product', 'productImages'));
    }
    public function hapusProdukAdmin($id)
    {
        $user_id = Auth::user()->id;
        $product = Product::where('id', $id)->where('user_id', $user_id)->firstOrFail();
        ProductImages::where('product_id', $id)->delete();
        $product->delete();
        return back()->with('flash_message_success', 'Delete product success');
    }

    public function tambahprodukproses(Request $request)
    {
        // dd($request);

        $data = [
            'product_name' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|string',
            'jenis' => 'required|string',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'product_images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'user_id' => 'required',
            'toko_id' => 'required'
        ];

        $validator = Validator::make($request->all(), $data);
        if ($validator->fails()) {
            // dd('ERROR validator', $validator);
            // Redirect back to the create form with error messages
            return redirect('/tambah-produk-admin')->withErrors($validator->errors());
        } else {
            $validatedData = $validator->validated();
            $thumbnail = $request->file('thumbnail');
            if ($thumbnail) {
                $fileName = uniqid() . '.' . $thumbnail->getClientOriginalExtension(); // Generate unique filename
                $thumbnail->storeAs('/uploads/products/thumbnail', $fileName);

                $validatedData['thumbnail'] = $fileName; // Update validated data with filename
            }

            $product = Product::create($validatedData);
            if ($request->hasFile('product_images')) {
                foreach ($request->file('product_images') as $file) {
                    $imageName = uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('/uploads/products/images', $imageName);

                    // Save image name to product_images table
                    ProductImages::create([
                        'product_id' => $product->id,
                        'filename' => $imageName
                    ]);
                }
            }
            // dd('TIDAK ERROR', $product);
            return redirect('/tambah-produk-admin')->with('flash_message_success', 'Create product success');
        }
    }

    public function editprodukproses(Request $request, $id)
    {
        $user_id = Auth::user()->id;
        $product = Product::where('id', $id)->where('user_id', $user_id)->firstOrFail();

        // dd($request);
        $data = [
            'product_name' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|string',
            'jenis' => 'required|string',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
        ];

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = 'required|image|mimes:jpeg,png,jpg|max:2048';
        }
        $validator = Validator::make($request->all(), $data);
        if ($validator->fails()) {
            dd('ERROR validator', $validator);
            // Redirect back to the create form with error messages
            return redirect('/edit-produk-admin/' . $id)->withErrors($validator->errors());
        } else {
            $validatedData = $validator->validated();
            $thumbnail = $request->file('thumbnail');
            if ($thumbnail) {
                $fileName = uniqid() . '.' . $thumbnail->getClientOriginalExtension(); // Generate unique filename
                $thumbnail->storeAs('/uploads/products/thumbnail', $fileName);

                $validatedData['thumbnail'] = $fileName; // Update validated data with filename
            }

            $product->update($validatedData);

            if ($request->hasFile('product_images')) {
                // Delete old product images from database
                ProductImages::where('product_id', $id)->delete();

                // Upload new images and save to database
                $newImages = $request->file('product_images');
                foreach ($newImages as $image) {
                    $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('/uploads/products/images', $imageName);

                    // Save new image record to product_images table
                    ProductImages::create([
                        'product_id' => $id,
                        'filename' => $imageName
                    ]);
                }
            }
            // dd('TIDAK ERROR', $result);
            return redirect('/edit-produk-admin/' . $id)->with('flash_message_success', 'Update product success');
        }
    }

    public function searchProduk()
    {
        $data = Product::all();
        $pembayaran = "Belum Lunas";

        return view('user.produk.cari-produk', compact('data', 'pembayaran'));
    }
    public function searchProdukById($id)
    {
        $data = Product::with('user')->findOrFail($id);
        // dd($data);
        $toko = Toko::where('user_id', $data->user_id)->first();
        $productImages = ProductImages::where('product_id', $id)->get();
        // dd($productImages);
        $countProduk = Product::where('user_id', $data->user_id)->count();
        // dd($toko);
        $pembayaran = "Belum Lunas";

        if ($data) {
            return view('user.produk.detail-produk', compact('data', 'pembayaran', 'toko', 'countProduk', 'productImages'));
        } else {
            return redirect()->route('user.produk.index')->with('error', 'Product not found.');
        }
    }

    public function detailProduk()
    {
        $data = Product::all();
        return view('user.produk.detail-produk', compact('data'));
    }
}
