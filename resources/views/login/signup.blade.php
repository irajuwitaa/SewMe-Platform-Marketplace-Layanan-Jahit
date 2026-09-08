<!DOCTYPE html>
<html lang="en">

    <head>
        <base href="" />
        <title>SEWME - LOGIN</title>
        <meta charset="utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="Frontend by unimasoft.id" />
        <meta name="author" content="Zamah Sari, zamahsari@umm.ac.id" />
        <meta property="og:site_name" content="SEWME" />
        <link rel="shortcut icon" href="assets/media/Vector.png" />
        <link rel="shortcut icon" href="./assets/media/logos/favicon.ico" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
        <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="assets/css/intlTelInput.min.css" />

    </head>

    <body id="kt_body" class="app-blank">
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
            <form action="/signupproses" method="post" class="my-auto pb-5" enctype="multipart/form-data"
                novalidate="novalidate" id="kt_create_account_form">
                <div class="d-flex flex-column flex-lg-row flex-column-fluid stepper stepper-pills stepper-column stepper-multistep"
                    id="kt_create_account_stepper">
                    <div class="d-flex flex-column flex-lg-row-auto w-lg-350px w-xl-500px">
                        <div class="d-flex flex-column position-lg-fixed top-0 bottom-0 w-lg-350px w-xl-500px scroll-y bgi-size-cover bgi-position-center"
                            style="background-image: url(assets/media/bg-login.png)">
                            <div class="d-flex flex-center py-10 py-lg-15 mt-lg-10">
                                <img alt="Logo" src="assets/media/logo-login.png" class="h-80px h-lg-90px" />
                            </div>
                            <div class="d-flex flex-row-fluid justify-content-center p-10">
                                <div class="stepper-nav">
                                    <div class="stepper-item current" data-kt-stepper-element="nav">
                                        <div class="stepper-wrapper">
                                            <div class="stepper-icon rounded-3">
                                                <i class="ki-outline ki-check fs-2 stepper-check"></i>
                                                <span class="stepper-number">1</span>
                                            </div>
                                            <div class="stepper-label">
                                                <h3 class="stepper-title fs-3">Daftar</h3>
                                                <div class="stepper-desc fw-normal">Pilih jenis akun Anda</div>
                                            </div>
                                        </div>
                                        <div class="stepper-line h-40px"></div>
                                    </div>
                                    <div class="stepper-item" data-kt-stepper-element="nav">
                                        <div class="stepper-wrapper">
                                            <div class="stepper-icon rounded-3">
                                                <i class="ki-outline ki-check fs-2 stepper-check"></i>
                                                <span class="stepper-number">2</span>
                                            </div>
                                            <div class="stepper-label">
                                                <h3 class="stepper-title fs-3">Detail Akun</h3>
                                                <div class="stepper-desc fw-normal">Lengkapi detail akun anda</div>
                                            </div>
                                        </div>
                                        <div class="stepper-line h-40px"></div>
                                    </div>
                                    <div class="stepper-item" data-kt-stepper-element="nav">
                                        <div class="stepper-wrapper">
                                            <div class="stepper-icon">
                                                <i class="ki-outline ki-check fs-2 stepper-check"></i>
                                                <span class="stepper-number">3</span>
                                            </div>
                                            <div class="stepper-label">
                                                <h3 class="stepper-title fs-3">Selesai</h3>
                                                <div class="stepper-desc fw-normal">Akun anda berhasil dibuat</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-center flex-wrap px-5 py-10">
                                <h6 class="text-light fw-normal mb-0 me-2">Sudah mempunyai akun?</h6>
                                <a href="/" class="text-primary fw-medium">Sign in</a>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column flex-lg-row-fluid py-10">
                        <div class="d-flex flex-center flex-column flex-column-fluid">
                            <div class="w-lg-650px w-xl-700px p-10 p-lg-15 mx-auto">

                                <div class="current" data-kt-stepper-element="content">
                                    <div class="w-100">
                                        <div class="pb-10 pb-lg-15">
                                            <h2 class="fw-bold d-flex align-items-center text-gray-900">Daftar Sebagai
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Pilih jenis akun Anda untuk melanjutkan">
                                                    <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                                </span>
                                            </h2>
                                            <div class="text-muted fw-semibold fs-6">Pilih jenis akun Anda untuk
                                                melanjutkan
                                            </div>
                                        </div>
                                        <div class="fv-row">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <input type="radio" class="btn-check" name="account_type"
                                                        value="personal" checked="checked"
                                                        id="kt_create_account_form_account_type_personal"
                                                        onclick="updateRoleId(1)" />
                                                    <label
                                                        class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center mb-5"
                                                        for="kt_create_account_form_account_type_personal">
                                                        <i class="ki-duotone ki-user fs-3x me-5">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                        <span class="d-block fw-semibold text-start">
                                                            <span
                                                                class="text-gray-900 fw-bold d-block fs-4 mb-2">Pelanggan</span>
                                                            <span class="text-muted fw-semibold fs-6">Cari penjahit
                                                                yang anda inginkan</span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="radio" class="btn-check" name="account_type"
                                                        value="corporate"
                                                        id="kt_create_account_form_account_type_corporate"
                                                        onclick="updateRoleId(2)" />
                                                    <label
                                                        class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center"
                                                        for="kt_create_account_form_account_type_corporate">
                                                        <i class="ki-duotone ki-bank fs-3x me-5">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                        <span class="d-block fw-semibold text-start">
                                                            <span
                                                                class="text-gray-900 fw-bold d-block fs-4 mb-2">Penjahit</span>
                                                            <span class="text-muted fw-semibold fs-6">Dirikan akun
                                                                untuk usaha anda</span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="" data-kt-stepper-element="content">
                                    <input type="hidden" name="role_id" id="role_id_hidden" value="1">

                                    @csrf
                                    <div class="w-100">
                                        <div class="pb-10 pb-lg-15">
                                            <h2 class="fw-bold text-gray-900">Detail Akun</h2>
                                            <div class="text-muted fw-semibold fs-6">Lengkapi detail akun</div>
                                        </div>
                                        <div>
                                            <div class="row">
                                                <div class="col-lg-6 mb-5 fv-row">
                                                    <label class="form-label mb-3">Username</label>
                                                    <input type="text"
                                                        class="form-control form-control-lg form-control-solid"
                                                        name="name" placeholder="" value="" />
                                                </div>
                                                <div class="col-lg-6 mb-5 fv-row phone">
                                                    <label class="form-label mb-3">No. HP</label><br />
                                                    <input type="tel" id="phone"
                                                        class="form-control form-control-lg form-control-solid"
                                                        name="nohp" placeholder="" value="" />
                                                </div>
                                            </div>
                                            <div class="mb-10 fv-row">
                                                <label class="form-label mb-3">Email</label>
                                                <input type="email"
                                                    class="form-control form-control-lg form-control-solid"
                                                    name="email" placeholder="" value="" />
                                            </div>
                                            <div class="mb-8 fv-row">
                                                <label class="form-label mb-3">Password</label>
                                                <div class="fv-row mb-8" data-kt-password-meter="true">
                                                    <div class="position-relative mb-3">
                                                        <input type="password" name="password" autocomplete="off"
                                                            class="form-control form-control-lg form-control-solid"
                                                            maxlength="30" />
                                                        <span
                                                            class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                                            data-kt-password-meter-control="visibility">
                                                            <i class="ki-duotone ki-eye-slash fs-1"><span
                                                                    class="path1"></span><span
                                                                    class="path2"></span><span
                                                                    class="path3"></span><span
                                                                    class="path4"></span></i>
                                                            <i class="ki-duotone ki-eye d-none fs-1"><span
                                                                    class="path1"></span><span
                                                                    class="path2"></span><span
                                                                    class="path3"></span></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="" data-kt-stepper-element="content">
                                    <div class="w-100">
                                        <div class="pb-8 pb-lg-10">
                                            <h2 class="fw-bold text-gray-900">Selesai!</h2>
                                            <div class="text-muted fw-semibold fs-6">Akun anda telah berhasil dibuat.
                                            </div>
                                        </div>
                                        <div class="mb-0">
                                            <div class="fs-6 text-gray-600 mb-5">Terima kasih telah mendaftar! Kami
                                                senang
                                                menyambut
                                                Anda di platform kami. Silakan gunakan akun baru Anda untuk menjelajahiz
                                                berbagai layanan
                                                dan penawaran yang kami sediakan.</div>
                                            <div
                                                class="notice d-flex bg-light-success rounded border-success border border-dashed p-6">
                                                <i class="ki-outline ki-information fs-2tx text-success me-4"></i>
                                                <div class="d-flex flex-stack flex-grow-1">
                                                    <div class="fw-semibold">
                                                        <h4 class="text-gray-900 fw-bold">Akun Berhasil Dibuat!</h4>
                                                        <div class="fs-6 text-gray-700">Silahkan
                                                            <a href="/" class="fw-bold">Sign-in</a> untuk
                                                            melanjutkan
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-stack pt-15">
                                    <div class="mr-2">
                                        <button type="button" class="btn btn-lg btn-light-primary me-3"
                                            data-kt-stepper-action="previous">
                                            <i class="ki-outline ki-arrow-left fs-4 me-1"></i>Previous</button>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-lg btn-primary"
                                            data-kt-stepper-action="submit">
                                            <span class="indicator-label">Submit
                                                <i class="ki-outline ki-arrow-right fs-4 ms-2"></i></span>
                                            <span class="indicator-progress">Please wait...
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                        <button type="button" class="btn btn-lg btn-primary"
                                            data-kt-stepper-action="next">Continue
                                            <i class="ki-outline ki-arrow-right fs-4 ms-1"></i></button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
            </form>
        </div>
        </div>

        <script>
            var hostUrl = "assets/";
        </script>
        <script src="assets/js/intlTelInput.js"></script>
        <script src="./assets/plugins/global/plugins.bundle.js"></script>
        <script src="assets/js/scripts.bundle.js"></script>
        <script src="assets/js/custom/utilities/modals/create-account.js"></script>
        <script>
            var input = document.querySelector('#phone');

            var iti = window.intlTelInput(input, {
                initialCountry: 'id',
                separateDialCode: true,
                preferredCountries: ['us', 'gb', 'au'],
            });

            // Add event listener to the form submission button
            document.querySelector('button[type="submit"]').addEventListener('click', function(e) {
                // Prevent the default form submission
                e.preventDefault();

                // Get the selected country data
                var countryData = iti.getSelectedCountryData();
                var dialCode = countryData.dialCode;

                // Get the phone number input value
                var phoneNumber = input.value;

                // Combine the dial code with the phone number
                var fullPhoneNumber = dialCode + phoneNumber;

                // Set the combined value to the input nohp
                input.value = fullPhoneNumber;

                // Submit the form
                e.target.form.submit();
            });
        </script>
        <script>
            function updateRoleId(value) {
                document.getElementById('role_id_hidden').value = value;
            }
        </script>
    </body>

</html>
