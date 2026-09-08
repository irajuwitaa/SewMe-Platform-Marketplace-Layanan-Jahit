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
                        <li class="breadcrumb-item text-gray-700 fw-bold lh-1 mx-n1">Profile</li>
                        <li class="breadcrumb-item">
                            <i class="ki-outline ki-right fs-7 text-gray-700"></i>
                        </li>
                        <li class="breadcrumb-item text-gray-500 mx-n1"> {{ auth()->user()->name }} </li>
                    </ul>
                    <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-3 m-0">
                        Profile</h1>
                </div>
            </div>
        </div>
        <!--begin::Navbar-->
        <div class="card my-5 mb-xl-1">
            <div class="card-body pt-6 pb-4">
                <div class="d-flex flex-wrap flex-sm-nowrap">
                    <div class="me-7 mb-4">
                        @php
                            $userProfile = getAuthenticatedUserProfile();
                        @endphp
                        @if ($userProfile && $userProfile->avatar)
                            <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                <img src="{{ asset('storage/avatar/' . $profile->avatar) }}" alt="image" />
                                <div
                                    class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px">
                                </div>
                            </div>
                        @else
                            <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                <img src="../assets/media/avatars/blank.png" alt="image" />
                                <div
                                    class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px">
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-2">
                                    <a href="#" class="text-gray-900 fs-2 fw-bold me-1"></a>
                                    <a href="#">
                                        <i class="ki-outline ki-verify fs-1 text-primary"></i>
                                    </a>
                                </div>
                                <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                    <a href="#" class="d-flex align-items-center text-gray-500 me-5 mb-2">
                                        <i
                                            class="ki-outline ki-profile-circle fs-4 me-1"></i>{{ auth()->user()->role->name }}</a>
                                    {{-- <a href="#"
                                        class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                                        <i class="ki-outline ki-geolocation fs-4 me-1"></i>Yogyakarta, Jl. Kenangan</a> --}}
                                    <a href="#" class="d-flex align-items-center text-gray-500 mb-2">
                                        <i class="ki-outline ki-sms fs-4 me-1"></i>{{ auth()->user()->email }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap flex-stack">
                            <div class="d-flex flex-column flex-grow-1 pe-8">
                                <div class="d-flex flex-wrap">

                                    @if ($profile->role_id == 2)
                                        <div
                                            class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <div class="d-flex align-items-center">
                                                <i class="ki-outline ki-arrow-up fs-3 text-success me-2"></i>
                                                <div class="fs-2 fw-bold" data-kt-countup="true"
                                                    data-kt-countup-value="1500000" data-kt-countup-prefix="Rp">0</div>
                                            </div>
                                            <div class="fw-semibold fs-6 text-gray-500">Pendapatan bulan ini</div>
                                        </div>
                                        <div
                                            class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <div class="d-flex align-items-center">
                                                <i class="ki-outline ki-arrow-down fs-3 text-danger me-2"></i>
                                                <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="80">
                                                    0</div>
                                            </div>
                                            <div class="fw-semibold fs-6 text-gray-500">Pesanan dibatalkan</div>
                                        </div>

                                        <div
                                            class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <div class="d-flex align-items-center">
                                                <i class="ki-outline ki-arrow-up fs-3 text-success me-2"></i>
                                                <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="60">
                                                    0</div>
                                            </div>
                                            <div class="fw-semibold fs-6 text-gray-500">Pesanan terselesaikan</div>
                                        </div>
                                    @else
                                        <div
                                            class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <div class="d-flex align-items-center">
                                                <i class="ki-outline ki-arrow-down fs-3 text-danger me-2"></i>
                                                <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="80">
                                                    0</div>
                                            </div>
                                            <div class="fw-semibold fs-6 text-gray-500">Pesanan dibatalkan</div>
                                        </div>

                                        <div
                                            class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <div class="d-flex align-items-center">
                                                <i class="ki-outline ki-arrow-up fs-3 text-success me-2"></i>
                                                <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="60">
                                                    0</div>
                                            </div>
                                            <div class="fw-semibold fs-6 text-gray-500">Pesanan terselesaikan</div>
                                        </div>
                                    @endif

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
                        <h3 class="fw-bold m-0">Detail Profile</h3>
                    </div>
                </div>
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <form action="{{ url('/profile/edit') }}" method="post" enctype="multipart/form-data"
                        id="kt_account_profile_details_form" class="form">
                        @csrf
                        <div class="card-body border-top p-9">
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Profil</label>
                                <div class="col-lg-8">
                                    <div class="image-input image-input-outline" data-kt-image-input="true"
                                        style="background-image: url('assets/media/svg/avatars/blank.svg')">
                                        @if ($userProfile && $userProfile->avatar)
                                            <div class="image-input-wrapper w-125px h-125px"
                                                style="background-image: url('{{ asset('storage/avatar/' . $profile->avatar) }}');">
                                            </div>
                                        @else
                                            <div class="image-input-wrapper w-125px h-125px"
                                                style="background-image: url('../assets/media/avatars/blank.png');"></div>
                                        @endif
                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            title="Change avatar">
                                            <i class="ki-outline ki-pencil fs-7"></i>
                                            <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                            {{-- <input type="hidden" name="avatar" /> --}}
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
                                    <div class="form-text">Jenis file yang diizinkan: png, jpg, jpeg.</div>
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Username</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="name"
                                        class="form-control form-control-lg form-control-solid" placeholder="Company name"
                                        value={{ $profile->name }} />
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                    <span class="required">No. HP</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Phone number must be active">
                                        <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                    </span>
                                </label>
                                <div class="col-lg-8 fv-row">
                                    <input type="tel" name="nohp"
                                        class="form-control form-control-lg form-control-solid" placeholder="Phone number"
                                        value="{{ $profile->nohp }}" />
                                </div>
                            </div>
                            {{-- <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6 required">Email</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="email" name="email"id="email"
                                        class="form-control form-control-lg form-control-solid"
                                        placeholder="Company website" value="{{ $profile->email }}" />
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
            <div class="card mb-5 mb-xl-10">
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                    data-bs-target="#kt_account_profile_details" aria-expanded="true"
                    aria-controls="kt_account_profile_details">
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">Detail Akun</h3>
                    </div>
                </div>
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <form action="" method="post" enctype="multipart/form-data"
                        id="kt_account_profile_details_form" class="form">
                        @csrf
                        <div class="card-body border-top p-9">
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6 required">Email</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="email" name="email"id="email"
                                        class="form-control form-control-lg form-control-solid"
                                        placeholder="Company website" value="{{ $profile->email }}" />
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6 required">Password</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="password"id="password"
                                        class="form-control form-control-lg form-control-solid"
                                        placeholder="Company website" value="*****" />
                                </div>
                            </div>

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
