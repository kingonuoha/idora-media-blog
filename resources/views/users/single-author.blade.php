@extends('layouts.idora_user')
    @section('title', "Idora Media | Authors Page - ".$author->name)
    @section('content')


     <!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area bg-gray text-center shadow dark text-light bg-cover" style="background-image: url(
       @if ($author->profile_photo_updated_at == null)
                        {{asset('idora_img/profile/'.strtoupper(substr($author->name, 0, 1)).'.png')}}
                        @else
                        {{asset('storage/images/authors/'.$author->profile_photo_path)}}
                        @endif
        );">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h1>{{$author->name}}</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{route('index')}}"><i class="fas fa-home"></i> Home</a></li>
                        <li >Team</li>
                        <li class="active">Single</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Team Single Area
    ============================================= -->
    <div class="team-single-area default-padding">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-5 left-info">
                    <div class="thumb">
                        @if ($author->profile_photo_updated_at == null)
                        <img src="{{asset('idora_img/profile/'.strtoupper(substr($author->name, 0, 1)).'.png')}}" alt="Author">
                        @else
                        <img src="{{asset('storage/images/authors/'.$author->profile_photo_path)}}" alt="Author">
                        @endif
                        <div class="social">
                            <ul>
                                @if (!empty($author->facebook_url))
                                <li class="facebook">
                                    <a href="{{$author->facebook_url}}">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                @endif
                                @if (!empty($author->twitter_url))
                                <li class="twitter">
                                    <a href="{{$author->twitter_url}}">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                @endif
                                @if (!empty($author->youtube_url))
                                <li class="youtube">
                                    <a href="{{$author->youtube_url}}">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </li>
                                @endif
                                @if (!empty($author->instagram_url))
                                <li class="g-plus">
                                    <a href="{{$author->instagram_url}}">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                                @endif
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 right-info">
                    <h2>{{$author->name}}</h2>
                    <span>{{$author->occupation}}</span>
                    <p>
                       {{$author->about_me}}
                    </p>
                    <ul>
                        <li>
                            <strong>Email:</strong>
                            <a href="mailto:support@avedi.com">{{$author->email}}</a>
                        </li>
                        <li>
                            <strong>Phone:</strong>
                            <a href="tel:123-456-7890">{{$author->phone}}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="bottom-info">
                <div class="row">
                    <div class="col-lg-6">
                        <h2>About Member</h2>
                        <p>
                            {{$author->about_work}}
                        </p>
                    </div>
                    <div class="col-lg-6 about-area reverse">
                        <div class="info">
                            <div class="skill-items">
                                <!-- Progress Bar Start -->
                                <div class="progress-box">
                                    <h5>Digital Marketing</h5>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" data-width="{{$author->digital_marketing}}">
                                             <span>{{$author->digital_marketing}}%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress-box">
                                    <h5>Content Creation</h5>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" data-width="{{$author->content_creation}}">
                                            <span>{{$author->content_creation}}%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress-box">
                                    <h5>Bloging</h5>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" data-width="{{$author->bloging}}">
                                            <span>{{$author->bloging}}%</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Progressbar -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Team Single Area -->
@endsection