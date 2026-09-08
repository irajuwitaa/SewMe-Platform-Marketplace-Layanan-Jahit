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
                        <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-3 m-0">
                            Dashboard</h1>
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
                                        <div class="col-6">
                                            <a class="card flex-column justify-content-start align-items-start text-start w-100 text-gray-800 text-hover-primary p-10"
                                                href="account/overview.html">
                                                <div class="symbol symbol-50px me-5 mb-8">
                                                    <span class="symbol-label bg-light-primary">
                                                        <i class="bi bi-scissors text-gray-800 fs-1"></i>
                                                    </span>
                                                </div>
                                                <span class="fs-4 fw-bold">Penjahit</span>
                                            </a>
                                        </div>
                                        <div class="col-6">
                                            <a class="card flex-column justify-content-start align-items-start text-start w-100 text-gray-800 text-hover-primary p-10"
                                                href="account/statements.html">
                                                <div class="symbol symbol-50px me-5 mb-8">
                                                    <span class="symbol-label bg-light-primary">
                                                        <i class="bi bi-scissors text-gray-800 fs-1"></i>
                                                    </span>
                                                </div>
                                                <span class="fs-4 fw-bold">Konveksi</span>
                                            </a>
                                        </div>
                                        <div class="col-6">
                                            <a class="card flex-column justify-content-start align-items-start text-start w-100 text-gray-800 text-hover-primary p-10"
                                                href="account/overview.html">
                                                <div class="symbol symbol-50px me-5 mb-8">
                                                    <span class="symbol-label bg-light-primary">
                                                        <i class="bi bi-basket2-fill text-gray-800 fs-1"></i>
                                                    </span>
                                                </div>
                                                <span class="fs-4 fw-bold">Sewa</span>
                                            </a>
                                        </div>
                                        <div class="col-6">
                                            <a class="card flex-column justify-content-start align-items-start text-start w-100 text-gray-800 text-hover-primary p-10"
                                                href="account/statements.html">
                                                <div class="symbol symbol-50px me-5 mb-8">
                                                    <span class="symbol-label bg-light-primary">
                                                        <i class="bi bi-calendar2-week-fill text-gray-800 fs-1"></i>
                                                    </span>
                                                </div>
                                                <span class="fs-4 fw-bold">Jadwal</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-8 ps-xl-12">
                                    <div class="card bgi-position-y-bottom bgi-position-x-end bgi-no-repeat bgi-size-cover min-h-250px bg-dark mb-5 mb-xl-8 border-0 "
                                        style="background-position: 100% 50px;background-size: 500px auto;background-image:url('../assets/media/misc/city.png')"
                                        dir="ltr">
                                        <div
                                            class="card-body order-custom d-flex flex-column justify-content-center ps-lg-12">
                                            <h3 class="text-white fs-2qx fw-bolder mb-7 lh-base">Selamat Datang di SEWME
                                                <br />{{ $name }}
                                            </h3>
                                            <div class="m-0">
                                                <a href='#' class="btn btn-light-secondary fw-semibold px-6 py-3"
                                                    data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Tentukan
                                                    Penjahitmu</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-5 g-xl-8">
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <a href="#" class="card hoverable card-xl-stretch mb-xl-8"
                                                style="background-color: #272e54;">
                                                <div class="card-body">
                                                    <i class="ki-duotone ki-element-11 text-white fs-3x ms-n1 mb-7">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                    </i>
                                                    <div class="text-white fw-bold fs-2 mb-2 mt-5">Program Pengguna Baru
                                                    </div>
                                                    <div class="fw-semibold text-white">Penawaran spesial untuk pengguna
                                                        baru</div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <a href="#" class="card hoverable card-xl-stretch mb-xl-8"
                                                style="background-color: #272e54;">
                                                <div class="card-body">
                                                    <i class="ki-duotone ki-element-11 text-white fs-3x ms-n1 mb-7">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                    </i>
                                                    <div class="text-white fw-bold fs-2 mb-2 mt-5">Hari Besar Nasional</div>
                                                    <div class="fw-semibold text-white">Rayakan dengan penawaran istimewa
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
