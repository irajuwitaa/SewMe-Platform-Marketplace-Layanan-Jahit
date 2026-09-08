<!DOCTYPE html>
<html lang="en-US" dir="ltr">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Frontend by unimasoft.id" />
        <meta name="author" content="Zamah Sari, zamahsari@umm.ac.id" />

        <!--Document Title-->
        <title>SewMe</title>

        <!--Favicons-->
        <link rel="apple-touch-icon" sizes="180x180" href="assets/img/gallery/Vector.png">
        <link rel="icon" type="image/png" sizes="32x32" href="assets/img/gallery/Vector.png">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/img/gallery/Vector.png">
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/gallery/Vector.png">

        <!--fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
            rel="stylesheet">

        <!--Stylesheets-->
        <link href="assets/css/theme.css" rel="stylesheet" />

        <style>
            body,
            h1,
            h2,
            h3,
            h4,
            h5,
            h6,
            a,
            button,
            input {
                font-family: "Montserrat", sans-serif !important;
            }

            input {
                font-size: 16px !important;
            }
        </style>

    </head>


    <body>

        <!--Main Content-->
        <main class="main" id="top">
            <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 d-block"
                data-navbar-on-scroll="data-navbar-on-scroll">
                <div class="container"><a class="navbar-brand"> <img
                            class="me-3 d-inline-block img-fluid logo" src="assets/img/gallery/logo-dark.png"
                            alt="logosewme" /></a>
                    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation"><span
                            class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0"
                        id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto pt-2 pt-lg-0 font-base">
                            <li class="nav-item px-2" data-anchor="data-anchor"><a class="nav-link"
                                    href="#beranda">Beranda</a></li>
                            <li class="nav-item px-2" data-anchor="data-anchor"><a class="nav-link"
                                    href="#tentangkami">Tentang Kami</a></li>
                            <li class="nav-item px-2" data-anchor="data-anchor"><a class="nav-link"
                                    href="#layanan">Layanan</a></li>
                            <li class="nav-item px-2" data-anchor="data-anchor"><a class="nav-link"
                                    href="#howtoorder">How to Order</a></li>
                            <li class="nav-item px-2" data-anchor="data-anchor"><a class="nav-link"
                                    href="#faq">FAQ</a></li>
                        </ul>
                        <form class="ps-lg-5">
                            <a href="/login" class="btn btn-light text-dark fw-bold order-1 order-lg-0 me-3">Masuk</a>
                            {{-- <button class="btn btn-light text-dark fw-bold order-1 order-lg-0 me-3"
                                type="button">Masuk</button> --}}
                            <a class="btn hover-top btn-collab" href="/signup">DAFTAR</a>
                        </form>
                    </div>
                </div>
            </nav>

            <section id="beranda">
                <div class="container">
                    <div class="row align-items-center g-2">
                        <div class="col-md-5 col-lg-6 order-0 order-md-1 text-end"><img
                                class="pt-7 pt-md-0 pt-lg-6 w-100" src="assets/img/gallery/hero-header.gif"
                                alt="hero-header" /></div>
                        <div class="col-md-7 col-lg-6 py-6 text-md-start text-center pt-lg-8">
                            <h1 class="fw-bold fs-4 fs-lg-6 fs-xxl-7 text-dark"> Solusi Terbaik untuk<br>Kebutuhan Jahit
                                dan Konveksi Anda</h1>
                            <p class="mb-5 fs-1 fw-medium">Platform yang memudahkan Anda menemukan layanan jahit dan
                                konveksi terbaik.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section id="tentangkami" class="py-6"
                style="background:linear-gradient(180deg, #F9FAFD -54.51%, #F9FAFD 99.98%);">
                <div class="container">
                    <div class="row flex-center">
                        <div class="col-md-6 col-lg-4 text-center mb-6 mb-md-0 order-0">
                            <img class="shadow-lg" src="assets/img/assetaboutus.png" width="270" alt="assetaboutus"
                                style="border-radius:3rem;" />
                        </div>
                        <div class="col-md-6 text-center text-md-start mb-6 offset-lg-1">
                            <h6 class="fs-0 text-uppercase fw-bold text-dark">Tentang Kami</h6>
                            <h6 class="fw-bold fs-3 fs-lg-4 lh-sm">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Eaque, distinctio!</h6>
                            <p class="my-4 fs-1 pe-xl-8">While the project is shared between several members, the
                                resources need to be at one place to maintain the clarity of the project, and
                                flexibility among developers.</p><a class="btn hover-top btn-collab" href="#"
                                role="button">Daftar Sekarang!</a>
                        </div>
                    </div>
                </div>
            </section>

            <section class="py-5" style="background:linear-gradient(180deg, #F9FAFD -54.51%, #F9FAFD 99.98%);"
                id="layanan">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-sm-6 text-center mb-3">
                            <h6 class="fw-bold fs-4 display-3 lh-sm ">Layanan Kami</h6>
                            <p class="my-3 fs-1">SewMe menyediakan layanan untuk memenuhi kebutuhan busana anda.</p>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-4 col-lg-3 mt-3 mt-lg-2 text-center text-md-start">
                            <h4 class="mt-5 mb-3 fw-bold">Jasa Penjahit</h4>
                            <p class="fs-1 lh-sm"><span class="text-900">Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit, sed do eiusmod tempor incididunt ut labore. Lorem ipsum dolor sit
                                    amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                    labore.</span></p>
                        </div>
                        <div class="col-md-4 col-lg-3 mt-3 mt-lg-2 text-center text-md-start">
                            <h4 class="mt-5 mb-3 fw-bold">Penyewaan Baju</h4>
                            <p class="fs-1 lh-sm"><span class="text-900">Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    eiusmod tempor incididunt ut labore, consectetur adipiscing elit, sed do eiusmod
                                    tempor incididunt ut labore. </span></p>
                        </div>
                        <div class="col-md-4 col-lg-3 mt-3 mt-lg-2 text-center text-md-start">
                            <h4 class="mt-5 mb-3 fw-bold">Jahit Konveksi</h4>
                            <p class="fs-1 lh-sm"><span class="text-900">Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit, sed do eiusmod tempor incididunt ut labore.</span></p>
                        </div>
                    </div>
                </div>
            </section>

            <section id="howtoorder" class="container">
                <div class="text-center mb-4">
                    <h6 class="fw-bold fs-4 display-3 lh-sm ">How to Order?</h6>
                    <p class="my-3 fs-1">Ikuti langkah-langkah berikut untuk mulai berbelanja dengan mudah.</p>
                </div>
                <div class="row justify-content-lg-between">
                    <div class="col-md-4 mb-4">
                        <div class="card step-card h-100">
                            <img src="assets/img/assetpilihproduk.jpg" class="card-img-top"
                                alt="Tambah ke Keranjang">
                            <div class="card-body text-center">
                                <h5 class="card-title">1. Pilih Produk</h5>
                                <p class="card-text">Pilih produk yang Anda suka</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card step-card h-100">
                            <img src="assets/img/assetkeranjang.jpg" class="card-img-top" alt="Pembayaran">
                            <div class="card-body text-center">
                                <h5 class="card-title">2. Tambah ke Keranjang</h5>
                                <p class="card-text">Pilih metode pembayaran yang diinginkan dan selesaikan transaksi.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card step-card h-100">
                            <img src="assets/img/assetkonfirmasi.jpg" class="card-img-top" alt="Konfirmasi Order">
                            <div class="card-body text-center">
                                <h5 class="card-title">3. Konfirmasi Order</h5>
                                <p class="card-text">Periksa detail pesanan Anda dan konfirmasi order.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="faq" style="background:linear-gradient(180deg, #F9FAFD -54.51%, #F9FAFD 99.98%);">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-lg-6 text-center mb-3">
                            <h6 class="fs-0 text-uppercase fw-bold text-dark">FAQ</h6>
                            <h6 class="fw-bold fs-4 display-3 lh-sm mb-5">Frequently asked questions</h6>
                        </div>
                    </div>
                    <div class="row flex-center">
                        <div class="col-lg-9">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item border-top">
                                    <h2 class="accordion-header" id="heading1">
                                        <button class="accordion-button px-2" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse1"
                                            aria-expanded="true" aria-controls="collapse1"><span
                                                class="mb-0 fw-bold text-start fs-1 text-1000">Lorem ipsum dolor sit
                                                amet consectetur, adipisicing elit. Facilis, libero?</span></button>
                                    </h2>
                                    <div class="accordion-collapse collapse show" id="collapse1"
                                        aria-labelledby="heading1" data-bs-parent="#accordionExample">
                                        <div class="accordion-body pt-0 px-2">Lorem ipsum, dolor sit amet consectetur
                                            adipisicing elit. Totam, quasi provident error consequuntur doloribus sequi
                                            vero numquam excepturi eius iusto!. Lorem ipsum dolor sit amet consectetur,
                                            adipisicing elit. Porro, sapiente?</div>
                                    </div>
                                </div>
                                <div class="accordion-item border-top">
                                    <h2 class="accordion-header" id="heading2">
                                        <button class="accordion-button px-2 collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse2"
                                            aria-expanded="true" aria-controls="collapse2"><span
                                                class="mb-0 fw-bold text-start fs-1 text-1000">lorem ipsum dolor sit
                                                amet consectetur, adipisicing elit. Facilis, libero?</span></button>
                                    </h2>
                                    <div class="accordion-collapse collapse" id="collapse2"
                                        aria-labelledby="heading2" data-bs-parent="#accordionExample">
                                        <div class="accordion-body pt-0 px-2">Lorem ipsum, dolor sit amet consectetur
                                            adipisicing elit. Totam, quasi provident error consequuntur doloribus sequi
                                            vero numquam excepturi eius iusto!. Lorem ipsum dolor sit amet consectetur,
                                            adipisicing elit. Porro, sapiente?</div>
                                    </div>
                                </div>
                                <div class="accordion-item border-top">
                                    <h2 class="accordion-header" id="heading3">
                                        <button class="accordion-button px-2 collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse3"
                                            aria-expanded="true" aria-controls="collapse3"><span
                                                class="mb-0 fw-bold text-start fs-1 text-1000">lorem ipsum dolor sit
                                                amet consectetur, adipisicing elit. Facilis, libero?</span></button>
                                    </h2>
                                    <div class="accordion-collapse collapse" id="collapse3"
                                        aria-labelledby="heading3" data-bs-parent="#accordionExample">
                                        <div class="accordion-body pt-0 px-2">Lorem ipsum, dolor sit amet consectetur
                                            adipisicing elit. Totam, quasi provident error consequuntur doloribus sequi
                                            vero numquam excepturi eius iusto!. Lorem ipsum dolor sit amet consectetur,
                                            adipisicing elit. Porro, sapiente?</div>
                                    </div>
                                </div>
                                <div class="accordion-item border-top">
                                    <h2 class="accordion-header" id="heading4">
                                        <button class="accordion-button px-2 collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse4"
                                            aria-expanded="true" aria-controls="collapse4"><span
                                                class="mb-0 fw-bold text-start fs-1 text-1000">lorem ipsum dolor sit
                                                amet consectetur, adipisicing elit. Facilis, libero?</span></button>
                                    </h2>
                                    <div class="accordion-collapse collapse" id="collapse4"
                                        aria-labelledby="heading4" data-bs-parent="#accordionExample">
                                        <div class="accordion-body pt-0 px-2">Lorem ipsum, dolor sit amet consectetur
                                            adipisicing elit. Totam, quasi provident error consequuntur doloribus sequi
                                            vero numquam excepturi eius iusto!. Lorem ipsum dolor sit amet consectetur,
                                            adipisicing elit. Porro, sapiente?</div>
                                    </div>
                                </div>
                                <div class="accordion-item border-top">
                                    <h2 class="accordion-header" id="heading5">
                                        <button class="accordion-button px-2 collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse5"
                                            aria-expanded="true" aria-controls="collapse5"><span
                                                class="mb-0 fw-bold text-start fs-1 text-1000">lorem ipsum dolor sit
                                                amet consectetur, adipisicing elit. Facilis, libero?</span></button>
                                    </h2>
                                    <div class="accordion-collapse collapse" id="collapse5"
                                        aria-labelledby="heading5" data-bs-parent="#accordionExample">
                                        <div class="accordion-body pt-0 px-2">Lorem ipsum, dolor sit amet consectetur
                                            adipisicing elit. Totam, quasi provident error consequuntur doloribus sequi
                                            vero numquam excepturi eius iusto!. Lorem ipsum dolor sit amet consectetur,
                                            adipisicing elit. Porro, sapiente?</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <footer>
                <div class="container">
                    <div class="row flex-center mt-5">
                        <div class="col-lg-6">
                            <h4 class="fw-bold">Lorem ipsum dolor sit.</h4>
                            <p class="fs-lg-1">Lorem ipsum dolor sit amet consectetur.</p>
                        </div>
                        <div class="col-lg-6 d-flex justify-content-lg-end mb-4">
                            <form class="row row row-cols-lg-auto align-items-center">
                                <div class="col-8 col-sm-9">
                                    <label class="visually-hidden" for="colFormLabel">Username</label>
                                    <div class="input-group">
                                        <input class="form-control" id="colFormLabel" type="email"
                                            placeholder="Enter email address" />
                                    </div>
                                </div>
                                <div class="col-4 col-sm-3 text-end">
                                    <button class="btn btn-collab hover-top" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr class="text-200" />
                    <div class="row justify-content-lg-between circle-blend-right circle-danger">
                        <div class="col-12 col-lg-5 mb-3">
                            <img class="img-fluid logo-footer  my-4" src="assets/img/gallery/logo-dark.png"
                                alt="logosewme" />
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam inventore obcaecati
                                aliquid voluptas omnis quaerat hic magnam unde quasi consequuntur.</p>
                        </div>
                        <div class="col-6 col-sm-4 col-lg-auto mb-3">
                            <h6 class="my-4 fw-bold fs-0">USEFUL LINKS</h6>
                            <ul class="list-unstyled mb-md-4 mb-lg-0">
                                <li class="mb-2"><a class="text-1100 text-decoration-none"
                                        href="#beranda">Beranda</a></li>
                                <li class="mb-2"><a class="text-1100 text-decoration-none"
                                        href="#tentangkami">Tentang Kami</a></li>
                                <li class="mb-2"><a class="text-1100 text-decoration-none"
                                        href="#layanan">Layanan</a></li>
                                <li class="mb-2"><a class="text-1100 text-decoration-none" href="#howtoorder">How
                                        to Order</a></li>
                                <li class="mb-2"><a class="text-1100 text-decoration-none" href="#faq">FAQ</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-auto mb-3">
                            <h6 class="my-4 fw-bold fs-0">CONTACT US</h6>
                            <p> A108 Adam Street <br> New York, NY 535022<br> United States <br><br>
                                <strong>Phone:</strong> +1 5589 55488 55<br>
                                <strong>Email:</strong> info@example.com<br>
                            </p>
                        </div>
                    </div>
                    <hr class="text-200 mb-0" />
                    <div class="row justify-content-md-between justify-content-evenly py-3">
                        <div class="col-12 col-sm-8 col-md-6 col-lg-auto text-center text-md-start">
                            <p class="fs-0 my-2 text-400"><a href="https://www.unimasoft.id/" target="_blank"
                                    class="text-dark">SewMe. All Rights Reserved UNIMASOFT.id</a>
                                <span class="fw-bold text-500">
                                    <script>
                                        document.write(new Date().getFullYear());
                                    </script>
                                    &copy;
                                </span>
                            </p>
                            <span class="text-muted fw-semibold me-1">
                        </div>
                    </div>
                </div>
            </footer>
        </main>

        <!--JavaScripts-->
        <script src="vendors/@popperjs/popper.min.js"></script>
        <script src="vendors/bootstrap/bootstrap.min.js"></script>
        <script src="vendors/is/is.min.js"></script>
        <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
        <script src="vendors/fontawesome/all.min.js"></script>
        <script src="assets/js/theme.js"></script>

    </body>

</html>
