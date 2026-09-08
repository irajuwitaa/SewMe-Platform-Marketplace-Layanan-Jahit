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
                        Ubah Banner Toko</h1>
                </div>
            </div>
        </div>

        <!--start content-->
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_content" class="app-content flex-column-fluid">

                <form method="POST" enctype="multipart/form-data" action="/proses-ubah-banner/{{ $banner->toko_id }}" id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row">
                    @csrf
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <input class="form-control " type="file" name="gambar_banner[]" accept=".png, .jpg, .jpeg" multiple/>
                        <div class="d-flex justify-content-end">
                            <a href="pengaturan-toko.html" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">Batalkan</a>
                            <button type="submit" class="btn btn-dark">
                                <span class="indicator-label">Simpan Perubahan</span>
                                <span class="indicator-progress">Harap tunggu...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
                
                
            </div>
        </div>
        <!--end content-->

        
    @endsection
