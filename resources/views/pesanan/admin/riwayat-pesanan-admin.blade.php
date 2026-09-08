@extends('template.main')
@section('content')
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
                            <a href="..{{ '/dashboard-' . strtolower(getUserRole()->name) }}" class="text-hover-primary">
                                <i class="ki-outline ki-home text-gray-700 fs-6"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <i class="ki-outline ki-right fs-7 text-gray-700"></i>
                        </li>
                        <li class="breadcrumb-item text-gray-700 fw-bold lh-1 mx-n1">Admin</li>
                        <li class="breadcrumb-item">
                            <i class="ki-outline ki-right fs-7 text-gray-700"></i>
                        </li>
                        <li class="breadcrumb-item text-gray-500 mx-n1">Riwayat Pesanan</li>
                    </ul>
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-3 m-0">
                        Tabel Riwayat Pesanan Saya</h1>
                </div>
            </div>
        </div>

        <!--start content-->
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_content" class="app-content flex-column-fluid">

                    
       
                <div class="card card-flush">
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <div class="card-title">
                            <div class="d-flex align-items-center position-relative my-1">
                                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <input type="text" table-search="search"
                                    class="form-control form-control-solid w-250px ps-12" placeholder="Cari..." />
                            </div>
                            <div id="table-export" class="d-none"></div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="table">
                                <thead class="fw-bold fs-7 text-uppercase text-gray-900 text-nowrap bg-gray-100">
                                        <tr>
                                            <th class="text-center px-3">No.</th>
                                            <th class="pe-3 min-w-325px">Produk dan Pemesan</th>
                                            <th class="pe-3 min-w-150px text-start">Total Pembayaran</th>
                                            <th class="pe-3 min-w-150px text-start">Tanggal Pesanan</th>
                                            <th class="pe-3 min-w-150px">Rating</th>
                                            <th class="text-center pe-3">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-semibold text-gray-700">
                                        @foreach ($riwayat as $pesanan)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">
                                                <div class="d-flex align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <a class="d-block overlay me-3" data-fslightbox="lightbox-basic"
                                                            href="{{ asset('storage/uploads/products/thumbnail/' . $pesanan->produk->thumbnail) }}">
                                                            <div class="symbol symbol-50px">
                                                                <img src="{{ asset('storage/uploads/products/thumbnail/' . $pesanan->produk->thumbnail) }}">
                                                            </div>
                                                            <div
                                                                class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                                                <i class="bi bi-eye-fill text-white"></i>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="row text-start">
                                                        <p class="text-nowrap pt-5 pb-0 mb-0">{{ $pesanan->produk->product_name }}</p>
                                                        <p class="pt-0 mt-0  pb-0 mb-0"><i
                                                                class="ki-duotone ki-cross text-primary">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i> {{ $pesanan->kuantitas }}
                                                        </p>
                                                        <p class="pt-0 mt-0 text-nowrap">Pemesan: {{ $pesanan->user->name }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row text-start">
                                                    <p class="text-nowrap pt-5 pb-0 mb-0">Rp. {{ number_format($pesanan->pembayaran * $pesanan->kuantitas, 2, ',', '.') }}</p>
                                                    <p class="text-nowrap text-muted">Selesai</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row text-start">
                                                    <p class="text-nowrap pt-5 pb-0 mb-0">{{ \Carbon\Carbon::parse($pesanan->created_at)->format('d F Y') }}</p>
                                                    <p class="text-nowrap text-muted">selesai tanggal: {{ \Carbon\Carbon::parse($pesanan->selesai_tanggal)->format('d F Y') }}</p>
                                                </div>
                                            </td>
                                            <td class="text-start" data-order="rating-3">
                                                <div class="rating justify-content-start">
                                                    <div class="rating-label checked">
                                                        <i class="ki-outline ki-star fs-6"></i>
                                                    </div>
                                                    <div class="rating-label checked">
                                                        <i class="ki-outline ki-star fs-6"></i>
                                                    </div>
                                                    <div class="rating-label checked">
                                                        <i class="ki-outline ki-star fs-6"></i>
                                                    </div>
                                                    <div class="rating-label">
                                                        <i class="ki-outline ki-star fs-6"></i>
                                                    </div>
                                                    <div class="rating-label">
                                                        <i class="ki-outline ki-star fs-6"></i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-end text-nowrap">
                                                <button class="btn btn-outline btn-outline-dark btn-active-light-primary btn-sm"
                                                    data-bs-toggle="modal" data-bs-target="#modalKomentar">
                                                    Lihat Komentar<i class="ms-2 ki-duotone ki-double-right">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </button>
                                            </td>
                                        </tr>
                              @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                </div>
            </div>
        </div>
        <!--end content-->
    @endsection
