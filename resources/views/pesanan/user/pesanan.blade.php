@extends('template.main')

@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7">
                        <li class="breadcrumb-item text-gray-700 fw-bold lh-1 mx-n1">
                            <a href="/dashboard-user" class="text-hover-primary">
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
                        <li class="breadcrumb-item text-gray-500 mx-n1">Pesanan</li>
                    </ul>
                    <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-3 m-0">
                        Pesanan</h1>
                </div>
            </div>
            <div class="container mt-5">
                <div class="row">
                    {{-- foreach --}}
                    @foreach ($pesanan as $data)
                    <div class="col-md-6">
                        <div class="card card-border">
                            <div class="card-header">
                                <div class="d-flex">
                                    <div class="mt-5">
                                        <div class="symbol symbol-circle symbol-30px overflow-hidden me-3">
                                            <a href="apps/user-management/users/view.html">
                                                <div class="symbol-label">
                                                    <img src="{{ asset('storage/' . $data->toko->gambar_toko) }}" alt="Dan Wilson"
                                                        class="w-100">
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="mt-5 ms-3">
                                        <h4 class="text-gray-800 fw-bold">{{ $data->toko->nama_toko }}</h4>
                                        <p class="text-gray-600 fw-bold pt-0 mt-0 pb-1 mb-1">
                                            <i class="ki-duotone ki-user me-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            Penjahit
                                            <i class="ms-3 me-1 ki-duotone ki-geolocation">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            {{ $data->toko->alamat_toko }}
                                        </p>
                                        @if ($data->status == 1)
                                            <p class="pt-0 mt-0">Status: <span class="badge badge-light-danger">Belum diproses</span></p>
                                        @elseif ($data->status == 2)
                                            <p class="pt-0 mt-0">Status: <span class="badge badge-light-info">Dalam Proses</span></p>
                                        @elseif ($data->status == 3)
                                            <p class="pt-0 mt-0">Status: <span class="badge badge-light-success">Selesai</span></p>
                                        @else
                                            Status tidak diketahui
                                        @endif
                                        <p class="pt-0 mt-0">Perkiraan Selesai: {{ $data->selesai_tanggal }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="table">
                                        <tbody class="fw-semibold text-gray-700">

                                            <tr class="text-uppercase">
                                                <th class="pe-3">Pesanan</th>
                                                <th class="pe-3 text-start">Harga</th>
                                                <th class="pe-3 text-start">Sub total</th>
                                            </tr>

                                            <tr>
                                                <td class="text-center">
                                                    <div class="d-flex align-items-center">
                                                        <div class="d-flex align-items-center">
                                                            <a class="d-block overlay me-3" data-fslightbox="lightbox-basic"
                                                                href="{{ asset('storage/public/uploads/products/' . $data->produk->thumbnail) }}">
                                                                <div class="symbol symbol-50px">
                                                                    <img src="{{ asset('storage/public/uploads/products/' . $data->produk->thumbnail) }}">
                                                                </div>
                                                                <div
                                                                    class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                                                    <i class="bi bi-eye-fill text-white"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="row text-start">
                                                            <p class="text-nowrap pb-0 mb-0">{{ $data->produk->product_name }}</p>
                                                            <p class="pt-0 mt-0  pb-0 mb-0"><i
                                                                    class="ki-duotone ki-cross text-primary">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i> {{ $data->kuantitas }} <span class="ms-2 text-primary">size: {{ $data->ukuran }}</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="row text-start">
                                                        <p class="text-nowrap pb-0 mb-0">Rp. {{ $data->produk->price }}</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="row text-start">
                                                        <p class="text-nowrap pb-0 mb-0">Rp. {{ $data->produk->price * $data->kuantitas }}</p>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row mt-5">
                                    <div class="d-flex justify-content-between text-uppercase">
                                        <h5 class="text-gray-600">total:</h5>
                                        <h5 class="text-gray-600">Rp. {{ $data->produk->price * $data->kuantitas }}</h5>
                                    </div>
                                    {{-- <div class="d-flex justify-content-between text-uppercase">
                                        <h5 class="text-gray-800 fw-bold">dp awal:</h5>
                                        <h5 class="text-gray-800 fw-bold">Rp. 50.000,00</h5>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-dark float-end">Hubungi Penjual</button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- end foreach --}}
                </div>
            </div>
        </div>
    @endsection

    {{-- @foreach ($riwayat as $pesanan)
                <div class="col-md-6">
                    <div class="card card-border">
                        <div class="card-header">
                            <div class="d-flex">
                                <div class="mt-5">
                                    <div class="symbol symbol-circle symbol-30px overflow-hidden me-3">
                                        <a href="{{ url('apps/user-management/users/view/' . $pesanan->user->id) }}">
                                            <div class="symbol-label">
                                                <img src="{{ asset('assets/media/avatars/300-23.jpg') }}" alt="{{ $pesanan->user->name }}" class="w-100">
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="mt-5 ms-3">
                                    <h4 class="text-gray-800 fw-bold">{{ $pesanan->user->name }}</h4>
                                    <p class="text-gray-600 fw-bold pt-0 mt-0 pb-1 mb-1">
                                        <i class="ki-duotone ki-user me-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        Penjahit
                                        <i class="ms-3 me-1 ki-duotone ki-geolocation">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        {{ $pesanan->user->address }}
                                    </p>
                                    <p class="pt-0 mt-0">Status: <span class="badge badge-light-success">Selesai</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5">
                                    <tbody class="fw-semibold text-gray-700">
                                        <tr>
                                            <td class="text-center">
                                                <div class="d-flex align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <a class="d-block overlay me-3" data-fslightbox="lightbox-basic" href="{{ asset('assets/media/stock/900x600/' . $pesanan->produk->image) }}">
                                                            <div class="symbol symbol-50px">
                                                                <img src="{{ asset('assets/media/stock/900x600/' . $pesanan->produk->image) }}">
                                                            </div>
                                                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                                                <i class="bi bi-eye-fill text-white"></i>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="row text-start">
                                                        <p class="text-nowrap pb-0 mb-0">{{ $pesanan->produk->product_name }}</p>
                                                        <p class="pt-0 mt-0 pb-0 mb-0">
                                                            <i class="ki-duotone ki-cross text-primary">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                            {{ $pesanan->kuantitas }}
                                                            <span class="ms-2 text-primary">size: {{ $pesanan->produk->size }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row text-start">
                                                    <p class="text-nowrap pb-0 mb-0">Rp. {{ number_format($pesanan->pembayaran, 2, ',', '.') }}</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row text-start">
                                                    <p class="text-nowrap pb-0 mb-0">Rp. {{ number_format($pesanan->pembayaran * $pesanan->kuantitas, 2, ',', '.') }}</p>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row mt-5">
                                <div class="d-flex justify-content-between text-uppercase">
                                    <h5 class="text-gray-600">total:</h5>
                                    <h5 class="text-gray-600">Rp. {{ number_format($pesanan->total, 2, ',', '.') }}</h5>
                                </div>
                                <div class="d-flex justify-content-between text-uppercase">
                                    <h5 class="text-gray-800 fw-bold">dp awal:</h5>
                                    <h5 class="text-gray-800 fw-bold">Rp. {{ number_format($pesanan->dp_awal, 2, ',', '.') }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between mb-4">
                                <div class="row">
                                    <label>Beri Rating : </label>
                                    <svg style="display: none;">
                                        <symbol id="star" viewBox="0 0 98 92">
                                            <title>star</title>
                                            <path stroke='#000' stroke-width='5' d='M49 73.5L22.55 87.406l5.05-29.453-21.398-20.86 29.573-4.296L49 6l13.225 26.797 29.573 4.297-21.4 20.86 5.052 29.452z' fill-rule='evenodd' />
                                        </symbol>
                                    </svg>
                                    <div class="rating">
                                        <a href="javascript:;" class="rating__button"><svg class="rating__star">
                                                <use xlink:href="#star"></use>
                                            </svg></a>
                                        <a href="javascript:;" class="rating__button"><svg class="rating__star">
                                                <use xlink:href="#star"></use>
                                            </svg></a>
                                        <a href="javascript:;" class="rating__button"><svg class="rating__star">
                                                <use xlink:href="#star"></use>
                                            </svg></a>
                                        <a href="javascript:;" class="rating__button"><svg class="rating__star">
                                                <use xlink:href="#star"></use>
                                            </svg></a>
                                        <a href="javascript:;" class="rating__button"><svg class="rating__star">
                                                <use xlink:href="#star"></use>
                                            </svg></a>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-dark float-end">Beli Lagi</button>
                        </div>
                    </div>
                </div>
                @endforeach --}}
