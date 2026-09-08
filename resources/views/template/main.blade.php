<!DOCTYPE html>
<html lang="en">

    <head>
        <title>SEWME</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="Frontend by unimasoft.id" />
        <meta name="author" content="Zamah Sari, zamahsari@umm.ac.id" />
        <meta property="og:site_name" content="SEWME" />
        <link rel="canonical" href="http:/{{ '/dashboard-' . strtolower(getUserRole()->name) }}" />
        <link rel="shortcut icon" href="../assets/media/Vector.png" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
        <link href="../assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
        <link href="../assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
        <link href="../assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../assets/css/dasboard-custom.css">
        <style>
            /*some basic styles*/
            .rating {
                font-size: 0;
                display: inline-block
            }

            .rating__button {
                width: 32px;
                height: 32px;
                display: inline-block
            }

            .rating__star {
                width: 100%;
                height: 100%;
                fill: #fff
            }

            /*intial hover state*/
            .rating:hover .rating__star,
            /*preserve state after rating the first time*/
            .rating.has--rating .rating__star {
                fill: #f4a825
            }

            /*intial hover state*/
            .rating__button:hover~.rating__button .rating__star,
            /*preserve state after rating the first time*/
            .rating__button.is--active~.rating__button .rating__star {
                fill: #fff
            }

            /*SUBSEQUENT RATING ATTEMPTS LOGIC*/

            /*
      lightgray signifies that you're giving a lower rating than before.
        we're gonna make lightgray all the stars that the user takes away.
    */
            .rating.has--rating:hover .rating__button:hover~.rating__button .rating__star {
                fill: lightgray
            }

            /*make everything after the current active star orange*/
            .rating.has--rating:hover .rating__button.is--active~.rating__button .rating__star {
                fill: #f4a825
            }

            /*make everything after the currently hovered star white*/
            .rating.has--rating:hover .rating__button:hover~.rating__button.is--active~.rating__button .rating__star,
            .rating.has--rating:hover .rating__button.is--active:hover~.rating__button .rating__star,
            .rating.has--rating:hover .rating__button.is--active~.rating__button:hover~.rating__button .rating__star {
                fill: #fff
            }
        </style>
        <style>
            .setting-button {
                position: absolute;
                top: 10px;
                right: 10px;
                z-index: 10;
            }

            .card {
                position: relative;
            }

            .card-body a {
                display: block;
                text-decoration: none;
                color: inherit;
            }

            .setting-button a {
                text-decoration: none;
                color: inherit;
            }

            .carousel-inner {
                border-radius: 15px;
            }

            .carousel-image {
                width: 100%;
                object-fit: cover;
                margin: 0 auto;
            }

            @media (min-width: 1200px) {
                .carousel-image {
                    max-height: 600px;
                }
            }

            @media (min-width: 800px) and (max-width: 1199px) {
                .carousel-image {
                    max-height: 400px;
                }
            }

            @media (max-width: 799px) {
                .carousel-image {
                    max-height: 300px;
                }
            }

            .foto-produk-toko {
                width: 100%;
                max-height: 180px;
                object-fit: cover;
            }

            #foto-produk {
                width: 100%;
                border-top-left-radius: 12px;
                border-top-right-radius: 12px;
                border-bottom-right-radius: 0;
                border-bottom-left-radius: 0;
            }

            .pagination .page-item.active .page-link {
                background-color: #1E2129;
                border-color: #1E2129;
                color: white;
            }

            .nav-line-tabs .nav-item .nav-link.active {
                border-bottom: 1px solid var(--bs-dark);
            }

            .nav-line-tabs .nav-item .nav-link:not(.active):hover {
                border-bottom: 1px solid var(--bs-dark);
            }
        </style>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @livewireStyles
    </head>

    <body id="kt_app_body" data-kt-app-header-fixed-mobile="true" data-kt-app-sidebar-enabled="true"
        data-kt-app-sidebar-fixed="false" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
        data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
        <script>
            var defaultThemeMode = "light";
            var themeMode;
            if (document.documentElement) {
                if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                    themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
                } else {
                    if (localStorage.getItem("data-bs-theme") !== null) {
                        themeMode = localStorage.getItem("data-bs-theme");
                    } else {
                        themeMode = defaultThemeMode;
                    }
                }
                if (themeMode === "system") {
                    themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
                }
                document.documentElement.setAttribute("data-bs-theme", themeMode);
            }
        </script>
        <!--end::Theme mode setup on page load-->
        <!--begin::App-->
        <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
            <!--begin::Page-->
            <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
                <div id="kt_app_header" class="app-header" data-kt-sticky="true"
                    data-kt-sticky-activate="{default: false, lg: true}" data-kt-sticky-name="app-header-sticky"
                    data-kt-sticky-offset="{default: false, lg: '300px'}">
                    <div class="app-container container-fluid d-flex align-items-stretch justify-content-between"
                        id="kt_app_header_container">
                        <div class="app-header-logo d-flex align-items-center me-lg-9">
                            <a href="{{ route('dashboard-' . strtolower(getUserRole()->name)) }}">
                                <img alt="Logo" src="../assets/media/logo-dark.png"
                                    class="h-40px h-lg-50px mt-1 theme-light-show" />
                                <img alt="Logo" src="../assets/media/logo-white.png"
                                    class="h-40px h-lg-50px theme-dark-show" />
                            </a>
                        </div>
                        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
                            <div class="d-flex align-items-stretch" id="kt_app_header_menu_wrapper">
                            </div>
                            <div class="app-navbar flex-shrink-0">
                                <div class="app-navbar-item ms-1 ms-lg-4">
                                    <a href="/chats" class="btn btn-icon btn-custom w-35px h-35px w-md-40px h-md-40px"
                                        id="kt_activities_toggle">
                                        <i class="ki-duotone ki-message-text fs-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </a>
                                </div>
                                @if (auth()->user()->role_id == 1)
                                    <div class="app-navbar-item ms-1 ms-lg-4">
                                        <div class="btn btn-icon btn-custom w-35px h-35px w-md-40px h-md-40px">
                                            <a href="/keranjang" class="text-decoration-none">
                                                <i class="ki-duotone ki-handcart fs-1 me-2"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                                @php
                                    $userProfile = getAuthenticatedUserProfile();
                                @endphp
                                <div class="app-navbar-item ms-1 ms-lg-4" id="kt_header_user_menu_toggle">
                                    @if ($userProfile && $userProfile->avatar)
                                        <div class="cursor-pointer symbol symbol-35px symbol-md-40px"
                                            data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                            data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                            <img class="symbol symbol-35px symbol-md-40px"
                                                src="{{ asset('storage/avatar/' . getAuthenticatedUserProfile()->avatar) }}"
                                                alt="user" />
                                        </div>
                                    @else
                                        <div class="cursor-pointer symbol symbol-35px symbol-md-40px"
                                            data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                            data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                            <img class="symbol symbol-35px symbol-md-40px"
                                                src="../assets/media/avatars/blank.png" alt="user" />
                                        </div>
                                    @endif
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                                        data-kt-menu="true">
                                        <div class="menu-item px-3">
                                            <div class="menu-content d-flex align-items-center px-3">
                                                @if ($userProfile && $userProfile->avatar)
                                                    <div class="symbol symbol-50px me-5">
                                                        <img alt="Logo"
                                                            src="{{ asset('storage/avatar/' . getAuthenticatedUserProfile()->avatar) }}" />
                                                    </div>
                                                @else
                                                    <div class="symbol symbol-50px me-5">
                                                        <img alt="Logo" src="../assets/media/avatars/blank.png" />
                                                    </div>
                                                @endif
                                                <div class="d-flex flex-column">
                                                    <div class="fw-bold d-flex align-items-center fs-5">
                                                        {{ auth()->user()->name }}
                                                        @if (auth()->user()->role_id == 2)
                                                            <span
                                                                class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Admin</span>
                                                        @else
                                                            <span
                                                                class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">user</span>
                                                        @endif
                                                    </div>
                                                    <a
                                                        class="fw-semibold text-muted fs-7">{{ auth()->user()->email }}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="separator my-2"></div>
                                        <div class="menu-item px-5">
                                            <a href="/profile" class="menu-link px-5">Profil Saya</a>
                                        </div>
                                        <div class="separator my-2"></div>
                                        <div class="menu-item px-5"
                                            data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                            data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
                                            <a href="#" class="menu-link px-5">
                                                <span class="menu-title position-relative">Mode
                                                    <span
                                                        class="ms-5 position-absolute translate-middle-y top-50 end-0">
                                                        <i class="ki-outline ki-night-day theme-light-show fs-2"></i>
                                                        <i class="ki-outline ki-moon theme-dark-show fs-2"></i>
                                                    </span>
                                                </span>
                                            </a>
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px"
                                                data-kt-menu="true" data-kt-element="theme-mode-menu">
                                                <div class="menu-item px-3 my-0">
                                                    <a href="#" class="menu-link px-3 py-2"
                                                        data-kt-element="mode" data-kt-value="light">
                                                        <span class="menu-icon" data-kt-element="icon">
                                                            <i class="ki-outline ki-night-day fs-2"></i>
                                                        </span>
                                                        <span class="menu-title">Light</span>
                                                    </a>
                                                </div>
                                                <div class="menu-item px-3 my-0">
                                                    <a href="#" class="menu-link px-3 py-2"
                                                        data-kt-element="mode" data-kt-value="dark">
                                                        <span class="menu-icon" data-kt-element="icon">
                                                            <i class="ki-outline ki-moon fs-2"></i>
                                                        </span>
                                                        <span class="menu-title">Dark</span>
                                                    </a>
                                                </div>
                                                <div class="menu-item px-3 my-0">
                                                    <a href="#" class="menu-link px-3 py-2"
                                                        data-kt-element="mode" data-kt-value="system">
                                                        <span class="menu-icon" data-kt-element="icon">
                                                            <i class="ki-outline ki-screen fs-2"></i>
                                                        </span>
                                                        <span class="menu-title">System</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="menu-item px-5">
                                            <a href="/logout" class="menu-link px-5" id="logout-link-2">Keluar</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="app-navbar-item d-flex align-items-center d-lg-none ms-1 me-n2">
                                    <a href="#"
                                        class="btn btn-icon btn-color-gray-500 btn-active-color-primary w-35px h-35px"
                                        id="kt_app_sidebar_mobile_toggle">
                                        <i class="ki-outline ki-abstract-14 fs-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @include('partials.header-' . getUserRole()->name)

                @yield('content')

                @include('partials.footer')


                <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
                    <i class="ki-outline ki-arrow-up"></i>
                </div>

                <!--modal-->
                <div class="modal fade" tabindex="-1" id="modalKomentar">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">

                            <form id="kt_docs_formvalidation" class="form" action="#" autocomplete="off">
                                <div class="modal-body">
                                    <div class="row mb-3 px-5">
                                        <div class="d-flex align-items-center ms-0 ps-0">
                                            @if ($userProfile && $userProfile->avatar)
                                                <div
                                                    class="cursor-pointer symbol symbol-35px symbol-md-40px me-5 ms-0 ps-0">
                                                    <img class="symbol symbol-35px symbol-md-40px"
                                                        src="{{ asset('storage/avatar/' . getAuthenticatedUserProfile()->avatar) }}"
                                                        alt="user" />
                                                </div>
                                            @else
                                                <div
                                                    class="cursor-pointer symbol symbol-35px symbol-md-40px me-5 ms-0 ps-0">
                                                    <img class="symbol symbol-35px symbol-md-40px"
                                                        src="../assets/media/avatars/blank.png" alt="user" />
                                                </div>
                                            @endif
                                            <label for="komentar" class="fs-4">olineemauel@gmail.com</label>
                                        </div>
                                        <textarea class="form-control mt-4" disabled name="komentar" data-kt-autosize="false" style="resize: none;"></textarea>
                                    </div>
                                </div>
                                <hr>
                                <div class="modal-body">
                                    <div class="row mb-3 px-5">
                                        <label for="balas-komentar" class="form-label">Balas Komentar</label>
                                        <textarea class="form-control form-control-solid" data-kt-autosize="true" name="balas-komentar"></textarea>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button type="button" class="btn btn-secondary mt-5 "
                                            data-bs-dismiss="modal">Tutup</button>
                                        <button id="kt_docs_formvalidation_submit" type="submit"
                                            class="btn btn-dark mt-5 ">
                                            <span class="indicator-label">
                                                Balas Komentar
                                            </span>
                                            <span class="indicator-progress">
                                                Harap menunggu... <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body position-relative" id="kt_activities_body">
                                    <div id="kt_activities_scroll" class="position-relative scroll-y me-n5 pe-5"
                                        data-kt-scroll="true" data-kt-scroll-height="auto"
                                        data-kt-scroll-wrappers="#kt_activities_body"
                                        data-kt-scroll-dependencies="#kt_activities_header, #kt_activities_footer"
                                        data-kt-scroll-offset="5px">
                                    </div>
                                </div>
                        </div>
                    </div>


                    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
                        <i class="ki-outline ki-arrow-up"></i>
                    </div>

                    <!--modal-->
                    <div class="modal fade" tabindex="-1" id="modalKomentar">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">

                                <form id="kt_docs_formvalidation" class="form" action="#" autocomplete="off">
                                    <div class="modal-body">
                                        <div class="row mb-3 px-5">
                                            <div class="d-flex align-items-center ms-0 ps-0">
                                                <div
                                                    class="cursor-pointer symbol symbol-35px symbol-md-40px me-5 ms-0 ps-0">
                                                    <img class="symbol symbol-35px symbol-md-40px"
                                                        src="../assets/media/avatars/blank.png" alt="user" />
                                                </div>
                                                <label for="komentar" class="fs-4">olineemauel@gmail.com</label>
                                            </div>
                                            <textarea class="form-control mt-4" disabled name="komentar" data-kt-autosize="false" style="resize: none;"></textarea>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="modal-body">
                                        <div class="row mb-3 px-5">
                                            <label for="balas-komentar" class="form-label">Balas Komentar</label>
                                            <textarea class="form-control form-control-solid" data-kt-autosize="true" name="balas-komentar"></textarea>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <button type="button" class="btn btn-secondary mt-5 "
                                                data-bs-dismiss="modal">Tutup</button>
                                            <button id="kt_docs_formvalidation_submit" type="submit"
                                                class="btn btn-dark mt-5 ">
                                                <span class="indicator-label">
                                                    Balas Komentar
                                                </span>
                                                <span class="indicator-progress">
                                                    Harap menunggu... <span
                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--modal end-->

                    <div class="modal fade" tabindex="-1" id="kt_modal_1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title">Modal title</h3>

                                    <!--begin::Close-->
                                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                                        data-bs-dismiss="modal" aria-label="Close">
                                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                                class="path2"></span></i>
                                    </div>
                                    <!--end::Close-->
                                </div>

                                <div class="modal-body">
                                    <div class="card card-border mb-lg-10">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>Ukuran Custom</h2>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row mb-4">
                                                <div class="col-md-6">
                                                    <label class="form-label" for="lingkardada">Lingkar Dada</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control form-control-solid"
                                                            placeholder="Lingkar Dada" aria-label="Lingkar Dada"
                                                            name="lingkardada" aria-describedby="basic-addon2"
                                                            value="" />
                                                        <span class="input-group-text border-0"
                                                            id="basic-addon2">cm</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label" for="lebarbahu">Lebar Bahu</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control form-control-solid"
                                                            placeholder="Lebar Bahu" aria-label="Lebar Bahu"
                                                            name="lebarbahu" aria-describedby="basic-addon2"
                                                            value="" />
                                                        <span class="input-group-text border-0"
                                                            id="basic-addon2">cm</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-md-6">
                                                    <label class="form-label" for="lingkarpinggang">Lingkar
                                                        Pinggang</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control form-control-solid"
                                                            placeholder="Lingkar Pinggang"
                                                            aria-label="Lingkar Pinggang" name="lingkarpinggang"
                                                            aria-describedby="basic-addon2" value="" />
                                                        <span class="input-group-text border-0"
                                                            id="basic-addon2">cm</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label" for="lingkarpinggul">Lingkar
                                                        Pinggul</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control form-control-solid"
                                                            placeholder="Lingkar Pinggul" aria-label="Lingkar Pinggul"
                                                            name="lingkarpinggul" aria-describedby="basic-addon2"
                                                            value="" />
                                                        <span class="input-group-text border-0"
                                                            id="basic-addon2">cm</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-md-6">
                                                    <label class="form-label" for="panjangbaju">Panjang Baju</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control form-control-solid"
                                                            placeholder="Panjang Baju" aria-label="Panjang Baju"
                                                            name="panjangbaju" aria-describedby="basic-addon2"
                                                            value="" />
                                                        <span class="input-group-text border-0"
                                                            id="basic-addon2">cm</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label" for="panjanglengan">Panjang
                                                        Lengan</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control form-control-solid"
                                                            placeholder="Panjang Lengan" aria-label="Panjang Lengan"
                                                            name="panjanglengan" aria-describedby="basic-addon2"
                                                            value="" />
                                                        <span class="input-group-text border-0"
                                                            id="basic-addon2">cm</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-md-6">
                                                    <label class="form-label" for="lingkarlengan">Lingkar
                                                        Lengan</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control form-control-solid"
                                                            placeholder="Lingkar Lengan" aria-label="Lingkar Lengan"
                                                            name="lingkarlengan" aria-describedby="basic-addon2"
                                                            value="" />
                                                        <span class="input-group-text border-0"
                                                            id="basic-addon2">cm</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label" for="lingkarinseam">Lingkar
                                                        Inseam</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control form-control-solid"
                                                            placeholder="Lingkar Inseam" aria-label="Lingkar Inseam"
                                                            name="lingkarinseam" aria-describedby="basic-addon2"
                                                            value="" />
                                                        <span class="input-group-text border-0"
                                                            id="basic-addon2">cm</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-md-6">
                                                    <label class="form-label" for="panjangcelana">Panjang
                                                        Celana</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control form-control-solid"
                                                            placeholder="Panjang Celana" aria-label="Panjang Celana"
                                                            name="panjangcelana" aria-describedby="basic-addon2"
                                                            value="" />
                                                        <span class="input-group-text border-0"
                                                            id="basic-addon2">cm</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label" for="lingkarpergelangan">Lingkar
                                                        Pergelangan
                                                        Tangan</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control form-control-solid"
                                                            placeholder="Lingkar Pergelangan Tangan"
                                                            aria-label="Lingkar Pergelangan Tangan"
                                                            name="lingkarpergelangan" aria-describedby="basic-addon2"
                                                            value="" />
                                                        <span class="input-group-text border-0"
                                                            id="basic-addon2">cm</span>
                                                    </div>
                                                    <span class="text-muted pt-5">Untuk lengan panjang.</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light"
                                        data-bs-dismiss="modal">Keluar</button>
                                    <button type="button" class="btn btn-dark">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--begin::Javascript-->
                    <script>
                        var hostUrl = "assets/";
                    </script>
                    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
                    <script src="../assets/plugins/global/plugins.bundle.js"></script>
                    <script src="../assets/js/scripts.bundle.js"></script>
                    <!--end::Global Javascript Bundle-->
                    <!--begin::Vendors Javascript(used for this page only)-->
                    <script src="../assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
                    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
                    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
                    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
                    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
                    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
                    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
                    <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
                    <script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
                    <script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
                    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
                    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
                    <script src="../assets/plugins/custom/datatables/datatables.bundle.js"></script>
                    <!--end::Vendors Javascript-->
                    <!--begin::Custom Javascript(used for this page only)-->
                    <script src="../assets/js/widgets.bundle.js"></script>
                    <script src="../assets/js/custom/widgets.js"></script>
                    <script src="../assets/js/custom/utilities/modals/upgrade-plan.js"></script>
                    <script src="../assets/js/custom/utilities/modals/create-app.js"></script>
                    <script src="../assets/js/custom/utilities/modals/create-project/type.js"></script>
                    <script src="../assets/js/custom/utilities/modals/create-project/budget.js"></script>
                    <script src="../assets/js/custom/utilities/modals/create-project/settings.js"></script>
                    <script src="../assets/js/custom/utilities/modals/create-project/team.js"></script>
                    <script src="../assets/js/custom/utilities/modals/create-project/targets.js"></script>
                    <script src="../assets/js/custom/utilities/modals/create-project/files.js"></script>
                    <script src="../assets/js/custom/utilities/modals/create-project/complete.js"></script>
                    <script src="../assets/js/custom/utilities/modals/create-project/main.js"></script>
                    <script src="../assets/js/custom/utilities/modals/users-search.js"></script>
                    <script src="../assets/js/sign-out.js"></script>

                    <!--custom js-->
                    <script src="../assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script>

                    <script>
                        const glightbox = GLightbox({
                            selector: '.glightbox'
                        });

                        "use strict";

                        document.addEventListener("DOMContentLoaded", function() {
                            var btnAddToKeranjang = document.querySelector("#btn-addto-keranjang");

                            if (btnAddToKeranjang) {
                                btnAddToKeranjang.addEventListener("click", function(event) {
                                    event.preventDefault();

                                    btnAddToKeranjang.querySelector(".indicator-label").style.display = "none";
                                    btnAddToKeranjang.querySelector(".indicator-progress").style.display = "inline-block";

                                    setTimeout(function() {
                                        btnAddToKeranjang.querySelector(".indicator-label").style.display =
                                            "inline-block";
                                        btnAddToKeranjang.querySelector(".indicator-progress").style.display =
                                            "none";

                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Berhasil!',
                                            text: 'Barang sudah ditambahkan ke keranjang.',
                                            showConfirmButton: false, // Hapus tombol OK
                                            timer: 1000, // Tutup popup setelah 1 detik
                                            customClass: {
                                                confirmButton: 'btn btn-dark'
                                            },
                                            buttonsStyling: false
                                        });
                                    }, 2000);
                                });
                            }

                            var btnDelete = document.querySelector("#btn-delete");

                            if (btnDelete) {
                                btnDelete.addEventListener("click", function(event) {
                                    event.preventDefault();

                                    Swal.fire({
                                        icon: 'warning',
                                        title: 'Konfirmasi',
                                        text: 'Apakah Anda yakin ingin menghapus?',
                                        showCancelButton: true,
                                        confirmButtonText: 'Ya',
                                        cancelButtonText: 'Tidak',
                                        customClass: {
                                            confirmButton: 'btn btn-dark me-2',
                                            cancelButton: 'btn btn-secondary'
                                        },
                                        buttonsStyling: false
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Berhasil!',
                                                text: 'Barang telah dihapus dari keranjang.',
                                                showConfirmButton: false,
                                                timer: 1000,
                                                customClass: {
                                                    confirmButton: 'btn btn-dark'
                                                },
                                                buttonsStyling: false
                                            });
                                        }
                                    });
                                });
                            }
                        });

                        $(document).ready(function() {
                            $('#button-minus').click(function() {
                                let quantity = parseInt($('#quantity-input').val());
                                if (quantity > 1) {
                                    $('#quantity-input').val(quantity - 1);
                                }
                            });
                            $('#button-plus').click(function() {
                                let quantity = parseInt($('#quantity-input').val());
                                $('#quantity-input').val(quantity + 1);
                            });
                        });
                    </script>

                    <script>
                        let rating = document.getElementsByName('rating');

                        for (let i = 0; i < rating.length; i++) {
                            rating[i].disabled = true; // Disable input radio
                            rating[i].addEventListener('change', function() {
                                console.log('Rating:', this.value);
                            });
                        }
                    </script>

                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            let formValidation;

                            const form = document.getElementById("kt_ecommerce_add_product_form");
                            const submitButton = document.getElementById("kt_ecommerce_add_product_submit");

                            formValidation = FormValidation.formValidation(form, {
                                fields: {
                                    product_name: {
                                        validators: {
                                            notEmpty: {
                                                message: "Product name is required"
                                            },
                                        },
                                    },
                                    price: {
                                        validators: {
                                            notEmpty: {
                                                message: "Product base price is required"
                                            },
                                        },
                                    },
                                },
                                plugins: {
                                    trigger: new FormValidation.plugins.Trigger(),
                                    bootstrap: new FormValidation.plugins.Bootstrap5({
                                        rowSelector: ".fv-row",
                                        eleInvalidClass: "",
                                        eleValidClass: "",
                                    }),
                                },
                            });

                            submitButton.addEventListener("click", function(event) {
                                event.preventDefault();

                                if (formValidation) {
                                    formValidation.validate().then(function(status) {
                                        console.log("Form validated!");

                                        if (status === "Valid") {
                                            submitButton.setAttribute("data-kt-indicator", "on");
                                            submitButton.disabled = true;

                                            setTimeout(function() {
                                                submitButton.removeAttribute("data-kt-indicator");
                                                Swal.fire({
                                                    text: "Formulir telah berhasil dikirim!",
                                                    icon: "success",
                                                    buttonsStyling: false,
                                                    confirmButtonText: "OK mengerti!",
                                                    customClass: {
                                                        confirmButton: "btn btn-dark",
                                                    },
                                                }).then(function(result) {
                                                    if (result.isConfirmed) {
                                                        submitButton.disabled = false;
                                                        window.location = form.getAttribute(
                                                            "data-kt-redirect");
                                                    }
                                                });
                                            }, 2000);
                                        } else {
                                            Swal.fire({
                                                html: "Maaf, sepertinya ada beberapa kesalahan yang terdeteksi, silakan coba lagi.",
                                                icon: "error",
                                                buttonsStyling: false,
                                                confirmButtonText: "OK mengerti!",
                                                customClass: {
                                                    confirmButton: "btn btn-dark",
                                                },
                                            });
                                        }
                                    });
                                }
                            });
                        });
                    </script>

                    <!-- js input harga	-->
                    <script>
                        // 	document.getElementById('price').addEventListener('input', function (e) {
                        // 		let value = e.target.value.replace(/\D/g, '');
                        // 		e.target.value = formatRupiah(value);
                        // 	});

                        // 	function formatRupiah(angka) {
                        // 		let reverse = angka.toString().split('').reverse().join(''),
                        // 			ribuan = reverse.match(/\d{1,3}/g);
                        // 		return ribuan.join('.').split('').reverse().join('');
                        // 	}
                        //
                    </script>

                    <script>
                        $("#pick-jamkerja-from").flatpickr({
                            enableTime: true,
                            noCalendar: true,
                            dateFormat: "H:i",
                            time_24hr: true,
                        });
                        $("#pick-jamkerja-to").flatpickr({
                            enableTime: true,
                            noCalendar: true,
                            dateFormat: "H:i",
                            time_24hr: true,
                        });
                    </script>
                    <script>
                        $(function() {
                            $('.rating__button').on('click', function(e) {
                                var $t = $(this), // the clicked star
                                    $ct = $t.parent(); // the stars container

                                // add .is--active to the user selected star
                                $t.siblings().removeClass('is--active').end().toggleClass('is--active');
                                // add .has--rating to the rating container, if there's a star selected. remove it if there's no star selected.
                                $ct.find('.rating__button.is--active').length ? $ct.addClass('has--rating') : $ct
                                    .removeClass('has--rating');
                            });

                        });
                    </script>
                    <script>
                        document.getElementById('product_images').addEventListener('change', function(e) {
                            const maxFiles = 10; // Set the maximum number of files allowed
                            const files = e.target.files;

                            if (files.length > maxFiles) {
                                alert(`Anda hanya dapat mengunggah maksimal ${maxFiles} file.`);
                                e.target.value = ''; // Clear the input
                            }
                        });
                        new Dropzone("#banner-toko", {
                            url: "https://keenthemes.com/scripts/void.php",
                            paramName: "file",
                            maxFiles: 5,
                            maxFilesize: 5,
                            addRemoveLinks: true,
                            accept: function(file, done) {
                                if (file.name === "wow.jpg") {
                                    done("Naha, you don't.");
                                } else {
                                    done();
                                }
                            },
                            init: function() {
                                var myDropzone = this;

                                myDropzone.on("addedfile", function(file) {
                                    if (myDropzone.files.length > 5) {
                                        myDropzone.removeFile(file);
                                        alert("Anda hanya dapat mengunggah maksimal 5 file.");
                                    }
                                });
                            }
                        });

                        document.addEventListener("DOMContentLoaded", function() {
                            let formValidation;

                            const form = document.getElementById("kt_ecommerce_add_product_form");
                            const submitButton = document.getElementById("kt_ecommerce_add_product_submit");

                            formValidation = FormValidation.formValidation(form, {

                                plugins: {
                                    trigger: new FormValidation.plugins.Trigger(),
                                    bootstrap: new FormValidation.plugins.Bootstrap5({
                                        rowSelector: ".fv-row",
                                        eleInvalidClass: "",
                                        eleValidClass: "",
                                    }),
                                },
                            });

                            submitButton.addEventListener("click", function(event) {
                                event.preventDefault();

                                if (formValidation) {
                                    formValidation.validate().then(function(status) {
                                        console.log("Form validated!");

                                        if (status === "Valid") {
                                            submitButton.setAttribute("data-kt-indicator", "on");
                                            submitButton.disabled = true;

                                            setTimeout(function() {
                                                submitButton.removeAttribute("data-kt-indicator");
                                                Swal.fire({
                                                    text: "Formulir telah berhasil dikirim!",
                                                    icon: "success",
                                                    buttonsStyling: false,
                                                    confirmButtonText: "OK mengerti!",
                                                    customClass: {
                                                        confirmButton: "btn btn-dark",
                                                    },
                                                }).then(function(result) {
                                                    if (result.isConfirmed) {
                                                        submitButton.disabled = false;
                                                        window.location = form.getAttribute(
                                                            "data-kt-redirect");
                                                    }
                                                });
                                            }, 2000);
                                        } else {
                                            Swal.fire({
                                                html: "Maaf, sepertinya ada beberapa kesalahan yang terdeteksi, silakan coba lagi.",
                                                icon: "error",
                                                buttonsStyling: false,
                                                confirmButtonText: "OK mengerti!",
                                                customClass: {
                                                    confirmButton: "btn btn-dark",
                                                },
                                            });
                                        }
                                    });
                                }
                            });
                        });
                    </script>

                    <script>
                        const glightbox = GLightbox({
                            selector: '.glightbox'
                        });

                        "use strict";

                        document.addEventListener("DOMContentLoaded", function() {
                            var btnAddToKeranjang = document.querySelector("#btn-addto-keranjang");

                            if (btnAddToKeranjang) {
                                btnAddToKeranjang.addEventListener("click", function(event) {
                                    event.preventDefault();

                                    btnAddToKeranjang.querySelector(".indicator-label").style.display = "none";
                                    btnAddToKeranjang.querySelector(".indicator-progress").style.display = "inline-block";

                                    setTimeout(function() {
                                        btnAddToKeranjang.querySelector(".indicator-label").style.display =
                                            "inline-block";
                                        btnAddToKeranjang.querySelector(".indicator-progress").style.display =
                                            "none";

                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Berhasil!',
                                            text: 'Barang sudah ditambahkan ke keranjang.',
                                            confirmButtonText: 'OK',
                                            customClass: {
                                                confirmButton: 'btn btn-dark'
                                            },
                                            buttonsStyling: false
                                        });
                                    }, 2000);
                                });
                            }
                        });

                        $(document).ready(function() {
                            $('#button-minus').click(function() {
                                let quantity = parseInt($('#quantity-input').val());
                                if (quantity > 1) {
                                    $('#quantity-input').val(quantity - 1);
                                }
                            });
                            $('#button-plus').click(function() {
                                let quantity = parseInt($('#quantity-input').val());
                                $('#quantity-input').val(quantity + 1);
                            });
                        });
                    </script>

                    <script>
                        new Dropzone("#tambah-foto-produk", {
                            url: "https://keenthemes.com/scripts/void.php",
                            paramName: "file",
                            maxFiles: 10,
                            maxFilesize: 10,
                            addRemoveLinks: true,
                            accept: function(file, done) {
                                if (file.name === "wow.jpg") {
                                    done("Naha, you don't.");
                                } else {
                                    done();
                                }
                            },
                            init: function() {
                                var myDropzone = this;

                                myDropzone.on("addedfile", function(file) {
                                    if (myDropzone.files.length > 10) {
                                        myDropzone.removeFile(file);
                                        alert("Anda hanya dapat mengunggah maksimal 10 file.");
                                    }
                                });
                            }
                        });

                        document.addEventListener("DOMContentLoaded", function() {
                            let formValidation;

                            const form = document.getElementById("kt_ecommerce_add_product_form");
                            const submitButton = document.getElementById("kt_ecommerce_add_product_submit");

                            formValidation = FormValidation.formValidation(form, {
                                fields: {
                                    product_name: {
                                        validators: {
                                            notEmpty: {
                                                message: "Product name is required"
                                            },
                                        },
                                    },
                                    price: {
                                        validators: {
                                            notEmpty: {
                                                message: "Product base price is required"
                                            },
                                        },
                                    },
                                },
                                plugins: {
                                    trigger: new FormValidation.plugins.Trigger(),
                                    bootstrap: new FormValidation.plugins.Bootstrap5({
                                        rowSelector: ".fv-row",
                                        eleInvalidClass: "",
                                        eleValidClass: "",
                                    }),
                                },
                            });

                            submitButton.addEventListener("click", function(event) {
                                event.preventDefault();

                                if (formValidation) {
                                    formValidation.validate().then(function(status) {
                                        console.log("Form validated!");

                                        if (status === "Valid") {
                                            submitButton.setAttribute("data-kt-indicator", "on");
                                            submitButton.disabled = true;

                                            setTimeout(function() {
                                                submitButton.removeAttribute("data-kt-indicator");
                                                Swal.fire({
                                                    text: "Formulir telah berhasil dikirim!",
                                                    icon: "success",
                                                    buttonsStyling: false,
                                                    confirmButtonText: "OK mengerti!",
                                                    customClass: {
                                                        confirmButton: "btn btn-dark",
                                                    },
                                                }).then(function(result) {
                                                    if (result.isConfirmed) {
                                                        submitButton.disabled = false;
                                                        window.location = form.getAttribute(
                                                            "data-kt-redirect");
                                                    }
                                                });
                                            }, 2000);
                                        } else {
                                            Swal.fire({
                                                html: "Maaf, sepertinya ada beberapa kesalahan yang terdeteksi, silakan coba lagi.",
                                                icon: "error",
                                                buttonsStyling: false,
                                                confirmButtonText: "OK mengerti!",
                                                customClass: {
                                                    confirmButton: "btn btn-dark",
                                                },
                                            });
                                        }
                                    });
                                }
                            });
                        });
                    </script>

                    <!-- js input harga	-->
                    <script>
                        // document.getElementById('price').addEventListener('input', function(e) {
                        //     let value = e.target.value.replace(/\D/g, '');
                        //     e.target.value = formatRupiah(value);
                        // });

                        // function formatRupiah(angka) {
                        //     let reverse = angka.toString().split('').reverse().join(''),
                        //         ribuan = reverse.match(/\d{1,3}/g);
                        //     return ribuan.join('.').split('').reverse().join('');
                        // }
                    </script>

                    <script>
                        new Dropzone("#kt_ecommerce_add_product_media", {
                            url: "{{ route('tambahprodukproses') }}",
                            paramName: "product_images[]",
                            maxFiles: 10,
                            maxFilesize: 10,
                            addRemoveLinks: true,
                            accept: function(file, done) {
                                if (file.name === "wow.jpg") {
                                    done("Naha, you don't.");
                                } else {
                                    done();
                                }
                            },
                            init: function() {
                                var myDropzone = this;

                                myDropzone.on("addedfile", function(file) {
                                    if (myDropzone.files.length > 10) {
                                        myDropzone.removeFile(file);
                                        alert("Anda hanya dapat mengunggah maksimal 10 file.");
                                    }
                                });
                            }
                        });

                        document.addEventListener("DOMContentLoaded", function() {
                            let formValidation;

                            const form = document.getElementById("kt_ecommerce_add_product_form");
                            const submitButton = document.getElementById("kt_ecommerce_add_product_submit");

                            formValidation = FormValidation.formValidation(form, {
                                fields: {
                                    product_name: {
                                        validators: {
                                            notEmpty: {
                                                message: "Product name is required"
                                            },
                                        },
                                    },
                                    price: {
                                        validators: {
                                            notEmpty: {
                                                message: "Product base price is required"
                                            },
                                        },
                                    },
                                },
                                plugins: {
                                    trigger: new FormValidation.plugins.Trigger(),
                                    bootstrap: new FormValidation.plugins.Bootstrap5({
                                        rowSelector: ".fv-row",
                                        eleInvalidClass: "",
                                        eleValidClass: "",
                                    }),
                                },
                            });

                            submitButton.addEventListener("click", function(event) {
                                event.preventDefault();

                                if (formValidation) {
                                    formValidation.validate().then(function(status) {
                                        console.log("Form validated!");

                                        if (status === "Valid") {
                                            submitButton.setAttribute("data-kt-indicator", "on");
                                            submitButton.disabled = true;

                                            setTimeout(function() {
                                                submitButton.removeAttribute("data-kt-indicator");
                                                Swal.fire({
                                                    text: "Formulir telah berhasil dikirim!",
                                                    icon: "success",
                                                    buttonsStyling: false,
                                                    confirmButtonText: "OK mengerti!",
                                                    customClass: {
                                                        confirmButton: "btn btn-dark",
                                                    },
                                                }).then(function(result) {
                                                    if (result.isConfirmed) {
                                                        submitButton.disabled = false;
                                                        window.location = form.getAttribute(
                                                            "data-kt-redirect");
                                                    }
                                                });
                                            }, 2000);
                                        } else {
                                            Swal.fire({
                                                html: "Maaf, sepertinya ada beberapa kesalahan yang terdeteksi, silakan coba lagi.",
                                                icon: "error",
                                                buttonsStyling: false,
                                                confirmButtonText: "OK mengerti!",
                                                customClass: {
                                                    confirmButton: "btn btn-dark",
                                                },
                                            });
                                        }
                                    });
                                }
                            });
                        });
                    </script>

                    <!-- js input harga	-->
                    <script>
                        // document.getElementById('price').addEventListener('input', function(e) {
                        //     let value = e.target.value.replace(/\D/g, '');
                        //     e.target.value = formatRupiah(value);
                        // });

                        // function formatRupiah(angka) {
                        //     let reverse = angka.toString().split('').reverse().join(''),
                        //         ribuan = reverse.match(/\d{1,3}/g);
                        //     return ribuan.join('.').split('').reverse().join('');
                        // }
                    </script>

                    <script>
                        "use strict";

                        var KTAppEcommerceReportSales = function() {
                            var dataTable;

                            return {
                                init: function() {
                                    // Initialize DataTable
                                    (dataTable = document.querySelector("#table")) && (dataTable.querySelectorAll("tbody tr")
                                        .forEach((row => {
                                            const cells = row.querySelectorAll("td");
                                            const dateValue = moment(cells[0].innerHTML, "MMM DD, YYYY").format();
                                            cells[0].setAttribute("data-order", dateValue);
                                        })), dataTable = $(dataTable).DataTable({
                                            info: !1,
                                            order: [],
                                            pageLength: 10,
                                            scrollX: true,
                                            scrollCollapse: true,
                                        }));

                                    // Add event listener for search input
                                    document.querySelector('[table-search="search"]').addEventListener("keyup", (function(event) {
                                        dataTable.search(event.target.value).draw();
                                    }));
                                }
                            }
                        }();

                        KTUtil.onDOMContentLoaded((function() {
                            KTAppEcommerceReportSales.init();
                        }));
                    </script>


                    <script>
                        Dropzone.autoDiscover = false;

                        document.addEventListener("DOMContentLoaded", function() {
                            const myDropzone = new Dropzone("#banner-toko", {
                                url: "", // Pastikan URL benar
                                paramName: "file",
                                maxFiles: 5,
                                maxFilesize: 5, // in MB
                                addRemoveLinks: true,
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                        'content')
                                },
                                init: function() {
                                    this.on("sending", function(file, xhr, formData) {
                                        // Append all form inputs to the FormData object
                                        document.querySelectorAll(
                                            "#kt_ecommerce_add_product_form input, #kt_ecommerce_add_product_form select, #kt_ecommerce_add_product_form textarea"
                                        ).forEach(function(input) {
                                            formData.append(input.name, input.value);
                                        });
                                    });

                                    this.on("addedfile", function(file) {
                                        if (this.files.length > 5) {
                                            this.removeFile(file);
                                            alert("Anda hanya dapat mengunggah maksimal 5 file.");
                                        }
                                    });
                                }
                            });
                        });


                        document.addEventListener("DOMContentLoaded", function() {
                            let formValidation;

                            const form = document.getElementById("kt_ecommerce_add_product_form");
                            const submitButton = document.getElementById("kt_ecommerce_add_product_submit");

                            formValidation = FormValidation.formValidation(form, {

                                plugins: {
                                    trigger: new FormValidation.plugins.Trigger(),
                                    bootstrap: new FormValidation.plugins.Bootstrap5({
                                        rowSelector: ".fv-row",
                                        eleInvalidClass: "",
                                        eleValidClass: "",
                                    }),
                                },
                            });

                            submitButton.addEventListener("click", function(event) {
                                event.preventDefault();

                                if (formValidation) {
                                    formValidation.validate().then(function(status) {
                                        console.log("Form validated!");

                                        if (status === "Valid") {
                                            submitButton.setAttribute("data-kt-indicator", "on");
                                            submitButton.disabled = true;

                                            setTimeout(function() {
                                                submitButton.removeAttribute("data-kt-indicator");
                                                Swal.fire({
                                                    text: "Formulir telah berhasil dikirim!",
                                                    icon: "success",
                                                    buttonsStyling: false,
                                                    confirmButtonText: "OK mengerti!",
                                                    customClass: {
                                                        confirmButton: "btn btn-dark",
                                                    },
                                                }).then(function(result) {
                                                    if (result.isConfirmed) {
                                                        submitButton.disabled = false;
                                                        window.location = form.getAttribute(
                                                            "data-kt-redirect");
                                                    }
                                                });
                                            }, 2000);
                                        } else {
                                            Swal.fire({
                                                html: "Maaf, sepertinya ada beberapa kesalahan yang terdeteksi, silakan coba lagi.",
                                                icon: "error",
                                                buttonsStyling: false,
                                                confirmButtonText: "OK mengerti!",
                                                customClass: {
                                                    confirmButton: "btn btn-dark",
                                                },
                                            });
                                        }
                                    });
                                }
                            });
                        });
                    </script>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            // Inisialisasi carousel
                            var myCarousel = new bootstrap.Carousel(document.getElementById('carousel-toko'), {
                                interval: 5000, // Ganti gambar setiap 5 detik, atur sesuai kebutuhan Anda
                                wrap: true // Aktifkan wrapping, jadi setelah gambar terakhir akan kembali ke yang pertama
                            });
                        });
                    </script>
                        <script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const ratingButtons = document.querySelectorAll('.rating__button');
        const submitButton = document.getElementById('submit-rating');

        ratingButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Add a class to highlight selected stars
                ratingButtons.forEach(btn => btn.classList.remove('selected'));
                button.classList.add('selected');

                // Show the submit button
                submitButton.style.display = 'block';
            });
        });

        submitButton.addEventListener('click', () => {
            // Here you can handle the submit logic
            alert('Rating submitted!');
        });
    });
</script>

@livewireScripts
    </body>
    <!--end::Body-->

</html>
