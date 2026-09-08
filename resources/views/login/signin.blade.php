<!DOCTYPE html>
<html lang="en">
{{-- @dd(getUserRole()) --}}
<head>
    <base href="" />
    <title>SEWME - SIGNIN</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Frontend by unimasoft.id" />
    <meta name="author" content="Zamah Sari, zamahsari@umm.ac.id" />
    <meta property="og:site_name" content="SEWME" />
    <link rel="canonical" href="http://authentication/layouts/overlay/signin.html" />
    <link rel="shortcut icon" href="assets/media/Vector.png" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
</head>

<body id="kt_body" class="app-blank bgi-size-cover bgi-attachment-fixed bgi-position-center">
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
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <style>
            body {
                background-image: url('assets/media/auth/bg10.jpeg');
            }

            [data-bs-theme="dark"] body {
                background-image: url('assets/media/auth/bg10-dark.jpeg');
            }
        </style>
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <div class="d-flex flex-lg-row-fluid">
                <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
                    <div class="app-header-logo d-flex align-items-center me-lg-9">
                        <img alt="Logo" src="assets/media/logo-dark-saja.png"
                            class="h-60px h-lg-70px mb-2 theme-light-show" />
                        <img alt="Logo" src="assets/media/logo-white-saja.png"
                            class="h-60px h-lg-70px mb-2 theme-dark-show" />
                        </a>
                    </div>
                    <h1 class="text-gray-800 fs-2qx fw-bold text-center mb-3">Welcome to SEWME</h1>
                    <div class="text-gray-600 fs-5 w-50 text-center fw-semibold mb-5">Lorem ipsum dolor sit amet
                        consectetur adipisicing elit. Sequi voluptatem</div>
                    <img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
                        src="assets/media/asset-login.png" alt="" />
                    <img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
                        src="assets/media/asset-login-white.png" alt="" />
                </div>
            </div>
            <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
                <div class="bg-body d-flex flex-column flex-center rounded-4 w-md-600px p-10">
                    <div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px">
                        <div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">
                            <form action="/loginproses" class="form w-100" novalidate="novalidate" id="kt_sign_in_form"
                                method="POST">
                                @csrf
                                @if (session('flash_message_success'))
                                    <div class="alert alert-success">
                                        {{ session('flash_message_success') }}
                                    </div>
                                @endif

                                @if (session('flash_message_error'))
                                    <div class="alert alert-danger">
                                        {{ session('flash_message_error') }}
                                    </div>
                                @endif

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="text-center mb-11">
                                    <h1 class="text-gray-900 fw-bolder mb-3">Sign In</h1>
                                </div>

                                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                                <div class="fv-row mb-6">
                                    <input type="text" placeholder="Email" id="email" name="email"
                                        autocomplete="off" class="form-control bg-transparent" />
                                    @error('email')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="fv-row mb-8" data-kt-password-meter="true">
                                    <div class="position-relative mb-3">
                                        <input type="password" placeholder="Kata Sandi" id="password" name="password"
                                            required autocomplete="off" class="form-control bg-transparent"
                                            maxlength="30" />
                                        <span
                                            class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                            data-kt-password-meter-control="visibility">
                                            <i class="ki-duotone ki-eye-slash fs-1"><span class="path1"></span><span
                                                    class="path2"></span><span class="path3"></span><span
                                                    class="path4"></span></i>
                                            <i class="ki-duotone ki-eye d-none fs-1"><span class="path1"></span><span
                                                    class="path2"></span><span class3"></span></i>
                                    </div>
                                    <div class="text-end">
                                        <a href="/forgotpassword" class="link-primary">Reset Password</a>
                                    </div>
                                </div>
                                <div class="d-grid mb-10">
                                    <button type="submit" id="kt_sign_in_submit" class="btn btn-dark">
                                        <span class="indicator-label">Sign In</span>
                                        <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                        </span>
                                    </button>
                                </div>
                                <div class="text-gray-500 text-center fw-semibold fs-6">Belum mempunyai akun?
                                    <a href="/signup" class="link-primary">Sign up</a>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var token = "{{ csrf_token() }}";
        var hostUrl = "assets/";
    </script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>

    <script src="assets/js/custom/authentication/sign-in/general.js"></script>
</body>

</html>
