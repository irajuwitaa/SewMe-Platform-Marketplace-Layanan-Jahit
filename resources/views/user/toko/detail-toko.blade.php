@extends('template.main')
@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_toolbar" class="app-toolbar pt-7 pt-lg-10">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7">
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1 mx-n1">
                                <a href="../index.html" class="text-hover-primary">
                                    <i class="ki-outline ki-home text-gray-700 fs-6"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <i class="ki-outline ki-right fs-7 text-gray-700"></i>
                            </li>
                            <li class="breadcrumb-item text-gray-500 fw-bold lh-1 mx-n1">{{ $toko->nama_toko }}
                            </li>
                        </ul>
                        <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-3 m-0">
                            {{ $toko->nama_toko }}</h1>
                    </div>
                </div>
            </div>
            <div id="kt_app_content" class="app-content flex-column-fluid">
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
                                                <i
                                                    class="ki-outline ki-geolocation fs-4 me-1"></i>{{ $toko->alamat_toko }}</a>
                                        </div>
                                    </div>
                                    <div class="d-flex my-4">
                                        <a href="https://wa.me/{{ $toko->user->nohp }}?text=Halo%20Admin,%20saya%20ingin%20bertanya%20tentang%20produk%20yang%20tersedia%20di%20toko%20Anda.%20Bisakah%20Anda%20membantu%20saya%20untuk%20memeriksa%20ketersediaan%20dan%20harga%20produk%20tersebut?%20Terima%20kasih."
                                            class="btn btn-dark me-2" id="kirim-pesan-btn" target="_blank">
                                            <i class="text-success ki-solid ki-whatsapp fs-1">
                                            </i>
                                            <span class="indicator-label">Kirim Pesan</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap flex-stack">
                                    <div class="d-flex flex-column flex-grow-1 pe-8">
                                        <div class="d-flex flex-wrap">
                                            <div
                                                class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <i class="ki-solid ki-abstract-23 text-warning"></i>
                                                    <span></span>
                                                    <div class="fs-2 fw-bolder" id="total-penilaian-toko">4.5</div>
                                                </div>
                                                <div class="fw-semibold fs-6 text-gray-500">Total
                                                    Penilaian</div>
                                            </div>
                                            <div
                                                class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="fs-2 fw-bolder" id="jml-produk-toko">{{ count($products) }}
                                                    </div>
                                                </div>
                                                <div class="fw-semibold fs-6 text-gray-500">Produk</div>
                                            </div>
                                            <div
                                                class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="fs-2 fw-bolder" id="jam-kerja-toko">
                                                        {{ substr($toko->jam_buka, 0, 5) }} -
                                                        {{ substr($toko->jam_tutup, 0, 5) }}</div>
                                                </div>
                                                <div class="fw-semibold fs-6 text-gray-500">Jam Kerja
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                            <li class="nav-item mt-2">
                                <a class="nav-link text-active-dark ms-0 me-10 py-5 active" href="#">Semua Produk</a>
                            </li>
                            <li class="nav-item mt-2">
                                <a class="nav-link text-active-dark ms-0 me-10 py-5"
                                    href="detail-toko-populer.html">Populer</a>
                            </li>
                            <li class="nav-item mt-2">
                                <a class="nav-link text-active-dark ms-0 me-10 py-5"
                                    href="detail-toko-palingbanyak.html">Paling Banyak</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div id="carousel-toko" class="carousel slide position-relative mb-5 mb-xxl-12" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        @if ($banner && $banner->gambar_banner)
                            @foreach (json_decode($banner->gambar_banner) as $key => $gambar)
                                <button type="button" data-bs-target="#carousel-toko"
                                    data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"
                                    aria-current="{{ $key == 0 ? 'true' : 'false' }}"
                                    aria-label="Slide {{ $key + 1 }}"></button>
                            @endforeach
                        @endif
                    </div>
                    <div class="carousel-inner">
                        @if ($banner && $banner->gambar_banner)
                            @foreach (json_decode($banner->gambar_banner) as $key => $gambar)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <img src="{{ asset('storage/' . $gambar) }}" class="d-block w-100 carousel-image"
                                        alt="...">
                                </div>
                            @endforeach
                        @else
                            <div class="carousel-item active">
                                <img src="path/to/your/default/image.jpg" class="d-block w-100 carousel-image"
                                    alt="Default Image">
                            </div>
                        @endif
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel-toko"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel-toko"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>

                </div>

                <div class="row">

                    @foreach ($products as $product)
                        <div class="col-lg-2 col-md-6 col-6 mb-3">
                            <a href="{{ route('user.produk.detail-produk', ['id' => $product->id]) }}"
                                style="text-decoration: none; color: inherit;">
                                <div class="card mb-5 mb-xl-4" style="position: relative;">
                                    <div class="card-body pt-0 px-0 pb-0">
                                        <div class="mb-4">
                                            <img src="{{ url('storage/uploads/products/thumbnail/' . $product->thumbnail) }}"
                                                class="foto-produk-toko" id="foto-produk" alt="" />
                                        </div>
                                        <div class="col mb-3 px-5">
                                            <div>
                                                <span class="text-gray-800 fw-bold fs-4"
                                                    id="nama-produk">{{ $product->product_name }}</span>
                                                <span class="text-muted d-block fw-semibold"
                                                    id="deskripsi-produk">{{ $product->description }}</span>
                                            </div>
                                        </div>
                                        <div class="row px-5 mb-4">
                                            <div class="col">
                                                <div class="text-gray-800">
                                                    <span class="fs-4">Rp</span><span class="fw-bold fs-3 m-0"
                                                        id="harga-produk">{{ number_format($product->price, 2, ',', '.') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>

                <ul class="pagination">
                    <li class="page-item previous disabled"><a href="#" class="page-link"><i
                                class="previous"></i></a></li>
                    <li class="page-item active"><a href="#" class="page-link">1</a></li>
                    <li class="page-item "><a href="#" class="page-link">2</a></li>
                    <li class="page-item "><a href="#" class="page-link">3</a></li>
                    <li class="page-item "><a href="#" class="page-link">4</a></li>
                    <li class="page-item "><a href="#" class="page-link">5</a></li>
                    <li class="page-item "><a href="#" class="page-link">6</a></li>
                    <li class="page-item next"><a href="#" class="page-link"><i class="next"></i></a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="modal fade" id="modal-bannertoko" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-1000px">
                <div class="modal-content">
                    <div class="modal-header py-7 d-flex justify-content-between">
                        <h2>Atur Banner Toko</h2>
                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                            <i class="ki-outline ki-cross fs-1"></i>
                        </div>
                    </div>
                    <div class="modal-body scroll-y m-5">
                        <form id="kt_account_profile_details_form" class="form">
                            <div class="card-body">
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Unggah Foto
                                        Banner
                                        <span class="form-text"><br>Ukuran yang disarankan: 1200x600
                                            piksel</span></label>
                                    <div class="col-lg-8">
                                        <div class="image-input image-input-outline" data-kt-image-input="true"
                                            style="background-image: url('assets/media/svg/avatars/blank.svg')">
                                            <div class="image-input-wrapper w-250px h-125px">
                                            </div>
                                            <label
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                title="Ubah">
                                                <i class="ki-outline ki-pencil fs-7"></i>
                                                <input type="file" name="banner" accept=".png, .jpg, .jpeg" />
                                                <input type="hidden" name="avatar_remove" />
                                            </label>
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                title="Batalkan">
                                                <i class="ki-outline ki-cross fs-2"></i>
                                            </span>
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                title="Hapus">
                                                <i class="ki-outline ki-cross fs-2"></i>
                                            </span>
                                        </div>
                                        <div class="form-text">Format file yang diterima: png, jpg,
                                            jpeg.</div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end">
                        <button type="reset" class="btn btn-light btn-active-light-primary me-2"
                            data-bs-dismiss="modal">Batalkan</button>
                        <button class="btn btn-primary" id="">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</div>
</div>
</div>
</div>


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
<script src="https://cdn.amcharts.com/lib/5../index.js"></script>
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
<!--end::Custom Javascript-->
<!--end::Javascript-->
</body>
<!--end::Body-->

</html>
