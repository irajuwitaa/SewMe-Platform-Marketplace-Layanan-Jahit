@extends('template.main')
@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_toolbar" class="app-toolbar pt-7 pt-lg-10">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7">
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1 mx-n1">
                                <a href="..{{ '/dashboard-' . strtolower(getUserRole()->name) }}" class="text-hover-primary">
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
                            Pengaturan Toko</h1>
                    </div>
                </div>
            </div>
            <div id="kt_app_content" class="app-content flex-column-fluid">

                @if (empty($toko->nama_toko))
                <div class="card mb-5 mb-xxl-8">
                    <div class="card-body pt-9 pb-0">
                        <div class="d-flex flex-column align-items-center">
                            <h3 class="text-center fs-5">Anda belum mengisi data toko, silahkan atur dulu.</h3>
                            <div class="d-flex my-4">
                                <a href="/ubah-profil" class="btn btn-light me-2" id="ubah-profil-btn">
                                    <i class="ki-outline ki-check fs-3 d-none"></i>
                                    <span class="indicator-label">Atur Profil</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                @else

                <div class="card mb-5 mb-xxl-8">
                    <div class="card-body pt-9 pb-0">
                        <div class="d-flex flex-wrap flex-sm-nowrap">
                            <div class="me-7 mb-4">
                                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                    <img src="{{ asset('storage/' . $toko->gambar_toko) }}" alt="image" />
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                    <div class="d-flex flex-column">
                                        <div class="d-flex align-items-center mb-2">
                                            <span class="text-gray-900 fs-2 fw-bolder me-1"
                                                id="nama-toko">{{ $toko->nama_toko }}</span>
                                        </div>
                                        <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                            <span class="d-flex align-items-center text-gray-500 me-5 mb-2">
                                                <i class="ki-outline ki-profile-circle fs-4 me-1"
                                                    id="jenis-akun"></i>Penjahit</span>
                                            <a href="{{ $toko->link_google_map }}" target="_blank"
                                                class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2"
                                                id="alamat-toko">
                                                <i class="ki-outline ki-geolocation fs-4 me-1"></i>
                                                {{ $toko->alamat_toko }}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="d-flex my-4">
                                        <a href="/ubah-profil" class="btn btn-light me-2" id="ubah-profil-btn">
                                            <i class="ki-outline ki-check fs-3 d-none"></i>
                                            <span class="indicator-label">Ubah Profil</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap flex-stack">
                                    <div class="d-flex flex-column flex-grow-1 pe-8">
                                        <div class="d-flex flex-wrap">
                                            {{-- <div
                                                class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <i class="ki-solid ki-abstract-23 text-warning"></i>
                                                    <span></span>
                                                    <div class="fs-2 fw-bolder" id="total-penilaian-toko">4.5</div>
                                                </div>
                                                <div class="fw-semibold fs-6 text-gray-500">Total
                                                    Penilaian</div>
                                            </div> --}}
                                            <div
                                                class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="fs-2 fw-bolder" id="jml-produk-toko">{{ count($product) }}
                                                    </div>
                                                </div>
                                                <div class="fw-semibold fs-6 text-gray-500">Produk</div>
                                            </div>
                                            <div
                                                class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="fs-2 fw-bolder" id="jam-kerja-toko">
                                                        {{ substr($toko->jam_buka, 0, 5) }} -
                                                        {{ substr($toko->jam_tutup, 0, 5) }}
                                                    </div>
                                                </div>
                                                <div class="fw-semibold fs-6 text-gray-500">Jam Kerja
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                            <li class="nav-item mt-2">
                                <a class="nav-link text-active-dark ms-0 me-10 py-5 active" href="#">Semua Produk</a>
                            </li>
                            <li class="nav-item mt-2">
                                <a class="nav-link text-active-dark ms-0 me-10 py-5"
                                    href="pengaturan-toko-populer.html">Populer</a>
                            </li>
                            <li class="nav-item mt-2">
                                <a class="nav-link text-active-dark ms-0 me-10 py-5"
                                    href="pengaturan-toko-palingbanyak.html">Paling Banyak</a>
                            </li>
                        </ul>
                    </div>
                </div>

                @endif

                @if (empty($banner->gambar_banner))
                <div class="card mb-5 mb-xxl-8">
                    <div class="card-body pt-9 pb-0">
                        <div class="d-flex flex-column align-items-center">
                            <h3 class="text-center fs-5">Anda belum upload Banner, silahkan upload dulu.</h3>
                            <div class="d-flex my-4">
                                <a href="/ubah-banner/{{ $banner->toko_id ?? '' }}" class="btn btn-light me-2" id="ubah-profil-btn">
                                    <i class="ki-outline ki-check fs-3 d-none"></i>
                                    <span class="indicator-label">Atur Banner</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div id="carousel-toko" class="carousel slide position-relative mb-5 mb-xxl-12" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        @if ($banner && $banner->gambar_banner)
                            @foreach (json_decode($banner->gambar_banner) as $key => $gambar)
                                <button type="button" data-bs-target="#carousel-toko" data-bs-slide-to="{{ $key }}"
                                    class="{{ $key == 0 ? 'active' : '' }}" aria-current="{{ $key == 0 ? 'true' : 'false' }}"
                                    aria-label="Slide {{ $key + 1 }}"></button>
                            @endforeach
                        @endif
                    </div>
                    <div class="carousel-inner">
                        @if ($banner && $banner->gambar_banner)
                            @foreach (json_decode($banner->gambar_banner) as $key => $gambar)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <img src="{{ asset('storage/' . $gambar) }}" class="d-block w-100 carousel-image" alt="...">
                                </div>
                            @endforeach
                        @else
                            <div class="carousel-item active">
                                <img src="path/to/your/default/image.jpg" class="d-block w-100 carousel-image" alt="Default Image">
                            </div>
                        @endif
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel-toko" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel-toko" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    <a href="/ubah-banner/{{ $banner->toko_id ?? '' }}" class="btn btn-icon btn-sm btn-secondary setting-button"
                        id="set-banner-btn">
                        <i class="ki-solid ki-setting-2"></i>
                    </a>
                </div>

                @endif

                <div class="row">
                
                    @foreach ($product as $data)
                    


                    <div class="col-lg-2 col-md-6 col-6 mb-3">
                        <div class="card mb-5 mb-xl-4">
                            <div class="setting-button">
                                <a href="/edit-produk-admin/{{ $data->id }}"
                                    class="btn btn-icon btn-sm btn-secondary">
                                    <i class="ki-solid ki-setting-2"></i>
                                </a>
                            </div>
                            <div class="card-body pt-0 px-0 pb-0">
                                <a href="/cek-produk/{{ $data->id }}">
                                    <div class="mb-4">
                                        <img src="{{ url('storage/uploads/products/thumbnail/' . $data->thumbnail) }}" class="" id="foto-produk"
                                            alt="" />
                                    </div>
                                    <div class="col mb-3 px-5">
                                        <div>
                                            <span class="text-gray-800 fw-bold fs-4"
                                                id="nama-produk">{{ $data->product_name }}</span>
                                            <span class="text-muted d-block fw-semibold"
                                                id="deskripsi-produk">{{ $data->description }}.</span>
                                        </div>
                                    </div>
                                    <div class="row px-5 mb-4">
                                        <div class="col">
                                            <div class="text-gray-800">
                                                <span class="fs-4">Rp</span><span
                                                    class="fw-bold fs-3 m-0"
                                                    id="harga-produk">{{ $data->price }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- <div class="col-lg-2 col-md-6 col-6 mb-3">
                        <div class="card mb-5 mb-xl-4">
                            <div class="setting-button">
                                <a href="/ubah-produk" class="btn btn-icon btn-sm btn-secondary">
                                    <i class="ki-solid ki-setting-2"></i>
                                </a>
                            </div>
                            <div class="card-body pt-0 px-0 pb-0">
                                <a href="/cek-produk">
                                    <div class="mb-4">
                                        <img src="../assets/media/produk-1.png" class="" id="foto-produk"
                                            alt="" />
                                    </div>
                                    <div class="col mb-3 px-5">
                                        <div>
                                            <span class="text-gray-800 fw-bold fs-4" id="nama-produk">Kebaya Wisuda
                                                Pink</span>
                                            <span class="text-muted d-block fw-semibold" id="deskripsi-produk">Harga sewa
                                                termasuk kebaya, rok
                                                lilit, dan jilbab.</span>
                                        </div>
                                    </div>
                                    <div class="row px-5 mb-4">
                                        <div class="col">
                                            <div class="text-gray-800">
                                                <span class="fs-4">Rp</span><span class="fw-bold fs-3 m-0"
                                                    id="harga-produk">150.000</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-6 mb-3">
                        <div class="card mb-5 mb-xl-4">
                            <div class="setting-button">
                                <a href="/ubah-produk" class="btn btn-icon btn-sm btn-secondary">
                                    <i class="ki-solid ki-setting-2"></i>
                                </a>
                            </div>
                            <div class="card-body pt-0 px-0 pb-0">
                                <a href="/cek-produk">
                                    <div class="mb-4">
                                        <img src="../assets/media/produk-1.png" class="" id="foto-produk"
                                            alt="" />
                                    </div>
                                    <div class="col mb-3 px-5">
                                        <div>
                                            <span class="text-gray-800 fw-bold fs-4" id="nama-produk">Kebaya Wisuda
                                                Pink</span>
                                            <span class="text-muted d-block fw-semibold" id="deskripsi-produk">Harga sewa
                                                termasuk kebaya, rok
                                                lilit, dan jilbab.</span>
                                        </div>
                                    </div>
                                    <div class="row px-5 mb-4">
                                        <div class="col">
                                            <div class="text-gray-800">
                                                <span class="fs-4">Rp</span><span class="fw-bold fs-3 m-0"
                                                    id="harga-produk">150.000</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-6 mb-3">
                        <div class="card mb-5 mb-xl-4">
                            <div class="setting-button">
                                <a href="/ubah-produk" class="btn btn-icon btn-sm btn-secondary">
                                    <i class="ki-solid ki-setting-2"></i>
                                </a>
                            </div>
                            <div class="card-body pt-0 px-0 pb-0">
                                <a href="/cek-produk">
                                    <div class="mb-4">
                                        <img src="../assets/media/produk-1.png" class="" id="foto-produk"
                                            alt="" />
                                    </div>
                                    <div class="col mb-3 px-5">
                                        <div>
                                            <span class="text-gray-800 fw-bold fs-4" id="nama-produk">Kebaya Wisuda
                                                Pink</span>
                                            <span class="text-muted d-block fw-semibold" id="deskripsi-produk">Harga sewa
                                                termasuk kebaya, rok
                                                lilit, dan jilbab.</span>
                                        </div>
                                    </div>
                                    <div class="row px-5 mb-4">
                                        <div class="col">
                                            <div class="text-gray-800">
                                                <span class="fs-4">Rp</span><span class="fw-bold fs-3 m-0"
                                                    id="harga-produk">150.000</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-6 mb-3">
                        <div class="card mb-5 mb-xl-4">
                            <div class="setting-button">
                                <a href="/ubah-produk" class="btn btn-icon btn-sm btn-secondary">
                                    <i class="ki-solid ki-setting-2"></i>
                                </a>
                            </div>
                            <div class="card-body pt-0 px-0 pb-0">
                                <a href="/cek-produk">
                                    <div class="mb-4">
                                        <img src="../assets/media/produk-1.png" class="" id="foto-produk"
                                            alt="" />
                                    </div>
                                    <div class="col mb-3 px-5">
                                        <div>
                                            <span class="text-gray-800 fw-bold fs-4" id="nama-produk">Kebaya Wisuda
                                                Pink</span>
                                            <span class="text-muted d-block fw-semibold" id="deskripsi-produk">Harga sewa
                                                termasuk kebaya, rok
                                                lilit, dan jilbab.</span>
                                        </div>
                                    </div>
                                    <div class="row px-5 mb-4">
                                        <div class="col">
                                            <div class="text-gray-800">
                                                <span class="fs-4">Rp</span><span class="fw-bold fs-3 m-0"
                                                    id="harga-produk">150.000</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-6 mb-3">
                        <div class="card mb-5 mb-xl-4">
                            <div class="setting-button">
                                <a href="/ubah-produk" class="btn btn-icon btn-sm btn-secondary">
                                    <i class="ki-solid ki-setting-2"></i>
                                </a>
                            </div>
                            <div class="card-body pt-0 px-0 pb-0">
                                <a href="/cek-produk">
                                    <div class="mb-4">
                                        <img src="../assets/media/produk-1.png" class="" id="foto-produk"
                                            alt="" />
                                    </div>
                                    <div class="col mb-3 px-5">
                                        <div>
                                            <span class="text-gray-800 fw-bold fs-4" id="nama-produk">Kebaya Wisuda
                                                Pink</span>
                                            <span class="text-muted d-block fw-semibold" id="deskripsi-produk">Harga sewa
                                                termasuk kebaya, rok
                                                lilit, dan jilbab.</span>
                                        </div>
                                    </div>
                                    <div class="row px-5 mb-4">
                                        <div class="col">
                                            <div class="text-gray-800">
                                                <span class="fs-4">Rp</span><span class="fw-bold fs-3 m-0"
                                                    id="harga-produk">150.000</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div> --}}
                </div>
                {{-- <div class="row">
                    <div class="col-lg-2 col-md-6 col-6 mb-3">
                        <div class="card mb-5 mb-xl-4">
                            <div class="setting-button">
                                <a href="/ubah-produk" class="btn btn-icon btn-sm btn-secondary">
                                    <i class="ki-solid ki-setting-2"></i>
                                </a>
                            </div>
                            <div class="card-body pt-0 px-0 pb-0">
                                <a href="/cek-produk">
                                    <div class="mb-4">
                                        <img src="../assets/media/produk-2.png" class="" id="foto-produk"
                                            alt="" />
                                    </div>
                                    <div class="col mb-3 px-5">
                                        <div>
                                            <span class="text-gray-800 fw-bold fs-4" id="nama-produk">Kebaya Wisuda
                                                Pink</span>
                                            <span class="text-muted d-block fw-semibold" id="deskripsi-produk">Harga sewa
                                                termasuk kebaya, rok
                                                lilit, dan jilbab.</span>
                                        </div>
                                    </div>
                                    <div class="row px-5 mb-4">
                                        <div class="col">
                                            <div class="text-gray-800">
                                                <span class="fs-4">Rp</span><span class="fw-bold fs-3 m-0"
                                                    id="harga-produk">150.000</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-6 mb-3">
                        <div class="card mb-5 mb-xl-4">
                            <div class="setting-button">
                                <a href="/ubah-produk" class="btn btn-icon btn-sm btn-secondary">
                                    <i class="ki-solid ki-setting-2"></i>
                                </a>
                            </div>
                            <div class="card-body pt-0 px-0 pb-0">
                                <a href="/cek-produk">
                                    <div class="mb-4">
                                        <img src="../assets/media/produk-2.png" class="" id="foto-produk"
                                            alt="" />
                                    </div>
                                    <div class="col mb-3 px-5">
                                        <div>
                                            <span class="text-gray-800 fw-bold fs-4" id="nama-produk">Kebaya Wisuda
                                                Pink</span>
                                            <span class="text-muted d-block fw-semibold" id="deskripsi-produk">Harga sewa
                                                termasuk kebaya, rok
                                                lilit, dan jilbab.</span>
                                        </div>
                                    </div>
                                    <div class="row px-5 mb-4">
                                        <div class="col">
                                            <div class="text-gray-800">
                                                <span class="fs-4">Rp</span><span class="fw-bold fs-3 m-0"
                                                    id="harga-produk">150.000</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-6 mb-3">
                        <div class="card mb-5 mb-xl-4">
                            <div class="setting-button">
                                <a href="/ubah-produk" class="btn btn-icon btn-sm btn-secondary">
                                    <i class="ki-solid ki-setting-2"></i>
                                </a>
                            </div>
                            <div class="card-body pt-0 px-0 pb-0">
                                <a href="/cek-produk">
                                    <div class="mb-4">
                                        <img src="../assets/media/produk-2.png" class="" id="foto-produk"
                                            alt="" />
                                    </div>
                                    <div class="col mb-3 px-5">
                                        <div>
                                            <span class="text-gray-800 fw-bold fs-4" id="nama-produk">Kebaya Wisuda
                                                Pink</span>
                                            <span class="text-muted d-block fw-semibold" id="deskripsi-produk">Harga sewa
                                                termasuk kebaya, rok
                                                lilit, dan jilbab.</span>
                                        </div>
                                    </div>
                                    <div class="row px-5 mb-4">
                                        <div class="col">
                                            <div class="text-gray-800">
                                                <span class="fs-4">Rp</span><span class="fw-bold fs-3 m-0"
                                                    id="harga-produk">150.000</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-6 mb-3">
                        <div class="card mb-5 mb-xl-4">
                            <div class="setting-button">
                                <a href="/ubah-produk" class="btn btn-icon btn-sm btn-secondary">
                                    <i class="ki-solid ki-setting-2"></i>
                                </a>
                            </div>
                            <div class="card-body pt-0 px-0 pb-0">
                                <a href="/cek-produk">
                                    <div class="mb-4">
                                        <img src="../assets/media/produk-2.png" class="" id="foto-produk"
                                            alt="" />
                                    </div>
                                    <div class="col mb-3 px-5">
                                        <div>
                                            <span class="text-gray-800 fw-bold fs-4" id="nama-produk">Kebaya Wisuda
                                                Pink</span>
                                            <span class="text-muted d-block fw-semibold" id="deskripsi-produk">Harga sewa
                                                termasuk kebaya, rok
                                                lilit, dan jilbab.</span>
                                        </div>
                                    </div>
                                    <div class="row px-5 mb-4">
                                        <div class="col">
                                            <div class="text-gray-800">
                                                <span class="fs-4">Rp</span><span class="fw-bold fs-3 m-0"
                                                    id="harga-produk">150.000</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-6 mb-3">
                        <div class="card mb-5 mb-xl-4">
                            <div class="setting-button">
                                <a href="/ubah-produk" class="btn btn-icon btn-sm btn-secondary">
                                    <i class="ki-solid ki-setting-2"></i>
                                </a>
                            </div>
                            <div class="card-body pt-0 px-0 pb-0">
                                <a href="/cek-produk">
                                    <div class="mb-4">
                                        <img src="assets/media/produk-2.png" class="" id="foto-produk"
                                            alt="" />
                                    </div>
                                    <div class="col mb-3 px-5">
                                        <div>
                                            <span class="text-gray-800 fw-bold fs-4" id="nama-produk">Kebaya Wisuda
                                                Pink</span>
                                            <span class="text-muted d-block fw-semibold" id="deskripsi-produk">Harga sewa
                                                termasuk kebaya, rok
                                                lilit, dan jilbab.</span>
                                        </div>
                                    </div>
                                    <div class="row px-5 mb-4">
                                        <div class="col">
                                            <div class="text-gray-800">
                                                <span class="fs-4">Rp</span><span class="fw-bold fs-3 m-0"
                                                    id="harga-produk">150.000</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-6 mb-3">
                        <div class="card mb-5 mb-xl-4">
                            <div class="setting-button">
                                <a href="/ubah-produk" class="btn btn-icon btn-sm btn-secondary">
                                    <i class="ki-solid ki-setting-2"></i>
                                </a>
                            </div>
                            <div class="card-body pt-0 px-0 pb-0">
                                <a href="/cek-produk">
                                    <div class="mb-4">
                                        <img src="../assets/media/produk-2.png" class="" id="foto-produk"
                                            alt="" />
                                    </div>
                                    <div class="col mb-3 px-5">
                                        <div>
                                            <span class="text-gray-800 fw-bold fs-4" id="nama-produk">Kebaya Wisuda
                                                Pink</span>
                                            <span class="text-muted d-block fw-semibold" id="deskripsi-produk">Harga sewa
                                                termasuk kebaya, rok
                                                lilit, dan jilbab.</span>
                                        </div>
                                    </div>
                                    <div class="row px-5 mb-4">
                                        <div class="col">
                                            <div class="text-gray-800">
                                                <span class="fs-4">Rp</span><span class="fw-bold fs-3 m-0"
                                                    id="harga-produk">150.000</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <ul class="pagination">
                    <li class="page-item previous disabled"><a href="#" class="page-link"><i
                                class="previous"></i></a></li>
                    <li class="page-item active"><a href="#" class="page-link">1</a></li>
                    <li class="page-item "><a href="#" class="page-link">2</a></li>
                    <li class="page-item "><a href="#" class="page-link">3</a></li>
                    <li class="page-item "><a href="#" class="page-link">4</a></li>
                    <li class="page-item "><a href="#" class="page-link">5</a></li>
                    <li class="page-item "><a href="#" class="page-link">6</a></li>
                    <li class="page-item next"><a href="#" class="page-link"><i class="next"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    @endsection
