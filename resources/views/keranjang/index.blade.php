{{-- @dd($dataDetails) --}}
@extends('template.main')
@section('content')
    <div class="app-main flex-column flex-row-fluid" id=    "kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_toolbar" class="app-toolbar pt-7 pt-lg-10">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7">
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1 mx-n1">
                                <a href="{{ '/dashboard-' . strtolower(getUserRole()->name) }}" class="text-hover-primary">
                                    <i class="ki-outline ki-home text-gray-700 fs-6"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <i class="ki-outline ki-right fs-7 text-gray-700"></i>
                            </li>
                            <li class="breadcrumb-item text-gray-500 mx-n1">Home</li>
                        </ul>
                        <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-3 m-0">
                            Keranjang</h1>
                    </div>
                </div>
            </div>
            <?php $i = 0 ?>
            @if (isset($dataDetails) && count($dataDetails) > 0 && $dataDetails[$i]['data']['status'] < 3)
                <div id="kt_app_content" class="app-content flex-column-fluid">
                    <div class="row mb-5">
                        @foreach ($dataDetails as $detail)
                            <div class="col-md-6">
                                <div class="card card-flush py-2 mb-5">
                                    <div class="card-body py-9">
                                        <form action="/pembayaran/{{ $detail['data']->id }}" method="POST">
                                            @csrf
                                            <div class="row gx-9 h-100">
                                                <div class="col-lg-4 mb-10 mb-sm-0 d-flex justify-content-center">
                                                    <div>
                                                        <img src="{{ url('storage/uploads/products/thumbnail/' . $detail['product']->thumbnail) }}"
                                                            class="detail-produk-displayimg d-block w-200px h-200px w-lg-150px h-lg-150px object-fit-cover"
                                                            alt="" draggable="false">
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="d-flex flex-column h-100">
                                                        <div class="mb-5">
                                                            <div class="mb-2">
                                                                <span class="text-gray-800 fs-3 fw-bold"
                                                                    id="nama-produk">{{ $detail['product']->product_name }}</span>
                                                            </div>
                                                            <div class="mb-2 d-flex align-items-center">
                                                                <img src="{{ url('storage/avatar/' . $detail['user']->avatar) }}"
                                                                    class="rounded-circle me-2 my-1" alt="Foto Toko"
                                                                    style="width: 30px; height: 30px;">
                                                                <span class="text-gray-800 fs-5 fw-medium"
                                                                    id="nama-toko">{{ $detail['user']->name }}</span>
                                                            </div>
                                                            <div class="row text-start">
                                                                <p class="mb-2 fs-6">
                                                                    <span class="text-primary">Size:
                                                                        {{ $detail['data']->ukuran }}</span>
                                                                </p>
                                                            </div>
                                                            <div class="fs-4 fw-bolder" id="harga-produk">
                                                                Rp
                                                                {{ number_format($detail['product']->price, 2, ',', '.') }}
                                                            </div>
                                                        </div>
                                                        <div class="border-gray-300 border-bottom mb-5"></div>
                                                        <div class="mb-2">
                                                            <span class="fw-bold fs-6">Catatan</span>
                                                        </div>
                                                        <div class="mb-5">
                                                            <textarea class="form-control text-gray-500 form-control-solid" id="deskripsi-produk" rows="3" name="catatan">{{ $detail['data']->catatan }}</textarea>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-6 mb-3">
                                                                <p class="fw-bold fs-7 align-content-start">Kuantitas</p>
                                                                <div class="input-group input-group-sm w-100">
                                                                    <div class="input-group-prepend">
                                                                        <button class="btn btn-secondary rounded-0 btn-sm"
                                                                            type="button" id="button-minus">-</button>
                                                                    </div>
                                                                    <input type="number" name="kuantitas"
                                                                        class="form-control form-control-sm"
                                                                        id="quantity-input"
                                                                        value="{{ $detail['data']->kuantitas }}"
                                                                        min="1">
                                                                    <div class="input-group-append">
                                                                        <button class="btn btn-secondary rounded-0 btn-sm"
                                                                            type="button" id="button-plus">+</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <button type="submit" class="btn btn-dark btn-sm">Pesan
                                                                    sekarang</button>
                                                            </div>
                                                            <div class="col-6 d-flex">
                                                                <a href="{{ route('hapus-keranjang', $detail['data']->id) }}"
                                                                    class="btn btn-icon btn-outline btn-outline-danger btn-active-light-danger btn-sm"
                                                                    onclick="return confirm('Anda yakin mau menghapus data ini?')">
                                                                    <i class="ki-duotone ki-trash fs-2">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                        <span class="path3"></span>
                                                                        <span class="path4"></span>
                                                                        <span class="path5"></span>
                                                                    </i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <p>Keranjang Anda kosong.</p>
            @endif
            <?php $i++; ?>
        </div>

    @endsection
