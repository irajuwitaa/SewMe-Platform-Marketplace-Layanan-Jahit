
<!DOCTYPE html>
<html lang="en">

<head>
	<title>SEWME - Chat</title>
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
						<a href="index.html">
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
								<div class="btn btn-icon btn-custom w-35px h-35px w-md-40px h-md-40px"
									id="kt_activities_toggle">
									<i class="ki-duotone ki-message-text fs-1">
										<span class="path1"></span>
										<span class="path2"></span>
										<span class="path3"></span>
									</i>
								</div>
							</div>
							<div class="app-navbar-item ms-1 ms-lg-4">
								<div class="btn btn-icon btn-custom w-35px h-35px w-md-40px h-md-40px">
									<a href="frontend/keranjang.html" class="text-decoration-none">
										<i class="ki-duotone ki-handcart fs-1 me-2"></i>
									</a>
								</div>
							</div>
							<div class="app-navbar-item ms-1 ms-lg-4" id="kt_header_user_menu_toggle">
								<div class="cursor-pointer symbol symbol-35px symbol-md-40px"
									data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
									data-kt-menu-placement="bottom-end">
									<img class="symbol symbol-35px symbol-md-40px"
										src="../assets/media/siap menikah.jpg" alt="user" />
								</div>
								<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
									data-kt-menu="true">
									<div class="menu-item px-3">
										<div class="menu-content d-flex align-items-center px-3">
											<div class="symbol symbol-50px me-5">
												<img alt="Logo" src="../assets/media/siap menikah.jpg" />
											</div>
											<div class="d-flex flex-column">
												<div class="fw-bold d-flex align-items-center fs-5">Shani Indira
													<span
														class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Admin</span>
												</div>
												<a href="#"
													class="fw-semibold text-muted text-hover-primary fs-7">shaniindira@kt.com</a>
											</div>
										</div>
									</div>
									<div class="separator my-2"></div>
									<div class="menu-item px-5">
										<a href="frontend/profil.html" class="menu-link px-5">Profil Saya</a>
									</div>
									<div class="separator my-2"></div>
									<div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
										data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
										<a href="#" class="menu-link px-5">
											<span class="menu-title position-relative">Mode
												<span class="ms-5 position-absolute translate-middle-y top-50 end-0">
													<i class="ki-outline ki-night-day theme-light-show fs-2"></i>
													<i class="ki-outline ki-moon theme-dark-show fs-2"></i>
												</span>
											</span>
										</a>
										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px"
											data-kt-menu="true" data-kt-element="theme-mode-menu">
											<div class="menu-item px-3 my-0">
												<a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
													data-kt-value="light">
													<span class="menu-icon" data-kt-element="icon">
														<i class="ki-outline ki-night-day fs-2"></i>
													</span>
													<span class="menu-title">Light</span>
												</a>
											</div>
											<div class="menu-item px-3 my-0">
												<a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
													data-kt-value="dark">
													<span class="menu-icon" data-kt-element="icon">
														<i class="ki-outline ki-moon fs-2"></i>
													</span>
													<span class="menu-title">Dark</span>
												</a>
											</div>
											<div class="menu-item px-3 my-0">
												<a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
													data-kt-value="system">
													<span class="menu-icon" data-kt-element="icon">
														<i class="ki-outline ki-screen fs-2"></i>
													</span>
													<span class="menu-title">System</span>
												</a>
											</div>
										</div>
									</div>
									<div class="menu-item px-5">
										<a href="sign-in.html" class="menu-link px-5" id="logout-link-2">Keluar</a>
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
			<div class="app-wrapper d-flex" id="kt_app_wrapper">
				<div class="app-container container-fluid d-flex">
					<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true"
						data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}"
						data-kt-drawer-overlay="true" data-kt-drawer-width="auto" data-kt-drawer-direction="start"
						data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
						<div id="kt_app_sidebar_menu" data-kt-menu="true"
							class="menu menu-sub-indention menu-rounded menu-column menu-active-bg menu-title-gray-600 menu-icon-gray-500 menu-state-primary menu-arrow-gray-500 fw-semibold fs-6 py-4 py-lg-6 ms-lg-n7 px-2 px-lg-0">
							<div id="kt_app_sidebar_menu_wrapper" class="hover-scroll-y px-1 px-lg-5"
								data-kt-sticky="true" data-kt-sticky-name="app-sidebar-menu-sticky"
								data-kt-sticky-offset="{default: false, xl: '500px'}"
								data-kt-sticky-release="#kt_app_stats" data-kt-sticky-width="250px"
								data-kt-sticky-left="auto" data-kt-sticky-top="100px" data-kt-sticky-animation="false"
								data-kt-sticky-zindex="95" data-kt-scroll="true"
								data-kt-scroll-activate="{default: true, lg: true}" data-kt-scroll-height="auto"
								data-kt-scroll-dependencies="#kt_app_header, #kt_app_header"
								data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="20px">
								<div class="menu-item">
									<div class="menu-content">
										<span class="menu-section fs-5 fw-bolder ps-1 py-1">Menu Admin</span>
									</div>
								</div>
								<div class="menu-item">
									<a class="menu-link" href="index.html">
										<span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">Dashboard</span>
									</a>
								</div>
								<div class="menu-item">
									<a class="menu-link" href="pesanan-admin.html">
										<span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">Pesanan</span>
									</a>
								</div>
								<div class="menu-item">
									<a class="menu-link" href="produk-admin.html">
										<span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">Produk Saya</span>
									</a>
								</div>
								<div class="menu-item">
									<a class="menu-link" href="riwayat-pesanan-admin.html">
										<span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">Riwayat Pesanan</span>
									</a>
								</div>
								<div class="menu-item">
									<a class="menu-link" href="frontend/statistik-penjual.html">
										<span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">Statistik Penjual</span>
									</a>
								</div>
								<div class="menu-item">
									<div class="menu-content">
										<span class="menu-section fs-5 fw-bolder ps-1 py-1">Menu User</span>
									</div>
								</div>
								<div class="menu-item">
									<a class="menu-link" href="dashboard-user.html">
										<span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">Dashboard</span>
									</a>
								</div>
								<div class="menu-item">
									<a class="menu-link" href="produk.html">
										<span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">Cari Produk</span>
									</a>
								</div>
								<div class="menu-item">
									<a class="menu-link" href="pesanan-user.html">
										<span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">Pesanan</span>
									</a>
								</div>
								<div class="menu-item">
									<a class="menu-link" href="riwayat-pesanan-user.html">
										<span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">Riwayat Pesanan</span>
									</a>
								</div>
							</div>
						</div>
					</div>
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
										<li class="breadcrumb-item text-gray-700 fw-bold lh-1 mx-n1">Chat</li>
									</ul>
									<!--begin::Title-->
									<h1
										class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-3 m-0">
										Chat</h1>
								</div>
							</div>
						</div>

						<div class="d-flex flex-column flex-column-fluid">
							<div id="kt_app_content" class="app-content flex-column-fluid">
								<div class="flex-lg-row-fluid mb-10">
                                    <div>
                                        <div>
                                            <div class="card" id="kt_chat_messenger">
                                                <div class="card-header" id="kt_chat_messenger_header">
                                                    <div class="card-title">
                                                        <div class="d-flex justify-content-center flex-column me-3">
                                                            <a href="#" class="fs-4 fw-bold text-gray-900 text-hover-primary me-1 mb-2 lh-1">Shani
                                                                Indira</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="scroll-y me-n5 pe-5 h-350px h-lg-auto" data-kt-element="messages" data-kt-scroll="true"
                                                        data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                                                        data-kt-scroll-dependencies="#kt_header, #kt_app_header, #kt_app_toolbar, #kt_toolbar, #kt_footer, #kt_app_footer, #kt_chat_messenger_header, #kt_chat_messenger_footer"
                                                        data-kt-scroll-wrappers="#kt_content, #kt_app_content, #kt_chat_messenger_body"
                                                        data-kt-scroll-offset="5px">
                                                        @foreach ($messages as $message)
                                                        <div class="d-flex justify-content-{{ $message->from_user_id == auth()->user()->id ? 'end' : 'start' }} mb-10">
                                                            <div class="d-flex flex-column align-items-{{ $message->from_user_id == auth()->user()->id ? 'end' : 'start' }}">
                                                                <div class="d-flex align-items-center mb-2">
                                                                    <div class="symbol symbol-35px symbol-circle">
                                                                        @if ($message->from_user_id == auth()->user()->id)
                                                                            <img alt="{{ $message->fromUser->nama }}" src="{{ asset('storage/avatar/' . $message->fromUser->avatar) }}" />
                                                                        @else
                                                                            <img alt="{{ $message->toUser->nama }}" src="{{ asset('storage/avatar/' . $message->toUser->avatar) }}" />
                                                                        @endif
                                                                    </div>
                                                                    <div class="ms-3">
                                                                        <div class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">{{ $message->fromUser->name }}</div>
                                                                        <span class="text-muted fs-7 mb-1">{{ $message->created_at->diffForHumans() }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="p-5 rounded bg-light-info text-gray-900 fw-semibold mw-lg-400px text-start"
                                                                data-kt-element="message-text">{{ $message->message }}</div>
                                                                <span class="text-muted fs-7 mt-1 ms-1">
                                                                    @if ($message->read_at)
                                                                        Read
                                                                    @else
                                                                        Delivered
                                                                    @endif
                                                                </span>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <form wire:submit.prevent='sendMessage'>
                                                    <div class="card-footer pt-4" id="kt_chat_messenger_footer">
                                                        <textarea class="form-control form-control-flush mb-3" rows="1" wire:model='message' data-kt-element="input"
                                                            placeholder="Type a message"></textarea>
                                                        <div class="d-flex justify-content-end">
                                                            <button class="btn btn-primary" type="submit" data-kt-element="send">Send</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
								</div>
							</div>
						</div>


						<div id="kt_app_footer"
							class="app-footer d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
							<div class="text-gray-900 order-2 order-md-1">
								<span class="text-muted fw-semibold me-1">
									<script>
										document.write(new Date().getFullYear());
									</script>
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


	<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
		<i class="ki-outline ki-arrow-up"></i>
	</div>

	<!--begin::Javascript-->
	<script>var hostUrl = "../assets/";</script>
	<!--begin::Global Javascript Bundle(mandatory for all pages)-->
	<script src="../assets/plugins/global/plugins.bundle.js"></script>
	<script src="../assets/js/scripts.bundle.js"></script>
	<script src="../assets/js/sign-out.js"></script>
	<!--end::Custom Javascript-->
	<!--end::Javascript-->


</body>
<!--end::Body-->

</html>
