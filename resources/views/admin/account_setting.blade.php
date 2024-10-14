@extends('layouts.admin.admin-layout')
@section('title', "Idora Media Admin | ".Str::ucfirst($user->name). " | Account Overview");
@section('content')

{{-- Account Nav Card --}}
<x-IDM-admin-profile-nav />
{{-- End Account Nav Card --}}

<!--begin::details View-->
<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
    <!--begin::Card header-->
    <div class="card-header cursor-pointer">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bold m-0">Profile Details</h3>
        </div>
        <!--end::Card title-->
        <!--begin::Action-->
        <a href="{{route('edit_details')}}" class="btn btn-primary align-self-center">Edit Profile</a>
        <!--end::Action-->
    </div>
    <!--begin::Card header-->
    <!--begin::Card body-->
    <div class="card-body p-9">
        <!--begin::Row-->
        <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-semibold text-muted">Full Name</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <span class="fw-bold fs-6 text-gray-800">{{$user->name}}</span>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->
        <!--begin::Input group-->
        <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-semibold text-muted">Email</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <span class="fw-semibold text-gray-800 fs-6">{{$user->email}}</span>
               @if ($user->email_verified != null)
               <span class="badge badge-success">Verified</span>
               @else
               <span class="badge badge-danger">Not Verified</span>
               @endif
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-semibold text-muted">Contact Phone 
            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i></label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 d-flex align-items-center">
                <span class="fw-bold fs-6 text-gray-800 me-2">{{$user->email}}</span>
                {{-- <span class="badge badge-success">Verified</span> --}}
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-semibold text-muted">Occupation</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <a href="#" class="fw-semibold fs-6 text-gray-800 text-hover-primary">{{$user->occupation}}</a>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-semibold text-muted">About Me 
            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="About ({{$user->name}})"></i></label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <p class="fw-bold fs-6 text-gray-800">{{$user->about_me}}</p>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        
        <!--end::Input group-->
        <!--begin::Notice-->
        <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
            <!--begin::Icon-->
            <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
            <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                    <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor" />
                    <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
            <!--end::Icon-->
            {{-- <!--begin::Wrapper-->
            <div class="d-flex flex-stack flex-grow-1">
                <!--begin::Content-->
                <div class="fw-semibold">
                    <h4 class="text-gray-900 fw-bold">We need your attention!</h4>
                    <div class="fs-6 text-gray-700">Your payment was declined. To start using tools, please 
                    <a class="fw-bold" href="billing.html">Add Payment Method</a>.</div>
                </div>
                <!--end::Content-->
            </div>
            <!--end::Wrapper--> --}}
        </div>
        <!--end::Notice-->
    </div>
    <!--end::Card body-->
</div>
<!--end::details View-->
    
@endsection

