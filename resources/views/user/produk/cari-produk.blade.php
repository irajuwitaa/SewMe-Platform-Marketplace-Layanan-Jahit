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
                            <li class="breadcrumb-item text-gray-500 fw-bold lh-1 mx-n1">Cari Produk
                            </li>
                        </ul>
                        <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-3 m-0">
                            Cari Produk
                        </h1>
                    </div>

                    <div id="searchbar" data-kt-search-keypress="true" data-kt-search-min-length="2"
                        data-kt-search-enter="true" data-kt-search-layout="inline" class="ms-auto mt-3 mt-md-0">
                        <form data-kt-search-element="form" class="position-relative mb-5 mb-md-0" autocomplete="off"
                            id="searchbar-field">
                            <input type="hidden" />
                            <div class="position-relative">
                                <i
                                    class="ki-solid ki-magnifier fs-2 position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                                <input type="text"
                                    class="form-control form-control-md  form-control-sm form-control-solid ps-10"
                                    name="search" value="" placeholder="Cari di sini..."
                                    data-kt-search-element="input" />
                            </div>
                            <span class="position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-5"
                                data-kt-search-element="spinner">
                                <span class="spinner-border h-15px w-15px align-middle text-gray-500"></span>
                            </span>
                            <span
                                class="btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 me-5 d-none"
                                data-kt-search-element="clear">
                            </span>
                        </form>
                    </div>
                </div>
            </div>

            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div class="card mb-5 mb-xxl-8">
                    <div class="card-body py-0">
                        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                            <li class="nav-item mt-2">
                                <a class="nav-link text-active-dark ms-0 me-10 py-5 active" href="#">Semua Produk</a>
                            </li>
                            <li class="nav-item mt-2">
                                <a class="nav-link text-active-dark ms-0 me-10 py-5" href="produk-populer.html">Populer</a>
                            </li>
                            <li class="nav-item mt-2">
                                <a class="nav-link text-active-dark ms-0 me-10 py-5" href="produk-palingbanyak.html">Paling
                                    Banyak</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="carousel-toko" class="carousel slide position-relative mb-5 mb-xxl-12">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carousel-toko" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carousel-toko" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="../public/assets/media/bg-login.jpg" class="d-block w-100 carousel-image"
                                alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="../public/assets/mediabg-login.jpg" class="d-block w-100 carousel-image"
                                alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel-toko"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel-toko"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="row">
                    @foreach ($data as $dataproduk)
                        <div class="col-lg-2 col-md-6 col-6 mb-3">
                            <a href="{{ route('user.produk.detail-produk', ['id' => $dataproduk->id]) }}"
                                style="text-decoration: none; color: inherit;">
                                <div class="card mb-5 mb-xl-4" style="position: relative;">
                                    <div class="card-body pt-0 px-0 pb-0">
                                        <div class="mb-4">
                                            <img src="{{ asset('storage/uploads/products/thumbnail/' . $dataproduk->thumbnail) }}"
                                                class="foto-produk-toko" id="foto-produk" alt="{{ $dataproduk->name }}" />
                                        </div>
                                        <div class="col mb-3 px-5">
                                            <div>
                                                <span class="text-gray-800 fw-bold fs-4"
                                                    id="nama-produk">{{ $dataproduk->product_name }}</span>
                                                <span class="text-muted d-block fw-semibold"
                                                    id="deskripsi-produk">{{ $dataproduk->description }}</span>
                                            </div>
                                        </div>
                                        <div class="row px-5 mb-4">
                                            <div class="col">
                                                <div class="text-gray-800">
                                                    <span class="fs-4">Rp</span><span class="fw-bold fs-3 m-0"
                                                        id="harga-produk">{{ number_format($dataproduk->price, 2, ',', '.') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

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

            <div class="modal fade" id="modal-bannertoko" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered mw-1000px">
                    <div class="modal-content">
                        <div class="modal-header py-7 d-flex justify-content-between">
                            <h2>Atur Banner Toko</h2>
                            <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                <i class="ki-outline ki-cross fs-1"></i>
                            </div>
                        </div>
                        <div class="modal-body scroll-y m-5">
                            <form id="kt_account_profile_details_form" class="form">
                                <div class="card-body">
                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Unggah Foto
                                            Banner
                                            <span class="form-text"><br>Ukuran yang disarankan: 1200x600
                                                piksel</span></label>
                                        <div class="col-lg-8">
                                            <div class="image-input image-input-outline" data-kt-image-input="true"
                                                style="background-image: url('assets/media/svg/avatars/blank.svg')">
                                                <div class="image-input-wrapper w-250px h-125px">
                                                </div>
                                                <label
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                    title="Ubah">
                                                    <i class="ki-outline ki-pencil fs-7"></i>
                                                    <input type="file" name="banner" accept=".png, .jpg, .jpeg" />
                                                    <input type="hidden" name="avatar_remove" />
                                                </label>
                                                <span
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                    title="Batalkan">
                                                    <i class="ki-outline ki-cross fs-2"></i>
                                                </span>
                                                <span
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                    title="Hapus">
                                                    <i class="ki-outline ki-cross fs-2"></i>
                                                </span>
                                            </div>
                                            <div class="form-text">Format file yang diterima: png, jpg,
                                                jpeg.</div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-end">
                            <button type="reset" class="btn btn-light btn-active-light-primary me-2"
                                data-bs-dismiss="modal">Batalkan</button>
                            <button class="btn btn-primary" id="">Simpan Perubahan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
