@extends('layouts.idora_user')
    @section('title', "Idora Media | About Us ")
    @section('content')
          <!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area bg-gray text-center shadow dark text-light bg-cover" style="background-image: url({{asset('user/assets/img/banner/9.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h1>About Us</h1>
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
                <div class="row align-center">

                    <!-- Thumb -->
                    <div class="col-lg-6">
                        <div class="thumb">
                            <img src="{{asset('user/assets/img/about/5.jpg')}}" alt="Thumb">
                        </div>
                    </div>
                    <!-- End Thumb -->

                    <div class="col-lg-6">
                        <div class="content">
                            <h4>About Us</h4>
                            <h2>We serve Digital Marketing solutions</h2>
                            <p>
                                Welcome to our digital marketing agency! We are a team of experienced digital marketers who are passionate about helping businesses grow and succeed in the online world.
                                Our agency was founded with the mission of providing top-notch digital marketing services to businesses of all sizes. We understand the challenges that businesses face in the ever-evolving digital landscape, and we are dedicated to providing effective solutions that help our clients achieve their goals.

                            </p>
                            <div class="content-inner">
                                <a href="https://www.youtube.com/watch?v=owhuBrGIOsE" class="popup-youtube theme video-play-button item-center">
                                    <i class="fa fa-play"></i>
                                </a>
                                <div class="row align-center">
                                    <div class="col-lg-6">
                                        <ul>
                                            <li>Fresh ideas</li>
                                            <li>Unique Administration</li>
                                            <li>Skilled Practitioners</li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6">
                                        <h2>100% <span>Guranteed</span></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- End About -->

    <!-- Star Achivement
    ============================================= -->
    <div class="achivement-area default-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 heading-side">
                    <h5>Experts in field</h5>
                    <h2>Unique Solutions for Your Business </h2>
                    <p>
                        At our agency, we believe in a personalized approach to digital marketing. We take the time to understand each of our clients' unique needs and goals, and we tailor our strategies and services accordingly. We work closely with our clients to develop custom digital marketing plans that deliver measurable results.
                    </p>
                </div>
                <div class="col-lg-6 right-content">
                    <div class="skill-items">
                        <!-- Progress Bar Start -->
                        <div class="progress-box">
                            <h5>Marketing</h5>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" data-width="88">
                                    <span>88%</span>
                                </div>
                            </div>
                        </div>
                        <div class="progress-box">
                            <h5>Social Assistant</h5>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" data-width="95">
                                    <span>95%</span>
                                </div>
                            </div>
                        </div>
                        <div class="progress-box">
                            <h5>Consulting</h5>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" data-width="80">
                                    <span>80%</span>
                                </div>
                            </div>
                        </div>
                        <!-- End Progressbar -->
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- End Achivement Area -->

    <!-- Star Brand Area
    ============================================= -->
    <div class="brand-area bg-gray text-light my-5">
        <!-- Fixed Shape -->
        <div class="fixed-shape">
            <img src="{{asset('user/assets/img/shape/11.png')}}" alt="Shape">
        </div>
        <!-- Fixed Shape -->
        <div class="container">
            <div class="brand-items">
                <div class="row align-center">
                    <div class="col-lg-6 info">
                        <h2>Since Inception we've worked for 30+ Worldwide clients</h2>
                        <p>
                            We are committed to transparency and accountability in everything we do. We provide regular reporting and analysis to our clients, so they can see the impact of our work and make informed decisions about their digital marketing strategies.
                        </p>
                        <a href="about-us.html" class="btn-animation light border">See All Brand<i class="arrow_right"></i></a>
                    </div>
                    <div class="col-lg-6 brand">
                        <div class="row">
                            <div class="col-lg-4"><img src="{{asset('user/assets/img/clients/01.png')}}" alt="Brand"></div>
                            <div class="col-lg-4"><img src="{{asset('user/assets/img/clients/02.png')}}" alt="Brand"></div>
                            <div class="col-lg-4"><img src="{{asset('user/assets/img/clients/03.png')}}" alt="Brand"></div>
                            <div class="col-lg-4"><img src="{{asset('user/assets/img/clients/04.png')}}" alt="Brand"></div>
                            <div class="col-lg-4"><img src="{{asset('user/assets/img/clients/05.png')}}" alt="Brand"></div>
                            <div class="col-lg-4"><img src="{{asset('user/assets/img/clients/06.png')}}" alt="Brand"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Brand Area -->

  
            {{-- ===========================
                Removed Sections 
                ========================--}}


        {{-- <x-IDM-Removed-sections /> --}}
   

{{-- ===========================
              End  Removed Sections 
                ========================--}}
    <!-- End Team -->
    @endsection