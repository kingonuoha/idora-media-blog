@extends('layouts.idora_user')
    @section('title', "Idora Media | Our Services ")
    @section('content')
    <!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area bg-gray text-center shadow dark text-light bg-cover" style="background-image: url({{asset('user/assets/img/banner/2.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h1>Our Services</h1>
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
                        <li class="active">Services</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

   <!-- Star Services
    ============================================= -->
    <div class="services-content-area text-center carousel-shadow default-padding">
        <div class="container-full">
            <livewire:our-services-slide />

        </div>
    </div>
    <!-- End Services -->

    <!-- Star Faq
    ============================================= -->
    <div class="faq-area default-padding bg-gray">
        <div class="container">
            <div class="faq-items">
                <div class="row">

                    <div class="col-lg-6 info">
                        <h2>We Are Happy to Assist <br> You all Time Moment</h2>
                        <p>
                            Mirth his quick its set front enjoy hoped had there. Who connection imprudence middletons too but increasing celebrated principles joy. Herself too improve gay winding ask expense are compact.
                        </p>
                        <ul>
                            <li>Date Exchange</li>
                            <li>Content Managment</li>
                            <li>Workflow</li>
                            <li>Business Digital</li>
                        </ul>
                        <a class="btn btn-md btn-theme effect" href="#">Get Started</a>
                    </div>

                    <div class="col-lg-6">
                        <div class="faq-content">
                            <div class="accordion" id="accordionExample">
                                @foreach (getFAQ() as $item)
                                <div class="card">
                                    <div class="card-header" id="Label_{{$item->id}}">
                                        <h4 class="mb-0 collapsed" data-toggle="collapse" data-target="#Target_{{$item->id}}" aria-expanded="false" aria-controls="Target_{{$item->id}}">
                                              {{$item->question}}
                                        </h4>
                                    </div>

                                    <div id="Target_{{$item->id}}" class="collapse" aria-labelledby="Label_{{$item->id}}" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <p>
                                                {!! Str::ucfirst( $item->answer) !!}

                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- End Faq -->


   

  <!-- Star Testimonials
    ============================================= -->
    <livewire:user-testimonial />
    
    <!-- End Testimonials -->

    @endsection