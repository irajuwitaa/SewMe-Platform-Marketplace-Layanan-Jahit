@extends('template.main')
@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
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
                        Pengaturan Toko</h1>
                </div>
            </div>
        </div>
        <!--begin::Navbar-->
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
                        </div>
                        <div class="d-flex flex-wrap flex-stack">
                            <div class="d-flex flex-column flex-grow-1 pe-8">
                                <div class="d-flex flex-wrap">
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
            </div>
        </div>
        <!--end::Navbar-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div class="card mb-5 mb-xl-10">
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                    data-bs-target="#kt_account_profile_details" aria-expanded="true"
                    aria-controls="kt_account_profile_details">
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">Detail Profil Toko</h3>
                    </div>
                </div>
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <form id="kt_account_profile_details_form" class="form" action="/proses-ubah-toko" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body border-top p-9">
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Profil</label>
                                <div class="col-lg-8">
                                    <div class="image-input image-input-outline" data-kt-image-input="true"
                                        style="background-image: url('{{ asset('storage/' . $toko->gambar_toko) }}')">
                                        <div class="image-input-wrapper w-125px h-125px"
                                            style="background-image: url('{{ asset('storage/' . $toko->gambar_toko) }}')">
                                        </div>
                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            title="Change avatar">
                                            <i class="ki-outline ki-pencil fs-7"></i>
                                            <input type="file" name="gambar_toko" accept=".png, .jpg, .jpeg" />
                                            {{-- <input type="hidden" name="avatar_remove" /> --}}
                                        </label>
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                            title="Cancel avatar">
                                            <i class="ki-outline ki-cross fs-2"></i>
                                        </span>
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                            title="Remove avatar">
                                            <i class="ki-outline ki-cross fs-2"></i>
                                        </span>
                                    </div>
                                    <div class="form-text">Jenis file yang diizinkan: png, jpg, jpeg.
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nama
                                    Toko</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="nama_toko"
                                        class="form-control form-control-lg form-control-solid" placeholder="Nama Toko"
                                        value="{{ $toko->nama_toko }}" />
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                    <span class="required">No. Telepon</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Phone number must be active">
                                        <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                    </span>
                                </label>
                                <div class="col-lg-8 fv-row">
                                    <input type="tel" name="no_telp"
                                        class="form-control form-control-lg form-control-solid" placeholder="No. Telepon"
                                        value="{{ $toko->no_telp }}" />
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Alamat</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="alamat_toko"
                                        class="form-control form-control-lg form-control-solid" placeholder="Alamat"
                                        value="{{ $toko->alamat_toko }}" />
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Link
                                    Google Map Alamat
                                </label>
                                <div class="col-lg-8 fv-row">
                                    <input type="url" name="link_google_map"
                                        class="form-control form-control-lg form-control-solid"
                                        placeholder="Link Google Map Alamat" value="{{ $toko->link_google_map }}" />
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Jam
                                    Kerja</label>
                                <div class="col-lg-8 fv-row">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="kt_td_picker_linked_1_input" class="form-label">Dari</label>
                                            <input class="form-control form-control-solid flatpickr-input"
                                                placeholder="Pilih waktu" id="pick-jamkerja-from" type="text"
                                                readonly="readonly" value="{{ $toko->jam_buka }}" name="jam_buka">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="kt_td_picker_linked_2_input" class="form-label">Hingga</label>
                                            <input class="form-control form-control-solid flatpickr-input"
                                                placeholder="Pilih Waktu" id="pick-jamkerja-to" type="text"
                                                readonly="readonly" value="{{ $toko->jam_tutup }} " name="jam_tutup">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6 required">Email</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="email" name="email"
                                        class="form-control form-control-lg form-control-solid" placeholder="Email"
                                        value="{{ $toko->email }}" />
                                </div>
                            </div> --}}
                            {{-- <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6 required">Password</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="password" name="password"
                                        class="form-control form-control-lg form-control-solid" placeholder="Password"
                                        value="{{ $toko->password }}" />
                                </div>
                            </div> --}}
                        </div>
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="submit" class="btn btn-dark" id="kt_account_profile_details_submit">Simpan
                                Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
