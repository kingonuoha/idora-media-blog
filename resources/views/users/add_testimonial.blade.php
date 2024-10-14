@extends('layouts.idora_user')
    @section('title', "Idora Media | Add Testimony ")
    @section('content')
          <!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area bg-gray text-center shadow dark text-light bg-cover" style="background-image: url({{asset('user/assets/img/banner/9.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h1>Add Testimonial</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{route('index')}}"><i class="fas fa-home"></i> Home</a></li>
                        <li class="active">About</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start About
    ============================================= -->
    <div class="about-area overflow-hidden default-padding">
        <div class="container">
            <div class="about-items">
             @livewire('add-testimonial')
            </div>
        </div>
    </div>
    @endsection