<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Pesanan;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Toko;
use Illuminate\Support\Facades\Validator;

class PembayaranController extends Controller
{
    public function index(Request $request, $id)
    {
        // dd($request);
        $pesanan = Pesanan::with('produk')->findOrFail($id);
        $data = [
            'catatan' => 'required|string',
            'kuantitas' => 'required|numeric',
        ];
        $validator = Validator::make($request->all(), $data);
        if ($validator->fails()) {
            // dd('ERROR validator', $validator);
        } else {
            $validatedData = $validator->validated();

            $total = $pesanan->produk->price * $request->input('kuantitas');
            // dd($validatedData);
            $pesanan->update(array_merge($validatedData, ['total' => $total]));
        }
        // dd(auth()->user());

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $pesanan->produk->price,
            ),
            'customer_details' => array(
                'first_name' => auth()->user()->name,
                'last_name' => '',
                'email' => auth()->user()->email,
                'phone' => auth()->user()->nohp,
            ),
            'user_id' => auth()->user()->id,
            'custom_field1' => $pesanan->produk->stock,
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $pembeli = User::findOrFail($pesanan->user_id);
        $product = Product::findOrFail($pesanan->produk_id);
        $toko = Toko::findOrFail($pesanan->toko_id);
        // dd($toko);
        return view('pembayaran.index', compact('pesanan', 'product', 'pembeli', 'toko', 'snapToken'));
    }

    public function callback(Request $request)
    {
        // var_dump($request); die;
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture' or $request->transaction_status == 'settlement') {
                $data = explode("|", $request['metadata']['extra_info']['user_id']);
                $order = Pesanan::where('user_id', $data[0])->first();
                $produk = Product::where('stock', $request->custom_field1)->first();
                // var_dump($produk['stock']); die;
                $stok = $produk->stock - $order->kuantitas;
                // var_dump($data); var_dump($order); var_dump($produk); var_dump($stok); die;
                $order->update(['status' => 3, 'updated_at' => now()->toDateTimeString()]);
                $produk->update(['stock' => $stok, 'updated_at' => now()->toDateTimeString()]);
            };
        }
    }
}
