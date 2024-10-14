<div>

    @livewire('account-banner')
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header card-header-stretch pb-0">
            <!--begin::Title-->
            <div class="card-title">
                <h3 class="m-0">Total New Notifications ({{$user->unreadNotifications()->count()}})</h3>
            </div>
            <!--end::Title-->
            <!--begin::Toolbar-->
            <div class="card-toolbar m-0">
                <!--begin::Tab nav-->
                <ul class="nav nav-stretch nav-line-tabs border-transparent" role="tablist">
                    <!--begin::Tab item-->
                    <li class="nav-item" role="presentation">
                        <a id="kt_billing_creditcard_tab" class="nav-link fs-5 fw-bold me-5 active" data-bs-toggle="tab" role="tab" href="#kt_billing_creditcard" aria-selected="true">Notifications</a>
                    </li>
                    <!--end::Tab item-->
                    <!--begin::Tab item-->
                    <li class="nav-item" role="presentation">
                        <a id="kt_billing_paypal_tab" class="nav-link fs-5 fw-bold" data-bs-toggle="tab" role="tab" href="#kt_billing_paypal" aria-selected="false" tabindex="-1">Logs</a>
                    </li>
                    <!--end::Tab item-->
                </ul>
                <!--end::Tab nav-->
            </div>
            <!--end::Toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Tab content-->
        <div id="kt_billing_payment_tab_content" class="card-body tab-content">
            <div class="row g-2 my-5">
                <div class="col-lg-5">
                    <input type="text" class="form-control form-solid" placeholder="search notification" wire:model='search'>
                </div>
                <div class="col-lg-7 d-flex flex-end ">
                    <button class="btn btn-light-success mx-1" wire:click='markAllAsRead'>
                        {!! getIcon('check-square') !!}
                        Mark as Read</button>
                    <button class="btn btn-light-danger mx-1" wire:click='deleteAllNotifications'>
                        {!! getIcon('bin') !!}
                        Delete All</button>
                </div>
            </div>
            <!--begin::Tab panel-->
            <div id="kt_billing_creditcard" class="tab-pane fade show active" role="tabpanel" aria-labelledby="#kt_billing_creditcard_tab">
            @forelse ($notifications as $notification)
                <!--begin::Title-->
                <!--end::Title-->
                <div class="notice d-flex bg-light-{{$notification->data['type']}} rounded border-{{$notification->data['type']}} border border-dashed p-6">
                    <!--begin::Icon-->
                    <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                    <span class="svg-icon svg-icon-2tx svg-icon-{{$notification->data['type']}} me-4">
                        @if(isset($notification->data['icon']))
                            {!! $notification->data['icon'] !!}
                        @endif
                    </span>
                    <!--end::Svg Icon-->
                    <!--end::Icon-->
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                        <!--begin::Content-->
                        <div class="mb-3 mb-md-0 fw-semibold">
                            <h4 class="text-gray-900 fw-bold">{{$notification->data['title']}}</h4>
                            <div class="fs-6 text-gray-700 pe-7">{{$notification->data['desc']}}</div>
                            <span class="text-muted my-2">{{time_Ago($notification->created_at)}}</span>
                        </div>
                        <!--end::Content-->
                        <!--begin::Action-->
                        <a href="#" wire:click.prevent="deleteNotification('{{ $notification->id }}')" class="btn btn-{{$notification->data['type']}} px-6 align-self-center text-nowrap" >Delete</a>
                        <!--end::Action-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <div class="border-gray-300 border-bottom border-bottom-dashed my-5"></div>
            @empty
                
            @endforelse
            <div class="d-block mt-5">
                {{ $notifications->links('livewire::bootstrap')}}
            </div>
            </div>
            <!--end::Tab panel-->
            <!--begin::Tab panel-->
            <div id="kt_billing_paypal" class="tab-pane fade" role="tabpanel" aria-labelledby="kt_billing_paypal_tab">
                <!--begin::Title-->
                <h3 class="mb-5">All Logs</h3>
                <!--end::Title-->
                <!--begin::Description-->
                <div class="text-gray-600 fs-6 fw-semibold mb-5">Logs of all actions perfomed will be displayed here!</div>
                    <!--begin::Icon-->
                

                    @forelse ($logs as $log)
                          <!--end::Title-->
                <div class="notice d-flex bg-light-{{$log->type}} rounded border-{{$log->type}} border border-dashed p-6">
                    <!--begin::Icon-->
                    <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                    <span class="svg-icon svg-icon-2tx svg-icon-{{$log->type}} me-4">
                        @if(isset($log->data['icon']))
                            {!! $log->data['icon'] !!}
                        @endif
                    </span>
                    <!--end::Svg Icon-->
                    <!--end::Icon-->
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                        <!--begin::Content-->
                        <div class="mb-3 mb-md-0 fw-semibold">
                            <h4 class="text-gray-900 fw-bold">{{$log->type}}</h4>
                            <div class="fs-6 text-gray-700 pe-7">{{$log->message}}</div>
                            <span class="text-muted my-2">{{time_Ago($log->created_at)}}</span>
                        </div>
                        <!--end::Content-->
                        
                    </div>
                    <!--end::Wrapper-->
                </div>
                <div class="border-gray-300 border-bottom border-bottom-dashed my-5"></div>
                    @empty
                        <span class="text-danger bg-danger-light">No Logs Fpr Now</span>
                    @endforelse
            <!--end::Tab panel-->
        </div>
        <!--end::Tab content-->
    </div>
    @push('script')
    <script>
        window.addEventListener('notificationDelete:confirm', (e)=>{
            Swal.fire({
            title: e.detail.title,
            text: e.detail.message,
            icon: e.detail.type,
            showCancelButton: true,
            confirmButtonText: "Yeah Delete!",
            cancelButtonText: "Cancel",
            // customClass: {
            //     confirmButton: e.detail.confirmButtonClass,
            //     cancelButton: e.detail.cancelButtonClass
            //     },
            // buttonsStyling: false
            }).then((result)=>{
                if (result.isConfirmed) {
                    toastR('Processing Action...', 'info')
                    livewire.emit('notificationDeleteConfirmed');
                    }else{

                    }
                })
        });
        </script>
@endpush
</div>
