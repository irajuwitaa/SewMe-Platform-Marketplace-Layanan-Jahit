
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
                        <a href="{{ route('dashboard-' . strtolower(getUserRole()->name)) }}" class="text-hover-primary">
                            <i class="ki-outline ki-home text-gray-700 fs-6"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <i class="ki-outline ki-right fs-7 text-gray-700"></i>
                    </li>
                    <li class="breadcrumb-item text-gray-700 fw-bold lh-1 mx-n1">Chat</li>
                </ul>
                <!--begin::Title-->
                <h1
                    class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-3 m-0">
                    Chat</h1>
            </div>
        </div>
    </div>

    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div class="flex-lg-row-fluid mb-10">
                <div>
                    <div wire:poll>
                        <div class="card" id="kt_chat_messenger">
                            <div class="card-header" id="kt_chat_messenger_header">
                                <div class="card-title">
                                    <div class="d-flex justify-content-center flex-column me-3">
                                        <div class="fs-4 fw-bold text-gray-900 text-hover-primary me-1 mb-2 lh-1">
                                            {{ $user->name }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="scroll-y me-n5 pe-5 h-350px h-lg-auto" data-kt-element="messages" data-kt-scroll="true"
                                    data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                                    data-kt-scroll-dependencies="#kt_header, #kt_app_header, #kt_app_toolbar, #kt_toolbar, #kt_footer, #kt_app_footer, #kt_chat_messenger_header, #kt_chat_messenger_footer"
                                    data-kt-scroll-wrappers="#kt_content, #kt_app_content, #kt_chat_messenger_body"
                                    data-kt-scroll-offset="5px">
                                    @foreach ($messages as $message)
                                        <div class="d-flex justify-content-{{ $message->from_user_id == auth()->id() ? 'end' : 'start' }} mb-10">
                                            <div class="d-flex flex-column align-items-{{ $message->from_user_id == auth()->id() ? 'end' : 'start' }}">
                                                <div class="d-flex align-items-center mb-2">
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        @if ($message->from_user_id == auth()->id())
                                                            <img alt="{{ $message->fromUser->name }}" src="{{ asset('storage/avatar/' . $message->fromUser->avatar) }}" />
                                                        @else
                                                            <img alt="{{ $message->fromUser->name }}" src="{{ asset('storage/avatar/' . $message->fromUser->avatar) }}" />
                                                        @endif
                                                    </div>
                                                    <div class="ms-3">
                                                        <div class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">{{ $message->fromUser->name }}</div>
                                                        <span class="text-muted fs-7 mb-1">{{ $message->created_at->diffForHumans() }}</span>
                                                    </div>
                                                </div>
                                                <div class="p-5 rounded bg-light-info text-gray-900 fw-semibold mw-lg-400px text-start"
                                                data-kt-element="message-text">{{ $message->message }}</div>
                                                <span class="text-muted fs-7 mt-1 ms-1">
                                                    @if ($message->read_at)
                                                        Read
                                                    @else
                                                        Delivered
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <form wire:submit.prevent="sendMessage">
                                <div class="card-footer pt-4" id="kt_chat_messenger_footer">
                                    <textarea class="form-control form-control-flush mb-3" rows="1" wire:model="message" data-kt-element="input"
                                        placeholder="Type a message"></textarea>
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-primary" type="submit" data-kt-element="send">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

