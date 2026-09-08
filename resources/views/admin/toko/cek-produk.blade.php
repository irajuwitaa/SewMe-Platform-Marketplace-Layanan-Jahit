@extends('template.main')
@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
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
                            <li class="breadcrumb-item text-gray-500 mx-n1">Menu Admin</li>
                            <li class="breadcrumb-item">
                                <i class="ki-outline ki-right fs-7 text-gray-700"></i>
                            </li>
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1 mx-n1">Pengaturan Toko
                            </li>
                        </ul>
                        <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-3 m-0">
                            Detail Produk</h1>
                    </div>
                </div>
            </div>
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div class="card mb-5 mb-xxl-8">
                    <div class="card-body py-9">
                        <div class="row gx-9 h-100">
                            <div class="col-sm-4 mb-10 mb-sm-0">
                                <div id="carousel-display" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach ($product as $data)
                                            
                                        
                                        <div class="carousel-item active">
                                            <a href="{{ url('storage/uploads/products/images/' . $data->filename) }}" class="glightbox">
                                                <img src="{{ url('storage/uploads/products/images/' . $data->filename) }}"
                                                    class="detail-produk-displayimg d-block w-100" alt="">
                                            </a>
                                        </div>
                                        @endforeach
                                        {{-- <div class="carousel-item">
                                            <a href="../assets/media/produk-detail-2.jpg" class="glightbox">
                                                <img src="../assets/media/produk-detail-2.jpg"
                                                    class="detail-produk-displayimg d-block w-100" alt="">
                                            </a>
                                        </div> --}}
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel-display"
                                        data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carousel-display"
                                        data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="d-flex flex-column h-100">
                                    <div class="mb-5">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-4">
                                                    <span class="text-gray-800 fs-1 fw-bold" id="nama-produk">{{ $cek->product_name }}</span>
                                                </div>
                                                <div class="d-flex align-items-center flex-wrap d-grid gap-2">
                                                    <div class="d-flex align-items-center me-5 me-xl-13">
                                                        <div class="m-0">
                                                            <p class="fw-bold text-gray-800 fs-6" id="jml-produk-disewakan">
                                                                10
                                                                <span
                                                                    class="fw-semibold text-gray-500 d-block fs-6">Di{{ $cek->jenis }}kan</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="m-0">
                                                            <p class="fw-bold text-gray-800 fs-6">
                                                                <i class="ki-solid ki-abstract-23 text-warning"></i>
                                                                5
                                                                <span class="fw-semibold text-gray-500 d-block fs-6"
                                                                    id="jml-penilaian-produk">6
                                                                    Penilaian</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="fs-1 fw-bolder" id="harga-produk">Rp{{ $cek->price }}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="detail-toko.html" id="info-toko"
                                                    class="card mt-3 px-3 py-3 px-5 py-5">
                                                    <div class="d-flex align-items-center gap-5">
                                                        <div class="symbol symbol-50px symbol-circle mb-5">
                                                            <img src="{{ asset('storage/' . $cek->toko->gambar_toko) }}" alt="image">
                                                        </div>
                                                        <div>
                                                            <p class="fw-bold fs-5 pb-0 mb-2" id="nama-toko">
                                                                {{ $cek->toko->nama_toko }}
                                                            </p>
                                                            <div class="d-flex gap-10 mt-0 pb-0">
                                                                <div>
                                                                    <p class="fw-bold text-gray-800 fs-6"
                                                                        id="total-penilaian-toko">
                                                                        <i class="ki-solid ki-abstract-23 text"></i>
                                                                        4.5
                                                                        <span
                                                                            class="fw-semibold text-gray-500 d-block fs-6">Total
                                                                            Penilaian</span>
                                                                    </p>
                                                                </div>
                                                                <div>
                                                                    <p class="fw-bold text-gray-800 fs-6"
                                                                        id="jml-produk-toko">{{ count($count) }}
                                                                        <span
                                                                            class="fw-semibold text-gray-500 d-block fs-6">Produk</span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-gray-300 border-bottom mb-5"></div>
                                    <div class="mb-2">
                                        <span class="fw-bold fs-5">Deskripsi produk</span>
                                    </div>
                                    <div class="mb-5">
                                        <p class="text-gray-500" id="deskripsi-produk">
                                            {{ $cek->description }}.
                                        </p>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-5 mb-3">
                                            <p class="fw-bold fs-5">Stok : {{ $cek->stock }} </p>
                                            {{-- <select class="form-select" aria-label="Pilih Ukuran" id="ukuran-produk">
                                                <option>Pilih Ukuran</option>
                                                <option value="S">S</option>
                                                <option value="M">M</option>
                                                <option value="L">L</option>
                                                <option value="X">XL</option>
                                                <option value="XXL">XXL</option>
                                            </select> --}}
                                        </div>
                                        {{-- <div class="col-sm-3">
                                            <p class="fw-bold fs-5">Kuantitas</p>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary rounded-0" type="button"
                                                        id="button-minus">-</button>
                                                </div>
                                                <input type="number" class="form-control" id="quantity-input"
                                                    value="1" min="1">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary rounded-0" type="button"
                                                        id="button-plus">+</button>
                                                </div>
                                            </div>
                                            <p class="text-gray-500 mt-2" id="deskripsi-produk">
                                                Stok: <span class="fw-bolder" id="stok-produk">{{ $cek->stock }}</span>
                                            </p>
                                        </div> --}}
                                    </div>
                                    <a href="/edit-produk-admin/{{ $cek->id }}" class="btn btn-sm btn-dark w-175px" id="btn-ubah-produk">
                                        <i class="ki-solid ki-setting-2 fs-3"></i>
                                        Ubah Produk
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
