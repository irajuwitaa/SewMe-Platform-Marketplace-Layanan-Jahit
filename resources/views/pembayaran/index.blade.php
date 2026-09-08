@extends('template.main')
@section('content')
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="{{ config('midtrans.client_key') }}"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->

    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar pt-7 pt-lg-10">
            <!--begin::Toolbar wrapper-->
            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7">
                        <li class="breadcrumb-item text-gray-700 fw-bold lh-1 mx-n1">
                            <a href="index.html" class="text-hover-primary">
                                <i class="ki-outline ki-home text-gray-700 fs-6"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <i class="ki-outline ki-right fs-7 text-gray-700"></i>
                        </li>
                        <li class="breadcrumb-item text-gray-700 fw-bold lh-1 mx-n1">User</li>
                        <li class="breadcrumb-item">
                            <i class="ki-outline ki-right fs-7 text-gray-700"></i>
                        </li>
                        <li class="breadcrumb-item text-gray-500 mx-n1">Pembayaran Pesanan</li>
                    </ul>
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-3 m-0">
                        Pembayaran Pesanan</h1>
                </div>
            </div>
        </div>

        <!--start content-->
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div class="row mb-5">
                    <div class="col-md-6">
                        <div class="card card-flush py-4 mb-5">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <h4 class="text-gray-800 fw-bold">{{ $toko->nama_toko }}</h4>
                                    {{-- <p class="text-gray-700 fw-semibold pb-1 mb-0">Pembuatan Kebaya Wisuda</p> --}}
                                    <p class="text-gray-600 fw-bold pt-0 mt-0">
                                        <i class="ki-duotone ki-user me-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        Penjahit
                                        <i class="ms-3 me-1 ki-duotone ki-geolocation">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        {{ $toko->alamat_toko }}
                                    </p>
                                </div>
                                <div class="row mb-3">
                                    <h4 class="text-gray-800 fw-bold">{{ $pesanan->pemesan }}</h4>
                                    <p class="text-gray-700 fw-semibold pt-0 mt-0">
                                        <i class="ki-duotone ki-user me-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        {{ $pembeli->email }}
                                    </p>
                                </div>
                                <div class="row mb-3">
                                    <h4 class="text-gray-800 fw-bold">Jadwal Temu</h4>
                                    <p class="text-gray-700 fw-semibold pt-0 mt-0 pb-1 mb-0">
                                        <i class="me-1 ki-duotone ki-geolocation">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        {{ $toko->alamat_toko }}
                                    </p>
                                    <p class="text-gray-700 fw-semibold pt-0 mt-0">
                                        3 Mei 2024, 13:00 WIB
                                    </p>
                                </div>
                                <div class="row mb-3">
                                    <h4 class="text-gray-800 fw-semibold">Pesan</h4>
                                    <div class="px-3">
                                        <textarea class="form-control form-control form-control-solid" rows="6" data-kt-autosize="true">{{ $pesanan->catatan }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card card-border">
                            <div class="card-header">
                                <h3 class="card-title">Ringkasan Pesanan</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table align-middle table-row-dashed fs-6 gy-5"id="table">
                                        <thead class="fw-bold fs-7 text-uppercase text-gray-900 text-nowrap">
                                            <tr class="text-uppercase">
                                                <th class="pe-3">Pesanan</th>
                                                <th class="pe-3 text-start">Harga</th>
                                                <th class="pe-3 text-start">Sub total</th>
                                            </tr>
                                        </thead>
                                        <tbody class="fw-semibold text-gray-700">
                                            <tr>
                                                <td class="text-center">
                                                    <div class="d-flex align-items-center">
                                                        <div class="d-flex align-items-center">
                                                            <a class="d-block overlay me-3" data-fslightbox="lightbox-basic"
                                                                href="storage/uploads/products/thumbnail/{{ $product->thumbnail }}">
                                                                <div class="symbol symbol-50px">
                                                                    <img
                                                                        src="{{ url('storage/uploads/products/thumbnail/' . $product->thumbnail) }}">
                                                                </div>
                                                                <div
                                                                    class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                                                    <i class="bi bi-eye-fill text-white"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="row text-start">
                                                            <p class="text-nowrap pb-0 mb-0">{{ $product->product_name }}
                                                            </p>
                                                            <p class="pt-0 mt-0  pb-0 mb-0"><i
                                                                    class="ki-duotone ki-cross text-primary">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i> {{ $pesanan->kuantitas }} <span
                                                                    class="ms-2 text-primary">size:
                                                                    {{ $pesanan->ukuran }}</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="row text-start">
                                                        <p class="text-nowrap pb-0 mb-0">Rp. {{ $product->price }}</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="row text-start">
                                                        <p class="text-nowrap pb-0 mb-0">Rp.
                                                            {{ number_format($product->price * $pesanan->kuantitas, 2, ',', '.') }}
                                                        </p>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="d-flex justify-content-between text-uppercase">
                                        <h5 class="text-gray-600">total:</h5>
                                        <h5 class="text-gray-600">Rp.
                                            {{ number_format($product->price * $pesanan->kuantitas, 2, ',', '.') }}</h5>
                                    </div>
                                    <div class="d-flex justify-content-between text-uppercase">
                                        <h5 class="text-gray-800 fw-bold">dp awal:</h5>
                                        <h5 class="text-gray-800 fw-bold">Rp. 50.000,00</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2">
                            <button id="pay-button" class="btn btn-dark my-4">Bayar Sekarang</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end content-->

        <script type="text/javascript">
            // For example trigger on button clicked, or any time you need
            var payButton = document.getElementById('pay-button');
            payButton.addEventListener('click', function() {
                // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
                window.snap.pay('{{ $snapToken }}', {
                    onSuccess: function(result) {
                        /* You may add your own implementation here */
                        //   alert("payment success!"); console.log(result);
                        window.location.href = '/dashboard-user'
                    },
                    onPending: function(result) {
                        /* You may add your own implementation here */
                        alert("wating your payment!");
                        console.log(result);
                    },
                    onError: function(result) {
                        /* You may add your own implementation here */
                        alert("payment failed!");
                        console.log(result);
                    },
                    onClose: function() {
                        /* You may add your own implementation here */
                        alert('you closed the popup without finishing the payment');
                    }
                })
            });
        </script>
    @endsection
