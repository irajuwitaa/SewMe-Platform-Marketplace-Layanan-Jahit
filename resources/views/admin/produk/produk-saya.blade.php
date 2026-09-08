@extends('template.main')
@section('content')
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
                            <a href="..{{ '/dashboard-' . strtolower(getUserRole()->name) }}" class="text-hover-primary">
                                <i class="ki-outline ki-home text-gray-700 fs-6"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <i class="ki-outline ki-right fs-7 text-gray-700"></i>
                        </li>
                        <li class="breadcrumb-item text-gray-700 fw-bold lh-1 mx-n1">Admin</li>
                        <li class="breadcrumb-item">
                            <i class="ki-outline ki-right fs-7 text-gray-700"></i>
                        </li>
                        <li class="breadcrumb-item text-gray-500 mx-n1">Produk Saya</li>
                    </ul>
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-3 m-0">
                        Tabel Produk Saya</h1>
                </div>
            </div>
        </div>

        <!--start content-->
        <div class="d-flex flex-column flex-column-fluid">
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
                <div class="card card-flush">
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <div class="card-title">
                            <div class="d-flex align-items-center position-relative my-1">
                                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <input type="text" table-search="search"
                                    class="form-control form-control-solid w-250px ps-12" placeholder="Cari..." />
                            </div>
                            <div id="table-export" class="d-none"></div>
                        </div>
                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                            <a href="/tambah-produk-admin" class="btn btn-dark">
                                <i class="ki-duotone ki-plus fs-2"></i>Tambah Data</a>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="table">
                                <thead class="fw-bold fs-7 text-uppercase text-gray-900 text-nowrap bg-gray-100">
                                    <tr>
                                        <th class="text-center px-3">No.</th>
                                        <th class="pe-3 min-w-125px">Produk</th>
                                        <th class="pe-3 min-w-150px">Harga</th>
                                        <th class="pe-3 min-w-500px">Deskripsi</th>
                                        <th class="pe-3">Status</th>
                                        <th class="pe-3 min-w-75px text-center">Jenis</th>
                                        <th class="pe-3 min-w-75px text-center">Stok</th>
                                        <th class="text-center pe-3">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-700">
                                    <?php $no = 1; ?>

                                    @foreach ($products as $product)
                                        <tr>
                                            <td class="text-center">{{ $no++ }}</td>
                                            <td class="text-center">
                                                <div class="d-flex align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <a class="d-block overlay me-3" data-fslightbox="lightbox-basic"
                                                            href="storage/uploads/products/thumbnail/{{ $product->thumbnail }}">
                                                            <div class="symbol symbol-50px">
                                                                {{-- @dd(Storage::url($product->thumbnail)) --}}
                                                                <img
                                                                    src="{{ url('storage/uploads/products/thumbnail/' . $product->thumbnail) }}">
                                                            </div>
                                                            <div
                                                                class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                                                <i class="bi bi-eye-fill text-white"></i>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <p class="text-nowrap">{{ $product->product_name }}</p>
                                                </div>
                                            </td>
                                            <td>{{ number_format($product->price, 2, ',', '.') }}</td>
                                            <td>{{ $product->description }}
                                            </td>
                                            <td class="text-center">
                                                @if ($product->status == 'published')
                                                    <div class="badge badge-dark text-white">{{ $product->status }}</div>
                                                @endif
                                                @if ($product->status == 'unpublished')
                                                    <div class="badge badge-light-danger">{{ $product->status }}</div>
                                                @endif
                                            </td>
                                            <td>{{ $product->jenis }}</td>
                                            <td class="text-nowrap">{{ $product->stock }} <span
                                                    class="text-muted">pcs</span></td>
                                            <td class="text-end text-nowrap">
                                                <a href="/edit-produk-admin/{{ $product->id }}"
                                                    class="btn btn-icon btn btn-outline btn-outline-primary btn-active-light-primary btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
                                                    <i class="ki-duotone ki-pencil fs-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </a>
                                                <a onclick="return confirm('Anda yakin mau menghapus data ini?')"
                                                    href="/hapus-produk-admin/{{ $product->id }}"
                                                    class="btn btn-icon btn btn-outline btn-outline-danger btn-active-light-danger btn-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus">
                                                    <i class="ki-duotone ki-trash fs-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                        <span class="path5"></span>
                                                    </i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{-- <tr>
                                        <td class="text-center">2.</td>
                                        <td class="text-center">
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <a class="d-block overlay me-3" data-fslightbox="lightbox-basic"
                                                        href="../assets/media/stock/900x600/23.jpg">
                                                        <div class="symbol symbol-50px">
                                                            <img src="../assets/media/stock/900x600/23.jpg">
                                                        </div>
                                                        <div
                                                            class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                                            <i class="bi bi-eye-fill text-white"></i>
                                                        </div>
                                                    </a>
                                                </div>
                                                <p class="text-nowrap">Batik Biru</p>
                                            </div>
                                        </td>
                                        <td>Rp. 50.000,00</td>
                                        <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nostrum, excepturi
                                            explicabo pariatur ex possimus voluptates quisquam corrupti natus nesciunt quia.
                                        </td>
                                        <td class="text-center">
                                            <div class="badge badge-dark text-white">Aktif</div>
                                        </td>
                                        <td class="text-end text-nowrap">
                                            <a href="tambah-produk-admin.html"
                                                class="btn btn-icon btn btn-outline btn-outline-primary btn-active-light-primary btn-sm"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
                                                <i class="ki-duotone ki-pencil fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </a>
                                            <button
                                                class="btn btn-icon btn btn-outline btn-outline-danger btn-active-light-danger btn-sm"
                                                data-kt-permissions-table-filter="delete_row" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="Hapus">
                                                <i class="ki-duotone ki-trash fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                    <span class="path5"></span>
                                                </i>
                                            </button>
                                        </td>
                                    </tr> --}}
                                </tbody>
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                </div>
            </div>
        </div>
        <!--end content-->
    @endsection
