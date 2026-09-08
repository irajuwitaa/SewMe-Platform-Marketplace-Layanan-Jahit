@extends('template.main')
@section('content')

<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar pt-7 pt-lg-10">
            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7">
                        <li class="breadcrumb-item text-gray-700 fw-bold lh-1 mx-n1">
                            <a href="index.html" class="text-hover-primary">
                                <i class="ki-outline ki-home text-gray-700 fs-6"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <i class="ki-outline ki-right fs-7 text-gray-700"></i>
                        </li>
                        <li class="breadcrumb-item text-gray-500 mx-n1">Home</li>
                    </ul>
                    <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-3 m-0">Statistik Penjual</h1>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <div class="container-xxl" id="kt_content_container">
                        <div class="row g-5 g-xl-5">
                            <div class="col-xl-4 order-custom">
                                <div class="row mb-5 mb-xl-8 g-5 g-xl-8">
                                    <div class="col-12">
                                        <a class="card d-flex justify-content-start align-items-start text-start w-100 text-gray-800 text-hover-gray-700 p-10" href="#">
                                            <div class="d-flex">
                                                <div class="symbol symbol-50px me-5 mb-8">
                                                    <span class="symbol-label bg-light-info">
                                                        <i class="bi bi-currency-exchange text-dark fs-1"></i>
                                                    </span>
                                                </div>
                                                <div class="d-flex flex-column">
                                                    <span class="fs-4 fw-bold">Total Pendapatan</span>
                                                    <span class="text-muted fw-bold fs-7">pendapatan bulan ini</span>
                                                </div>
                                            </div>
                                            <div class="mb-0">
                                                <div class="d-flex align-items-center mb-2">
                                                    <span class="fs-1 fw-semibold text-gray-700 me-1 mt-n1">Rp.</span>
                                                    <span class="fs-3x fw-bold text-gray-800 me-2 lh-1 ls-n2">190.000</span>
                                                    <span class="badge badge-light-success fs-base">
                                                    <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1">
                                                    </i>Paid</span>
                                                </div>
                                                <span class="fs-6 fw-semibold text-gray-500">Total pendapatan anda</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a class="card text-hover-danger" href="#">
                                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                                <div class="symbol symbol-50px d-flex flex-column align-items-center">
                                                    <span class="symbol-label bg-light-danger mb-4 d-flex align-items-center justify-content-center">
                                                        <i class="bi bi-x-circle-fill text-danger fs-1"></i>
                                                    </span>
                                                    <span class="fs-4 fw-bold text-center">Dibatalkan</span>
                                                </div>
                                                <span class="fs-1 fw-bold text-gray-800 me-2 pt-3 lh-1 ls-n2">190</span>
                                                   <span class="fs-6 fw-semibold text-gray-500">Pesanan</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a class="card text-hover-success" href="#">
                                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                                <div class="symbol symbol-50px d-flex flex-column align-items-center">
                                                    <span class="symbol-label bg-light-success mb-4 d-flex align-items-center justify-content-center">
                                                        <i class="bi bi-check-circle-fill text-success fs-1"></i>
                                                    </span>
                                                    <span class="fs-4 fw-bold text-center">Terselesaikan</span>
                                                </div>
                                                <span class="fs-1 fw-bold text-gray-800 me-2 pt-3 lh-1 ls-n2">2.000</span>
                                                   <span class="fs-6 fw-semibold text-gray-500">Pesanan</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-12">
                                        <a class="card d-flex justify-content-start align-items-start text-start w-100 text-gray-800 text-hover-warning p-10" href="#">
                                            <div class="d-flex">
                                                <div class="symbol symbol-50px me-5 mb-8">
                                                    <span class="symbol-label bg-light-warning">
                                                        <i class="bi bi-file-earmark-bar-graph-fill text-warning fs-1"></i>
                                                    </span>
                                                </div>
                                                <div class="d-flex flex-column">
                                                    <span class="fs-4 fw-bold">Persentase Pemenuhan</span>
                                                    <span class="text-muted fw-bold fs-7">persentase anda</span>
                                                </div>
                                            </div>
                                            <div id="kt_charts_widget_30_chart" class="w-100 h-200px"></div>
                                        </a>
                                    </div>
                                    <div class="col-12">
                                        <a class="card d-flex justify-content-start align-items-start text-start w-100 text-gray-800 text-hover-gray-700 p-10" href="#">
                                            <div class="d-flex">
                                                <div class="symbol symbol-50px me-5 mb-8">
                                                    <span class="symbol-label bg-light-primary">
                                                        <i class="bi bi-bookmark-star-fill fs-1 text-dark"></i>
                                                    </span>
                                                </div>
                                                <div class="d-flex flex-column">
                                                    <span class="fs-4 fw-bold">Rating anda</span>
                                                    <span class="text-muted fw-bold fs-7">rating yang diperoleh</span>
                                                </div>
                                            </div>
                                            <div class="rating">
                                                <input type="radio" id="star5" name="rating" value="5"><label for="star5"></label>
                                                <input type="radio" id="star4" name="rating" value="4"><label for="star4"></label>
                                                <input type="radio" id="star3" name="rating" value="3"><label for="star3"></label>
                                                <input type="radio" id="star2" name="rating" value="2"><label for="star2"></label>
                                                <input type="radio" id="star1" name="rating" value="1"><label for="star1"></label>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8 ps-xl-12">
                                <div class="card bgi-position-y-bottom bgi-position-x-end bgi-no-repeat bgi-size-cover min-h-250px bg-dark mb-5 mb-xl-8 border-0 " style="background-position: 100% 50px;background-size: 500px auto;background-image:url('../assets/media/misc/city.png')" dir="ltr">
                                    <div class="card-body order-custom d-flex flex-column justify-content-center ps-lg-12">
                                        <h3 class="text-white fs-2qx fw-bolder mb-7 lh-base">Selamat Datang di SEWME
                                        <br />Shani Indira Natio</h3>
                                        <div class="m-0">
                                            <a href='#' class="btn btn-light-secondary fw-semibold px-6 py-3" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Tentukan Penjahitmu</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="card card-flush overflow-hidden h-xl-100">
                                        <div class="card-header pt-5">
                                            <h3 class="card-title align-items-start flex-column">
                                                <span class="card-label fw-bold text-gray-900">Pendapatan</span>
                                                <span class="text-gray-500 mt-1 fw-semibold fs-6">Pilih statistik pendapatan anda</span>
                                            </h3>
                                            <div class="card-toolbar">
                                                <div data-kt-daterangepicker="true" data-kt-daterangepicker-opens="left" data-kt-daterangepicker-range="today" class="btn btn-sm btn-light d-flex align-items-center px-4">
                                                    <div class="text-gray-600 fw-bold">Loading date range...</div>
                                                    <i class="ki-duotone ki-calendar-8 text-gray-500 lh-0 fs-2 ms-2 me-0">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                        <span class="path5"></span>
                                                        <span class="path6"></span>
                                                    </i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body d-flex align-items-end p-0">
                                            <div id="kt_charts_widget_36" class="min-h-auto w-100 ps-4 pe-6" style="height: 400px"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
