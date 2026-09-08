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
                        <a href="index.html" class="text-hover-primary">
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
                    <li class="breadcrumb-item text-gray-500 mx-n1">Pesanan</li>
                </ul>
                <!--begin::Title-->
                <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-3 m-0">Tabel Pesanan Saya</h1>
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
                            <form action="{{ route('pesanan-admin') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control form-control-solid w-250px ps-12" placeholder="Cari..." />
                                    <button type="submit" class="btn btn-dark">Cari</button>
                                </div>
                            </form>
                            
                        </div>
                        <div id="table-export" class="d-none"></div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5"
                            id="table">
                            <thead  class="fw-bold fs-7 text-uppercase text-gray-900 text-nowrap bg-gray-100">
                                <tr>
                                    <th class="text-center px-3">No.</th>
                                    <th class="pe-3 min-w-325px">Produk dan Pemesan</th>
                                    <th class="pe-3 min-w-150px text-start">Jenis Pesan</th>
                                    <th class="pe-3 min-w-150px text-start">Total Pembayaran</th>
                                    <th class="pe-3 min-w-150px text-start">Tanggal Pesanan</th>
                                    <th class="pe-3 min-w-150px">Status</th>
                                    <th class="text-center pe-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-700">

                                @foreach ($pesanan as $data)
                                @php
                                    $remainingDays = null;
                                    if ($data->selesai_tanggal) {
                                        $selesaiTanggal = \Carbon\Carbon::parse($data->selesai_tanggal);
                                        // Hitung sisa hari dari hari ini sampai tanggal selesai dan bulatkan ke atas
                                        $remainingDays = ceil(abs($selesaiTanggal->diffInDays(\Carbon\Carbon::now(), false)));
                                    }
                                @endphp

                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center">
                                                <a class="d-block overlay me-3" data-fslightbox="lightbox-basic" href="{{ asset('storage/uploads/products/thumbnail/' . $data->produk->thumbnail) }}">
                                                    <div class="symbol symbol-50px">
                                                        <img src="{{ asset('storage/uploads/products/thumbnail/' . $data->produk->thumbnail) }}">
                                                    </div>
                                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                                        <i class="bi bi-eye-fill text-white"></i>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="row text-start">
                                                <p class="text-nowrap pt-5 pb-0 mb-0">{{ $data->produk->product_name }}</p>
                                                <p class="pt-0 mt-0  pb-0 mb-0"><i class="ki-duotone ki-cross text-primary">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    </i> {{ $data->kuantitas }}
                                                </p>
                                                <p class="pt-0 mt-0 text-nowrap">Pemesan: {{ $data->pemesan }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row text-start">
                                            <p class="text-nowrap pt-5 pb-0 mb-0">{{ $data->jenis }}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row text-start">
                                            <p class="text-nowrap pt-5 pb-0 mb-0">Rp. {{ $data->pembayaran }}</p>
                                            <p class="text-nowrap text-muted">
                                                @if($data->pembayaran >= $data->produk->price)
                                                    Lunas
                                                @else
                                                    Belum Lunas
                                                @endif
                                            </p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row text-start">
                                            <p class="text-nowrap pt-5 pb-0 mb-0">{{ $data->created_at->format('Y-m-d') }}</p>
                                            @if($remainingDays !== null)
                                                <p class="text-nowrap text-muted">{{ $remainingDays }} hari lagi</p>
                                            @else
                                                <p class="text-nowrap text-muted">Tanggal selesai belum ditentukan</p>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="text-start">
                                        @if ($data->status == 1)
                                            <p class="pt-0 mt-0">Status: <span class="badge badge-light-danger">Belum diproses</span></p>
                                        @elseif ($data->status == 2)
                                            <p class="pt-0 mt-0">Status: <span class="badge badge-light-info">Dalam Proses</span></p>
                                        @elseif ($data->status == 3)
                                            <p class="pt-0 mt-0">Status: <span class="badge badge-light-success">Selesai</span></p>
                                        @else
                                            Status tidak diketahui
                                        @endif
                                    </td>
                                    <td class="text-end text-nowrap">
                                        <a href="/detail-pesanan/{{ $data->id }}" class="btn btn-outline btn-outline-dark btn-active-light-primary btn-sm">
                                            Detail<i class="ms-2 ki-duotone ki-double-right">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            </i>
                                        </a>
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
