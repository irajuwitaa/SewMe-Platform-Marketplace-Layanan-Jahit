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
                    <li class="breadcrumb-item text-gray-700 fw-bold lh-1 mx-n1">Chat</li>
                </ul>
                <!--begin::Title-->
                <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-3 m-0">
                    Chat</h1>
            </div>
        </div>
    </div>

    <div class="flex-column flex-lg-row-auto mb-10 mt-7">
        <div class="card card-flush">
            <div class="card-header pt-7" id="kt_chat_contacts_header">
                <form class="w-100 position-relative" autocomplete="off">
                    <i class="ki-duotone ki-magnifier fs-3 text-gray-500 position-absolute top-50 ms-5 translate-middle-y">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    <input type="text" class="form-control form-control-solid px-13" name="search" value=""
                        placeholder="Search..." />
                </form>
            </div>
            <div class="card-body pt-5" id="kt_chat_contacts_body">
                <div class="scroll-y me-n5 pe-5 h-350px h-lg-auto" data-kt-scroll="true"
                    data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                    data-kt-scroll-dependencies="#kt_header, #kt_app_header, #kt_toolbar, #kt_app_toolbar, #kt_footer, #kt_app_footer, #kt_chat_contacts_header"
                    data-kt-scroll-wrappers="#kt_content, #kt_app_content, #kt_chat_contacts_body"
                    data-kt-scroll-offset="5px">
                    @foreach ($users as $user)
                    @php
                        $latestMessageInfo = $latestMessages->get($user->id);
                        $latestMessage = $latestMessageInfo['latest_message'];
                        $unreadMessagesCount = $latestMessageInfo['unread_count'];
                    @endphp
                    <div class="d-flex flex-stack py-4">
                        <div class="d-flex align-items-center"
                            style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                            <div class="symbol symbol-45px symbol-circle">
                                <img alt="{{ $user->name }}" src="{{ asset('storage/avatar/' . $user->avatar) }}" />
                            </div>
                            <div class="ms-5">
                                <a href="{{ route('chat', $user) }}" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">{{ $user->name }}</a>
                                @if ($latestMessage)
                                    <div class="fw-semibold text-muted">{{ $latestMessage->message }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="d-flex flex-column align-items-end ms-2 w-100 w-md-50">
                            @if ($latestMessage)
                                <span class="text-muted fs-7 mb-1">{{ $latestMessage->created_at->diffForHumans() }}</span>
                                <span class="badge badge-sm badge-circle badge-light-warning">{{ $unreadMessagesCount }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="separator separator-dashed"></div>
                @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
