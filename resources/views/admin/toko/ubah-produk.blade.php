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
                        Ubah Detail Produk</h1>
                </div>
            </div>
        </div>

        <!--start content-->
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_content" class="app-content flex-column-fluid">

                <form id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row" enctype="multipart/form-data" action="{{ route('ubah-produk-proses', $uprod->id) }}" method="POST">

                    @csrf
                    @method('PUT')
                    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Thumbnail Produk</h2>
                                </div>
                            </div>
                            <div class="card-body text-center pt-0">
                                <style>
                                    .image-input-placeholder {
                                        background-image: url('{{ asset('storage/uploads/products/thumbnail/' . $uprod->thumbnail) }}');
                                    }

                                    [data-bs-theme="dark"] .image-input-placeholder {
                                        background-image: url('../assets/media/svg/files/blank-image-dark.svg');
                                    }
                                </style>
                                <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                    data-kt-image-input="true">
                                    <div class="image-input-wrapper w-150px h-150px"></div>
                                    <label
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Ubah gambar">
                                        <i class="ki-outline ki-pencil fs-7"></i>
                                        <input type="file" name="thumbnail" accept=".png, .jpg, .jpeg" />
                                        {{-- <input type="hidden" name="avatar_remove" /> --}}
                                    </label>
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                        <i class="ki-outline ki-cross fs-2"></i>
                                    </span>
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                        <i class="ki-outline ki-cross fs-2"></i>
                                    </span>
                                </div>
                                <div class="text-muted fs-7">Hanya menerima file bertipe *.png, *.jpg
                                    dan *.jpeg</div>
                            </div>
                        </div>
                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Status</h2>
                                </div>
                                <div class="card-toolbar">
                                    <div class="rounded-circle bg-dark w-15px h-15px" id="kt_ecommerce_add_product_status">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <select class="form-select mb-2" data-control="select2" data-hide-search="true"
                                    data-placeholder="Select an option" id="kt_ecommerce_add_product_status_select" name="status">
                                    <option></option>
                                    <option value="published" {{ $uprod->status == 'published' ? 'selected' : '' }}>Publik</option>
                                    <option value="unpublished" {{ $uprod->status == 'unpublished' ? 'selected' : '' }}>Tidak dipublik</option>
                                </select>
                                <div class="text-muted fs-7">Atur status produk.</div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <div class="d-flex flex-column gap-7 gap-lg-10">
                            <div class="card card-flush py-4">
                                <div class="card-body">
                                    <div class="mb-10 fv-row">
                                        <label class="required form-label" for="product_name">Nama
                                            Produk</label>
                                        <input type="text" name="product_name"
                                            class="form-control form-control-solid mb-2" placeholder="Nama Produk"
                                            value="{{ $uprod->product_name }}" />
                                        <div class="text-muted fs-7">Nama produk harus unik.</div>
                                    </div>
                                    <div class="mb-10">
                                        <label for="description" class="form-label">Deskripsi</label>
                                        <textarea name="description" class="form-control form-control-solid" data-kt-autosize="true">{{ $uprod->description }}.</textarea>
                                    </div>
                                    <div class="fv-row">
                                        <label class="required form-label" for="price">Harga
                                            Produk</label>
                                        <div class="input-group mb-5">
                                            <span class="input-group-text">Rp</span>
                                            <input id="price" name="price" type="text" class="form-control"
                                                aria-label="Dalam bentuk Rupiah (Rp)" value="{{ $uprod->price }}" />
                                            <span class="input-group-text">,00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-flush py-4">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Foto Produk</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="fv-row mb-2">
                                        <div class="dropzone" id="tambah-foto-produk">
                                            <div class="dz-message needsclick">
                                                <i class="ki-outline ki-file-up text-primary fs-3x"></i>
                                                <div class="ms-4">
                                                    <h3 class="fs-5 fw-bold text-gray-900 mb-1">Unggah
                                                        foto produk di sini.</h3>
                                                    <span class="fs-7 fw-semibold text-gray-500">Unggah
                                                        hingga 10 file</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="cek-detail-produk.html" id="kt_ecommerce_add_product_cancel"
                                class="btn btn-light me-5">Batalkan</a>
                            <button type="submit"  class="btn btn-dark">
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
