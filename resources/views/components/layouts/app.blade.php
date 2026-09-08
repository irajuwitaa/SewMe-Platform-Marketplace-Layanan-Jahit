<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="Frontend by unimasoft.id" />
        <meta name="author" content="Zamah Sari, zamahsari@umm.ac.id" />
        <meta property="og:site_name" content="SEWME" />
        <link rel="canonical" href="http://index.html" />
        <link rel="shortcut icon" href="../assets/media/Vector.png" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
        <link href="../assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/style.bundle.css" rel="stylesheet" type="text/css" />

        <title>{{ $title ?? 'chats' }}</title>
        @livewireStyles
    </head>
    <body id="kt_app_body" data-kt-app-header-fixed-mobile="true" data-kt-app-sidebar-enabled="true"
	data-kt-app-sidebar-fixed="false" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
	data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
	<script>var defaultThemeMode = "light"; var themeMode; if (document.documentElement) { if (document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if (localStorage.getItem("data-bs-theme") !== null) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
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
                                    <a href="/chats" class="btn btn-icon btn-custom w-35px h-35px w-md-40px h-md-40px">
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

                @if(auth()->user()->role_id == 1)
                <div class="app-wrapper d-flex" id="kt_app_wrapper">
                    <div class="app-container container-fluid d-flex">
                        <div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="auto" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
                            <div id="kt_app_sidebar_menu" data-kt-menu="true" class="menu menu-sub-indention menu-rounded menu-column menu-active-bg menu-title-gray-600 menu-icon-gray-500 menu-state-primary menu-arrow-gray-500 fw-semibold fs-6 py-4 py-lg-6 ms-lg-n7 px-2 px-lg-0">
                                <div id="kt_app_sidebar_menu_wrapper" class="hover-scroll-y px-1 px-lg-5" data-kt-sticky="true" data-kt-sticky-name="app-sidebar-menu-sticky" data-kt-sticky-offset="{default: false, xl: '500px'}" data-kt-sticky-release="#kt_app_stats" data-kt-sticky-width="250px" data-kt-sticky-left="auto" data-kt-sticky-top="100px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95" data-kt-scroll="true" data-kt-scroll-activate="{default: true, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_header, #kt_app_header" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="20px">
                                    <div class="menu-item">
                                        <div class="menu-content">
                                            <span class="menu-section fs-5 fw-bolder ps-1 py-1">Menu User</span>
                                        </div>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link {{ Request::path() == 'dashboard-user' ? 'active' : '' }}" href="/dashboard-user">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Dashboard</span>
                                        </a>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link {{ Request::path() == 'cari-produk' ? 'active' : '' }}" href="/cari-produk">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Cari Produk</span>
                                        </a>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link {{ Request::path() == 'pesanan' ? 'active' : '' }}" href="/pesanan">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Pesanan</span>
                                        </a>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link {{ Request::path() == 'riwayat' ? 'active' : '' }}" href="/riwayat">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Riwayat Pesanan</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                @else
                <div class="app-wrapper d-flex" id="kt_app_wrapper">
                    <div class="app-container container-fluid d-flex">
                        <div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="auto" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
                            <div id="kt_app_sidebar_menu" data-kt-menu="true" class="menu menu-sub-indention menu-rounded menu-column menu-active-bg menu-title-gray-600 menu-icon-gray-500 menu-state-primary menu-arrow-gray-500 fw-semibold fs-6 py-4 py-lg-6 ms-lg-n7 px-2 px-lg-0">
                                <div id="kt_app_sidebar_menu_wrapper" class="hover-scroll-y px-1 px-lg-5" data-kt-sticky="true" data-kt-sticky-name="app-sidebar-menu-sticky" data-kt-sticky-offset="{default: false, xl: '500px'}" data-kt-sticky-release="#kt_app_stats" data-kt-sticky-width="250px" data-kt-sticky-left="auto" data-kt-sticky-top="100px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95" data-kt-scroll="true" data-kt-scroll-activate="{default: true, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_header, #kt_app_header" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="20px">
                                    <div class="menu-item">
                                        <div class="menu-content">
                                            <span class="menu-section fs-5 fw-bolder ps-1 py-1">Menu Admin</span>
                                        </div>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link {{ Request::path() == 'dashboard-admin' ? 'active' : '' }}" href="/dashboard-admin">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Dashboard</span>
                                        </a>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link {{ Request::path() == 'pesanan-admin' ? 'active' : '' }}" href="/pesanan-admin">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Pesanan</span>
                                        </a>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link {{ Request::path() == 'pengaturan' ? 'active' : '' }}" href="/pengaturan">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Pengaturan Toko</span>
                                        </a>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link {{ Request::path() == 'produk-saya' ? 'active' : '' }}" href="/produk-saya">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Produk Saya</span>
                                        </a>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link {{ Request::path() == 'riwayat-pesanan' ? 'active' : '' }}" href="/riwayat-pesanan">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Riwayat Pesanan</span>
                                        </a>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link {{ Request::path() == 'statistik-penjual' ? 'active' : '' }}" href="/statistik-penjual">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Statistik Penjual</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                @endif

                        {{ $slot }}

						<div id="kt_app_footer"
							class="app-footer d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
							<div class="text-gray-900 order-2 order-md-1">
								<span class="text-muted fw-semibold me-1">
                                    2024
									&copy; SEWME. All Rights Reserved
								</span>
								<a href="https://unimasoft.id/" target="_blank"
									class="text-gray-800 text-hover-primary">Unimasoft.id</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div id="kt_activities" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="activities"
		data-kt-drawer-activate="true" data-kt-drawer-overlay="true"
		data-kt-drawer-width="{default:'300px', 'lg': '900px'}" data-kt-drawer-direction="end"
		data-kt-drawer-toggle="#kt_activities_toggle" data-kt-drawer-close="#kt_activities_close">

		<div class="card shadow-none border-0 rounded-0">
			<div class="card-header" id="kt_activities_header">
				<h3 class="card-title fw-bold text-gray-900">Chat</h3>
				<div class="card-toolbar">
					<button type="button" class="btn btn-sm btn-icon btn-active-light-primary me-n5"
						id="kt_activities_close">
						<i class="ki-outline ki-cross fs-1"></i>
					</button>
				</div>
			</div>
			<div class="card-body position-relative" id="kt_activities_body">
				<div id="kt_activities_scroll" class="position-relative scroll-y me-n5 pe-5" data-kt-scroll="true"
					data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_activities_body"
					data-kt-scroll-dependencies="#kt_activities_header, #kt_activities_footer"
					data-kt-scroll-offset="5px">
				</div>
			</div>
		</div>
	</div>

	<!--begin::Javascript-->
	<script>var hostUrl = "../assets/";</script>
	<!--begin::Global Javascript Bundle(mandatory for all pages)-->
	<script src="../assets/plugins/global/plugins.bundle.js"></script>
	<script src="../assets/js/scripts.bundle.js"></script>
	<script src="../assets/js/sign-out.js"></script>
	<!--end::Custom Javascript-->
	<!--end::Javascript-->
    @livewireScripts

</body>
<!--end::Body-->
</html>
