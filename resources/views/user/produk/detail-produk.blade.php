@extends('template.main')
@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        @if ($data)
            <div class="d-flex flex-column flex-column-fluid">
                <div id="kt_app_toolbar" class="app-toolbar pt-7 pt-lg-10">
                    <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                        <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7">
                                <li class="breadcrumb-item text-gray-700 fw-bold lh-1 mx-n1">
                                    <a href="{{ '/dashboard-' . strtolower(getUserRole()->name) }}"
                                        class="text-hover-primary">
                                        <i class="ki-outline ki-home text-gray-700 fs-6"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <i class="ki-outline ki-right fs-7 text-gray-700"></i>
                                </li>
                                <li class="breadcrumb-item fw-bold text-gray-700 mx-n1">
                                    {{ $toko->nama_toko }}
                                </li>
                                <li class="breadcrumb-item">
                                    <i class="ki-outline ki-right fs-7 text-gray-700"></i>
                                </li>
                                <li class="breadcrumb-item text-gray-500 lh-1 mx-n1">Produk
                                </li>
                            </ul>
                            <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-3 m-0"
                                id="nama-produk">
                                {{ $data->product_name }}
                            </h1>
                        </div>
                    </div>
                </div>
                <div id="kt_app_content" class="app-content flex-column-fluid">
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
                    <div class="card mb-5 mb-xxl-8">
                        <div class="card-body py-9">
                            <div class="row gx-9 h-100">
                                <div class="col-sm-4 mb-10 mb-sm-0">
                                    <div id="carousel-display" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            @if (!empty($productImages))
                                                @foreach ($productImages as $index => $gambar)
                                                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                        <a href="{{ url('/storage/uploads/products/images/' . $gambar->filename) }}"
                                                            class="glightbox">
                                                            <img src="{{ url('/storage/uploads/products/images/' . $gambar->filename) }}"
                                                                class="detail-produk-displayimg d-block w-100"
                                                                alt="...">
                                                        </a>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="carousel-item active">
                                                    <a href="{{ url('/storage/uploads/products/thumbnail/' . $data->thumbnail) }}"
                                                        class="glightbox">
                                                        <img src="{{ url('/storage/uploads/products/thumbnail/' . $data->thumbnail) }}"
                                                            class="detail-produk-displayimg d-block w-100" alt="">
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#carousel-display" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#carousel-display" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>

                                <div class="col-sm-8">
                                    <form action="{{ route('tambahkeranjangproses') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="produk_id" value="{{ $data->id }}">
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="pemesan" value="{{ Auth::user()->name }}">
                                        <input type="hidden" name="jenis" value="{{ $data->jenis }}">
                                        <input type="hidden" name="pembayaran" value="{{ $pembayaran }}">
                                        <input type="hidden" name="toko_id" value="{{ $toko->id }}">

                                        <div class="d-flex flex-column h-100">
                                            <div class="mb-5">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-4">
                                                            <span class="text-gray-800 fs-1 fw-bold"
                                                                id="nama-produk">{{ $data->product_name }}</span>
                                                        </div>
                                                        <div class="d-flex align-items-center flex-wrap d-grid gap-2">
                                                            <div class="d-flex align-items-center me-5 me-xl-13">
                                                                <div class="m-0">
                                                                    <p class="fw-bold text-gray-800 fs-6"
                                                                        id="jml-produk-disewakan">10
                                                                        <span
                                                                            class="fw-semibold text-gray-500 d-block fs-6">{{ $data->jenis }}</span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <div class="m-0">
                                                                    <p class="fw-bold text-gray-800 fs-6">
                                                                        <i class="ki-solid ki-abstract-23 text-warning"></i>
                                                                        5
                                                                        <span class="fw-semibold text-gray-500 d-block fs-6"
                                                                            id="jml-penilaian-produk">6 Penilaian</span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="fs-1 fw-bolder" id="harga-produk">
                                                            Rp{{ number_format($data->price, 2, ',', '.') }}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <a href="{{ route('detail-toko', $toko->id) }}"
                                                            class="card mt-3 px-3 py-3">
                                                            <div class="d-flex align-items-center gap-5">
                                                                <div class="symbol symbol-50px symbol-circle mb-5">
                                                                    <img src="{{ asset('storage/' . $toko->gambar_toko) }}"
                                                                        alt="image">
                                                                </div>
                                                                <div>
                                                                    <p class="fw-bold fs-5 pb-0 mb-2" id="nama-toko">
                                                                        {{ $toko->nama_toko }}</p>
                                                                    <div class="d-flex gap-10 mt-0 pb-0">
                                                                        <div>
                                                                            <p class="fw-bold text-gray-800 fs-6"
                                                                                id="total-penilaian-toko">
                                                                                <i
                                                                                    class="ki-solid ki-abstract-23 text"></i>
                                                                                4.5
                                                                                <span
                                                                                    class="fw-semibold text-gray-500 d-block fs-6">Total
                                                                                    Penilaian</span>
                                                                            </p>
                                                                        </div>
                                                                        <div>
                                                                            <p class="fw-bold text-gray-800 fs-6"
                                                                                id="jml-produk-toko">
                                                                                {{ $countProduk }}
                                                                                <span
                                                                                    class="fw-semibold text-gray-500 d-block fs-6">Produk</span>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="border-gray-300 border-bottom mb-5"></div>
                                            <div class="mb-2">
                                                <span class="fw-bold fs-5">Deskripsi produk</span>
                                            </div>
                                            <div class="mb-5">
                                                <p class="text-gray-500" id="deskripsi-produk">
                                                    {{ $data->description }}
                                                </p>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-5 mb-3">
                                                    <p class="fw-bold fs-5">Pilih Ukuran</p>
                                                    <select class="form-select" name="ukuran" aria-label="Pilih Ukuran"
                                                        id="ukuran-produk">
                                                        <option>Pilih Ukuran</option>
                                                        <option value="S">S</option>
                                                        <option value="M">M</option>
                                                        <option value="L">L</option>
                                                        <option value="X">XL</option>
                                                        <option value="XXL">XXL</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-3">
                                                    <p class="fw-bold fs-5">Kuantitas</p>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <button class="btn btn-secondary rounded-0" type="button"
                                                                id="button-minus">-</button>
                                                        </div>
                                                        <input type="number" class="form-control" name="kuantitas"
                                                            id="quantity-input" value="1" min="1">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-secondary rounded-0" type="button"
                                                                id="button-plus">+</button>
                                                        </div>
                                                        <p class="text-gray-500 mt-2" id="deskripsi-produk">
                                                            Stok: <span class="fw-bolder"
                                                                id="stok-produk">{{ $data->stock }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <button type="submit" class="col-2 btn btn-sm btn-dark my-4">
                                                        <i class="ki-outline ki-handcart fs-1"></i>
                                                        <span class="indicator-label">Keranjang</span>
                                                        <span class="indicator-progress">Memproses...
                                                            <span
                                                                class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                        </span>
                                                    </button>
                                                    <div class="col-6 d-flex my-4">
                                                        <a href="https://wa.me/{{ $data->user->nohp }}?text=Halo%20Admin,%20saya%20ingin%20bertanya%20tentang%20produk%20yang%20tersedia%20di%20toko%20Anda.%20Bisakah%20Anda%20membantu%20saya%20untuk%20memeriksa%20ketersediaan%20dan%20harga%20produk%20tersebut?%20Terima%20kasih."
                                                            class="btn btn-dark me-2" id="kirim-pesan-btn"
                                                            target="_blank">
                                                            <i class="text-success ki-solid ki-whatsapp fs-1">
                                                            </i>
                                                            <span class="indicator-label">Kirim Pesan</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
            <i class="ki-outline ki-arrow-up"></i>
        </div>

        <!--begin::Javascript-->
        <script>
            var hostUrl = "../assets/";
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
        <script src="../assets/js/glightbox.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4/dist/fancybox.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4/dist/fancybox.umd.js"></script>
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
        <!--end::Custom Javascript-->
        <!--end::Javascript-->
        </body>
        <!--end::Body-->

        </html>
    @endsection
