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
                        <li class="breadcrumb-item text-gray-500 mx-n1">Produk</li>
                    </ul>
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-3 m-0">
                        Edit Produk</h1>
                </div>
            </div>
        </div>
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
                <form action="/editprodukproses/{{ $product->id }}" method="POST" id="kt_ecommerce_add_product_form"
                    enctype="multipart/form-data" class="form d-flex flex-column flex-lg-row">
                    @csrf
                    @method('PUT')

                    {{-- <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <input type="text" name="product_name" /><br />
                <input type="text" name="description" /><br />
                <input type="number" name="price" /><br />
                <select id="status" name="status">
                    <option></option>
                    <option value="published">Publik</option>
                    <option value="unpublished">Tidak dipublik</option>
                </select>
                <input type="file" name="thumbnail" /><br />

                <button type="submit" value="Add">tambah</button> --}}
                    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Thumbnail Produk</h2>
                                </div>
                            </div>
                            <div class="card-body text-center pt-0">
                                <style>
                                    .image-input-placeholder {
                                        background-image: url('../assets/media/svg/files/blank-image.svg');
                                    }

                                    [data-bs-theme="dark"] .image-input-placeholder {
                                        background-image: url('../assets/media/svg/files/blank-image-dark.svg');
                                    }
                                </style>
                                <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                    data-kt-image-input="true">
                                    @if (isset($product->thumbnail) && !empty($product->thumbnail))
                                        <div class="image-input-wrapper w-150px h-150px"
                                            style="background-image:url(/storage/uploads/products/thumbnail/{{ $product->thumbnail }}) ">
                                        </div>
                                    @else
                                        <div class="image-input-wrapper w-150px h-150px">
                                        </div>
                                    @endif
                                    <label
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Ubah gambar">
                                        <i class="ki-outline ki-pencil fs-7"></i>
                                        <input type="file" name="thumbnail" accept=".png, .jpg, .jpeg" />
                                        <input type="hidden" name="avatar_remove" />
                                    </label>
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                        title="Cancel thumbnail">
                                        <i class="ki-outline ki-cross fs-2"></i>
                                    </span>
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                        title="Remove thumbnail">
                                        <i class="ki-outline ki-cross fs-2"></i>
                                    </span>
                                </div>
                                <div class="text-muted fs-7">Hanya menerima file bertipe *.png, *.jpg and *.jpeg</div>
                            </div>
                        </div>
                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Status</h2>
                                </div>
                                <div class="card-toolbar">
                                    <div class="rounded-circle bg-dark w-15px h-15px" id="kt_ecommerce_add_product_status">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <select class="form-select mb-2" data-control="select2" data-hide-search="true"
                                    data-placeholder="Select an option" id="kt_ecommerce_add_product_status_select"
                                    name="status">
                                    <option></option>
                                    @if ($product->status == 'published')
                                        <option value="published" selected="selected">Publik</option>
                                        <option value="unpublished">Tidak dipublik</option>
                                    @endif
                                    @if ($product->status == 'unpublished')
                                        <option value="published">Publik</option>
                                        <option value="unpublished" selected="selected">Tidak dipublik</option>
                                    @endif
                                </select>
                                <div class="text-muted fs-7">Atur status produk.</div>
                            </div>
                            <hr>
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Jenis Produk</h2>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <select class="form-select mb-2" data-control="select2" data-hide-search="true"
                                    data-placeholder="Select an option" id="jenisproduk" name="jenis">
                                    <option></option>
                                    @if ($product->jenis == 'sewa')
                                        <option value="sewa" selected="selected">Sewa</option>
                                        <option value="jahit">Jahit</option>
                                        <option value="beli">Beli</option>
                                    @endif
                                    @if ($product->jenis == 'jahit')
                                        <option value="sewa">Sewa</option>
                                        <option value="jahit" selected="selected">Jahit</option>
                                        <option value="beli">Beli</option>
                                    @endif
                                    @if ($product->jenis == 'beli')
                                        <option value="sewa">Sewa</option>
                                        <option value="jahit">Jahit</option>
                                        <option value="beli" selected="selected">Beli</option>
                                    @endif
                                </select>
                                <div class="text-muted fs-7">Atur jenis produk.</div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <div class="d-flex flex-column gap-7 gap-lg-10">
                            <div class="card card-flush py-4">
                                <div class="card-body">
                                    <div class="mb-10 fv-row">
                                        <label class="required form-label" for="product_name">Nama Produk</label>
                                        <input type="text" name="product_name"
                                            class="form-control form-control-solid mb-2" placeholder="Nama Produk"
                                            value="{{ $product->product_name }}" />
                                        <div class="text-muted fs-7">Nama produk harus unik.</div>
                                    </div>
                                    <div class="mb-10">
                                        <label for="description" class="form-label">Deskripsi</label>
                                        <textarea name="description" class="form-control form-control-solid" data-kt-autosize="true">{{ $product->description }}</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="fv-row">
                                                <label class="required form-label" for="price">Harga Produk</label>
                                                <div class="input-group mb-5">
                                                    <span class="input-group-text">Rp</span>
                                                    <input id="price" name="price" type="number"
                                                        class="form-control" value="{{ $product->price }}"
                                                        aria-label="Dalam bentuk Rupiah (Rp)" />
                                                    <span class="input-group-text">,00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="fv-row">
                                                <label class="required form-label" for="stock">Stok Produk</label>
                                                <div class="input-group mb-5">
                                                    <input id="stock" name="stock" type="number"
                                                        value="{{ $product->stock }}" class="form-control" />
                                                    <span class="input-group-text">pcs</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card card-flush py-4">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Foto Produk</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="fv-row mb-2">
                                        @if ($productImages->isNotEmpty())
                                            <div>
                                                @foreach ($productImages as $image)
                                                    <img src="{{ asset('/storage/uploads/products/images/' . $image->filename) }}"
                                                        alt="Product Image" width="100" class="mb-5">
                                                @endforeach
                                            </div>
                                        @endif
                                        <input type="file" id="product_image" name="product_images[]"
                                            class="form-control form-control-lg mb-2" multiple>
                                        <div class="text-muted fs-7">Anda dapat mengunggah maksimal 10 file.</div>

                                        {{-- <div class="dropzone" id="kt_ecommerce_add_product_media"
                                            name="product_images[]">
                                            <div class="dz-message needsclick">
                                                <i class="ki-outline ki-file-up text-primary fs-3x"></i>
                                                <div class="ms-4">
                                                    <h3 class="fs-5 fw-bold text-gray-900 mb-1">Unggah foto produk di sini.
                                                    </h3>
                                                    <span class="fs-7 fw-semibold text-gray-500">Unggah hingga 10
                                                        file</span>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="/produk-saya" id="kt_ecommerce_add_product_cancel"
                                class="btn btn-light me-5">Batalkan</a>
                            <button type="submit" class="btn btn-dark">
                                <span class="indicator-label">Edit</span>
                                <span class="indicator-progress">Harap tunggu...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endsection
