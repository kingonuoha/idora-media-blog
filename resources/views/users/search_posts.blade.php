@extends('layouts.idora_user')
    @section('title', isset($pageTitle) ?  $pageTitle : "Idora Media | Categories")
    @section('content')

       <!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area bg-gray text-center shadow dark text-light bg-cover" style="background-image: url({{asset('user/assets/img/banner/12.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h1>Blog</h1>
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
                        <li class="active">Search</li>
                        <li class="active">{{$pageTitle}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Blog
    ============================================= -->
    <div class="blog-area full-blog default-padding">
        <div class="container">
            <div class="blog-items">
                <div class="blog-content">
                    <div class="blog-item-box">
                        <div class="row">
                            @forelse ($posts as $item)
                                
                          
                            <!-- Single Item -->
                            <div class="col-lg-4 col-md-6 single-item">
                                <div class="item">
                                    <div class="thumb">
                                        <img src="{{asset('storage/images/post_images/thumbnails/resized_'.$item->featured_image)}}" alt="Thumb">
                                        <div class="date">{{date_formatter($item->created_at)}}</div>
                                    </div>
                                    <div class="info">
                                        <h4>
                                            <a href="{{route('read_post', $item->post_slug)}}">{{$item->post_title}}</a>
                                        </h4>
                                        <div class="footer-meta">
                                            <ul>
                                                <li>
                                                  @if ($item->author->profile_photo_updated_at == null)
                                                  <img src="{{asset('idora_img/profile/'.strtoupper(substr($item->author->name, 0, 1)).'.png')}}" alt="Author">
                                                  @else
                                                  <img src="{{asset("idora_img/profile/".strtoupper(substr($item->author->name, 0, 1)).".png")}}" alt="Author">
                                                  @endif
                                                    <span>By </span>
                                                    <a href="#">{{$item->author->name}}</a>
                                                </li>
                                               
                                            </ul>
                                         </div>
                                        <p>
                                            {!! Str::ucfirst(words($item->post_content), 15) !!}
                                        </p>
                                        <p class="text-muted mt-4">{{ readDuration($item->post_title, $item->post_content)}} @choice("min|mins", readDuration($item->post_title, $item->post_content)) read</p>
                                    </div>
                                </div>
                            </div>
                            @empty
                                <span class="text-danger">No Post(s) Found</span>
                            @endforelse
                            <!-- End Single Item -->
                           
                        </div>
                        
                        <!-- Pagination -->
                        <div class="row">
                            <div class="col-md-12 pagi-area text-center">
                                {{$posts->appends(request()->input())->links('users.IDM-blog-post_paginate')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog -->


    @endsection
