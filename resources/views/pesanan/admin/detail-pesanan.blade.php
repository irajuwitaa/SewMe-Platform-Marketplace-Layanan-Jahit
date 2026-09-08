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
                    <li class="breadcrumb-item text-gray-700 fw-bold lh-1 mx-n1">Admin</li>
                    <li class="breadcrumb-item">
                        <i class="ki-outline ki-right fs-7 text-gray-700"></i>
                    </li>
                    <li class="breadcrumb-item text-gray-500 mx-n1">Pesanan</li>
                </ul>
                <!--begin::Title-->
                <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-3 m-0">Detail Pesanan</h1>
            </div>
        </div>
    </div>

    <!--start content-->
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_content" class="app-content flex-column-fluid">

            <div class="form d-flex flex-column flex-lg-row">
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-500px mb-7 me-lg-10">
                    
                    <div class="card card-flush">
                        <div class="card-body mb-0 pb-0">
                            <div class="row mb-3">
                                <h4 class="text-gray-800 fw-bold">Pemesan</h4>
                                <p class="text-gray-700 fw-semibold pt-0 mt-0">
                                    <i class="ki-duotone ki-user me-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    {{ $detail->pemesan }}
                                </p>
                            </div>
                            {{-- <div class="row mb-3">
                                <h4 class="text-gray-800 fw-bold">Jadwal Temu</h4>
                                <p class="text-gray-700 fw-semibold pt-0 mt-0 pb-1 mb-0">
                                    <i class="me-1 ki-duotone ki-geolocation">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    Jl. Kauman 20, Klojen, Kota Malang
                                </p>
                                <p class="text-gray-700 fw-semibold pt-0 mt-0">
                                    3 Mei 2024, 13:00 WIB
                                </p>
                            </div> --}}
                            <div class="row">
                                <h4 class="text-gray-800 fw-semibold">Pesan dari pelanggan:</h4>
                                <div class="px-3">
                                    <textarea class="form-control form-control form-control-solid" rows="6" data-kt-autosize="true" readonly>{{ $detail->catatan }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            {{-- <button class="btn btn-dark float-end">
                                Chat Pelanggan
                                <i class="ki-duotone ki-double-right ms-2 fs-5">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </button> --}}
                        </div>
                    </div>
                    <div class="card card-flush">
                        <form action="/edit-tanggal/{{ $detail->id }}" method="POST">
                            @csrf
                            <div class="card-body mb-0 pb-0">
                                <div class="row mb-3">
                                    <h2>Perikiraan Selesai</h2>
                                </div>
                                <div class="row">
                                    <div class="px-3">
                                        <input type="date" class="form-control form-control form-control-solid" rows="6" data-kt-autosize="true" name="selesai_tanggal" value="{{ $detail->selesai_tanggal }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-dark float-end">Tetapkan Tanggal</button>
                            </div>
                        </form>
                    </div>

                    {{-- <div class="card card-border mb-lg-10">
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
                                        <input type="text" class="form-control form-control-solid" readonly placeholder="Lingkar Dada" aria-label="Lingkar Dada" name="lingkardada" aria-describedby="basic-addon2" value="90"/>
                                        <span class="input-group-text border-0" id="basic-addon2">cm</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="lebarbahu">Lebar Bahu</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-solid" readonly placeholder="Lebar Bahu" aria-label="Lebar Bahu" name="lebarbahu" aria-describedby="basic-addon2" value="90"/>
                                        <span class="input-group-text border-0" id="basic-addon2">cm</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label" for="lingkarpinggang">Lingkar Pinggang</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-solid" readonly placeholder="Lingkar Pinggang" aria-label="Lingkar Pinggang" name="lingkarpinggang" aria-describedby="basic-addon2" value="90"/>
                                        <span class="input-group-text border-0" id="basic-addon2">cm</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="lingkarpinggul">Lingkar Pinggul</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-solid" readonly placeholder="Lingkar Pinggul" aria-label="Lingkar Pinggul" name="lingkarpinggul" aria-describedby="basic-addon2" value="90"/>
                                        <span class="input-group-text border-0" id="basic-addon2">cm</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label" for="panjangbaju">Panjang Baju</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-solid" readonly placeholder="Panjang Baju" aria-label="Panjang Baju" name="panjangbaju" aria-describedby="basic-addon2" value="90"/>
                                        <span class="input-group-text border-0" id="basic-addon2">cm</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="panjanglengan">Panjang Lengan</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-solid" readonly placeholder="Panjang Lengan" aria-label="Panjang Lengan" name="panjanglengan" aria-describedby="basic-addon2" value="90"/>
                                        <span class="input-group-text border-0" id="basic-addon2">cm</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label" for="lingkarlengan">Lingkar Lengan</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-solid" readonly placeholder="Lingkar Lengan" aria-label="Lingkar Lengan" name="lingkarlengan" aria-describedby="basic-addon2" value="90"/>
                                        <span class="input-group-text border-0" id="basic-addon2">cm</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="lingkarinseam">Lingkar Inseam</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-solid" readonly placeholder="Lingkar Inseam" aria-label="Lingkar Inseam" name="lingkarinseam" aria-describedby="basic-addon2" value="90"/>
                                        <span class="input-group-text border-0" id="basic-addon2">cm</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label" for="panjangcelana">Panjang Celana</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-solid" readonly placeholder="Panjang Celana" aria-label="Panjang Celana" name="panjangcelana" aria-describedby="basic-addon2" value="90"/>
                                        <span class="input-group-text border-0" id="basic-addon2">cm</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="lingkarpergelangan">Lingkar Pergelangan Tangan</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-solid" readonly placeholder="Lingkar Pergelangan Tangan" aria-label="Lingkar Pergelangan Tangan" name="lingkarpergelangan" aria-describedby="basic-addon2" value="90"/>
                                        <span class="input-group-text border-0" id="basic-addon2">cm</span>
                                    </div>
                                    <span class="text-muted pt-5">Untuk lengan panjang.</span>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                

                </div>
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10  me-lg-10">
                    <div class="card card-border">
                        <div class="card-header">
                            <h3 class="card-title">Ringkasan Pesanan</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5"id="table">
                                    <thead  class="fw-bold fs-7 text-uppercase text-gray-900 text-nowrap">
                                        <tr class="text-uppercase">
                                            <th class="pe-3">Pesanan</th>
                                            <th class="pe-3 text-start">Harga</th>
                                            <th class="pe-3 text-start">Sub total</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-semibold text-gray-700">
                                        <tr>
                                            <td class="text-center">
                                                <div class="d-flex align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <a class="d-block overlay me-3" data-fslightbox="lightbox-basic" href="{{ asset('storage/uploads/products/thumbnail/' . $detail->produk->thumbnail) }}">
                                                            <div class="symbol symbol-50px">
                                                                <img src="{{ asset('storage/uploads/products/thumbnail/' . $detail->produk->thumbnail) }}">
                                                            </div>
                                                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                                                <i class="bi bi-eye-fill text-white"></i>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="row text-start">
                                                        <p class="text-nowrap pb-0 mb-0">{{ $detail->produk->product_name }}</p>
                                                        <p class="pt-0 mt-0  pb-0 mb-0"><i class="ki-duotone ki-cross text-primary">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            </i> {{ $detail->kuantitas }} <span class="ms-2 text-primary">size: {{ $detail->ukuran }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row text-start">
                                                    <p class="text-nowrap pb-0 mb-0">Rp. {{ $detail->produk->price }}</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row text-start">
                                                    <p class="text-nowrap pb-0 mb-0">Rp. {{ $detail->produk->price * $detail->kuantitas }}</p>
                                                </div>
                                            </td>
                                        </tr>
                                        {{-- <tr>
                                            <td class="text-center">
                                                <div class="d-flex align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <a class="d-block overlay me-3" data-fslightbox="lightbox-basic" href="../assets/media/stock/900x600/23.jpg">
                                                            <div class="symbol symbol-50px">
                                                                <img src="../assets/media/stock/900x600/23.jpg">
                                                            </div>
                                                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                                                <i class="bi bi-eye-fill text-white"></i>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="row text-start">
                                                        <p class="text-nowrap pb-0 mb-0">Batik Biru</p>
                                                        <p class="pt-0 mt-0  pb-0 mb-0"><i class="ki-duotone ki-cross text-primary">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            </i> 15 <span class="ms-2 text-primary">size: xl</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row text-start">
                                                    <p class="text-nowrap b-0 mb-0">Rp. 50.000,00</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row text-start">
                                                    <p class="text-nowrap b-0 mb-0">Rp. 50.000,00</p>
                                                </div>
                                            </td>
                                        </tr> --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card card-border">
                        <div class="card-header">
                            <div class="d-flex justify-content-start align-items-center text-uppercase">
                                @if($detail->pembayaran >= $detail->produk->price)
                                    <i class="ki-duotone ki-information fs-2hx me-4 text-success"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                    <!--begin::Content-->
                                    <div class="d-flex flex-column pe-0 pe-sm-10">
                                        <h5 class="mb-1">
                                            
                                                LUNAS
                                            
                                        </h5>
                                    </div>
                                @else
                                    <i class="ki-duotone ki-information fs-2hx me-4 text-danger"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                    <!--begin::Content-->
                                    <div class="d-flex flex-column pe-0 pe-sm-10">
                                        <h5 class="mb-1">
                                            
                                                BELUM LUNAS
                                            
                                        </h5>
                                    </div>
                                @endif

                                <!--end::Content-->
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="d-flex justify-content-between text-uppercase">
                                    <h5 class="text-gray-600">total:</h5>
                                    <h5 class="text-gray-600">Rp. {{ $detail->produk->price * $detail->kuantitas }}</h5>
                                </div>
                                {{-- <div class="d-flex justify-content-between text-uppercase">
                                    <h5 class="text-gray-800 fw-bold">dp awal:</h5>
                                    <h5 class="text-gray-800 fw-bold">Rp. 50.000,00</h5>
                                </div> --}}
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="d-flex justify-content-between text-uppercase">
                                    <h5 class="text-gray-900 fw-bold">Dibayar oleh pelanggan: {{ $detail->user->name }}</h5>
                                    <h5 class="text-gray-900 fw-bold">Rp. {{ $detail->pembayaran }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-flush">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Status Pesanan</h2>
                            </div>
                            <div class="card-toolbar">
                                <div class="rounded-circle bg-dark w-15px h-15px" id="kt_ecommerce_add_product_status"></div>
                            </div>
                        </div>
                        <form action="/edit-status/{{ $detail->id }}" method="post">
                            @csrf
                            <div class="card-body pt-0">
                                <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Select an option" id="statuspesanan" name="status">
                                    <option></option>
                                    <option value="1" {{ $detail->status == 1 ? 'selected' : '' }}>Belum di proses</option>
                                    <option value="2" {{ $detail->status == 2 ? 'selected' : '' }}>Dalam Proses</option>
                                    <option value="3" {{ $detail->status == 3 ? 'selected' : '' }}>Selesai</option>
                                </select>
                                <div class="text-muted fs-7">Atur status pesanan.</div>
                            </div>
                            <div class="card-footer pt-0">
                                {{-- <button type="submit">submit</button> --}}
                                <button type="submit" class="btn btn-dark float-end mb-5 mt-5 ">Perbarui Status Pesanan</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end content-->

@endsection
