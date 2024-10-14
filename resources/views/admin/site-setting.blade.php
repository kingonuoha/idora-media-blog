@extends('layouts.admin.admin-layout')
@section('title', "Idora Media Admin | Site Settings");
@section('content')

@livewire('account-banner')
<div class="card my-5">
    <div class="card-header card-header-stretch">
        <h3 class="card-title">Site Settings Form</h3>
        <div class="card-toolbar">
            <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_7">General Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_8">Social Mediia</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_9">Link 3</a>
                </li> --}}
            </ul>
        </div>
    </div>
    <div class="card-body">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="kt_tab_pane_7" role="tabpanel">
               @livewire('site-general-settings')
            </div>

            <div class="tab-pane fade" id="kt_tab_pane_8" role="tabpanel">
              @livewire('site-social-media-setting')
            </div>

            {{-- <div class="tab-pane fade" id="kt_tab_pane_9" role="tabpanel">
                ...
            </div> --}}
        </div>
    </div>
</div>

    
@endsection
