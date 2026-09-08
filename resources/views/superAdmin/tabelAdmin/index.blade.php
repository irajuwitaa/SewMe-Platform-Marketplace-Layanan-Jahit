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
                            <a href="index.html" class="text-hover-primary">
                                <i class="ki-outline ki-home text-gray-700 fs-6"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <i class="ki-outline ki-right fs-7 text-gray-700"></i>
                        </li>
                        <li class="breadcrumb-item text-gray-700 fw-bold lh-1 mx-n1">Super Admin</li>
                        <li class="breadcrumb-item">
                            <i class="ki-outline ki-right fs-7 text-gray-700"></i>
                        </li>
                    </ul>
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-3 m-0">
                        Tabel Admin</h1>
                </div>
            </div>
        </div>

        <!--start content-->
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_content" class="app-content flex-column-fluid">

                <div class="card card-flush">
                    <div class="card-header justify-content-end py-5 gap-2 gap-md-5">
                        <div class="card-title">
                            <div class="d-flex align-items-center position-relative my-1">
                                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <input type="text" table-search="search"
                                    class="form-control form-control-solid w-250px ps-12" placeholder="Cari..." />
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="table">
                                <thead class="fw-bold fs-7 text-uppercase text-gray-900 text-nowrap bg-gray-100">
                                    <tr>
                                        <th class="text-center px-3">No.</th>
                                        <th class="pe-3 min-w-125px">Username</th>
                                        <th class="pe-3 min-w-150px">Email</th>
                                        <th class="pe-3 min-w-150px">No.Telp</th>
                                        {{-- <th class="text-center pe-3">Aksi</th> --}}
                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-700">
                                    <?php $no = 1; ?>

                                    @foreach ($admins as $admin)
                                        <tr>
                                            <td class="text-center">{{ $no++ }}</td>
                                            <td>{{ $admin->name }}</td>
                                            <td>{{ $admin->email }}</td>
                                            <td>{{ $admin->nohp }}</td>
                                            {{-- <td class="text-center text-nowrap">
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
                                            </td> --}}
                                        </tr>
                                    @endforeach

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
