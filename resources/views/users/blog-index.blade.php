@extends('layouts.idora_user')
    @section('title', "Idora Media | Latest Blog Posts ")
    @section('content')
    @section('meta_tags')
    <meta name="robots" content="index, follow">
    <meta name="description" content="{{blogInfo()->blog_description}}">
    <meta name='author' content="{{blogInfo()->blog_name}}">
    <meta name='title' content="{{blogInfo()->blog_name}}">
    <link rel="canonical" content="{{ Request::root()}}">
    <meta property='og:title' content="{{blogInfo()->blog_name}}">
    <meta property='og:type' content="website">
    <meta property='og:description' content="{{blogInfo()->blog_description}}">
    <meta property='og:url' content="{{Request::root()}}">
    <meta property='og:image' content="{{asset('user/assets/img/logo-blue.png')}}">
    <meta property='twitter:domain' content="{{Request::root()}}">
    <meta property='twitter:card' content="summary">
    <meta property='og:title' itemprop="name" name="twitter:title" content="{{blogInfo()->blog_name}}">
    <meta property='og:description' itemprop="description" name="twitter:description" content="{{blogInfo()->blog_description}}">
    {{-- <meta property='og:description' content="{{blogInfo()->blog_description}}"> --}}
    @endsection

{{-- Begin Blog --}}

 <!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area bg-gray text-center shadow dark text-light bg-cover" style="background-image: url({{asset('user/assets/img/banner/12.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h1>Blogs</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{route('index')}}"><i class="fas fa-home"></i> Home</a></li>
                        <li class="active">Blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Blog
    ============================================= -->
    <div class="blog-area full-blog right-sidebar full-blog default-padding">
        <div class="container">
            <div class="blog-items">
                <div class="sidebar">
                    <div class="title">
                        <h4>Our Latest Blog Posts</h4>
                    </div>
                </div>
                
                <div class="row">
                    <div class="blog-content col-lg-8 col-md-12">
                        <div class="blog-item-box">
                            @if (single_latest_post())
                                
                            <!-- Single Item -->
                            <div class="single-item">
                                <div class="item">
                                    <div class="thumb">
                                        <img src="{{asset('storage/images/post_images/'.single_latest_post()->featured_image)}}" alt="Thumb">
                                        <div class="date">{{ date_formatter(single_latest_post()->created_at)}}</div>
                                    </div>
                                    <div class="info">
                                        <h3>
                                            <a href="{{route('read_post', single_latest_post()->post_slug)}}">{{single_latest_post()->post_title}}</a>
                                        </h3>
                                        <div class="footer-meta">
                                           <ul>
                                               <li>
                                                @if (single_latest_post()->author->profile_photo_updated_at == null)
                                                <img src="{{asset('idora_img/profile/'.strtoupper(substr(single_latest_post()->author->name, 0, 1)).'.png')}}" alt="Author">
                                                @else
                                                <img src="{{asset('storage/images/authors/'.single_latest_post()->author->profile_photo_path)}}" alt="Author">
                                                @endif
                                                   <span>By </span>
                                                   <a href="{{route('single_author', single_latest_post()->author->id)}}">{{single_latest_post()->author->name}}</a>
                                               </li>
                                               {{-- <li>
                                                   <span>In </span>
                                                   <a href="#">Agency</a>
                                               </li> --}}
                                           </ul>
                                        </div>
                                        <p>
                                           {!! Str::ucfirst(words(single_latest_post()->post_content), 35) !!}
                                        </p>
                                        <div class="d-flex align-items-center">
                                            <a class="btn circle btn-theme border btn-sm" href="{{route('read_post', single_latest_post()->post_slug)}}">Read More</a>
                                        <p class="ml-2 text-muted">{{ readDuration(single_latest_post()->post_title, single_latest_post()->post_content)}} @choice("min|mins", readDuration(single_latest_post()->post_title, single_latest_post()->post_content)) read</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-5">
                            <!-- End Single Item -->
                            @endif

                            <div class="sidebar">
                                <div class="title">
                                    <h4>Recent Post</h4>
                                </div>
                            </div>
                            {{-- latest_home_6posts --}}
                            <div class="row">
                                @foreach (latest_home_6posts() as $post)
                                    
                                <div class="col-lg-6 mb-4">
                                    <!-- Single Item -->
                                   <div class="single-item">
                                       <div class="item">
                                           <div class="thumb">
                                               <img src="{{asset('storage/images/post_images/thumbnails/resized_'.$post->featured_image)}}" alt="Thumb">
                                               <div class="date">{{ date_formatter($post->created_at)}}</div>
                                           </div>
                                           <div class="info">
                                                <span class="badge badge-secondary p-2"><a href="{{route('category_posts', $post->subcategory->slug)}}">{{$post->subcategory->subcategory_name}}</a></span>
                                               <h4>
                                                   <a href="{{route('read_post', $post->post_slug)}}">{{$post->post_title}} </a>
                                               </h4>
                                               <div class="footer-meta">
                                                  <ul>
                                                      <li>
                                                        @if ($post->author->profile_photo_updated_at == null)
                                                        <img src="{{asset('idora_img/profile/'.strtoupper(substr($post->author->name, 0, 1)).'.png')}}" alt="Author">
                                                        @else
                                                        <img src="{{asset('storage/images/authors/'.$post->author->profile_photo_path)}}" alt="Author">
                                                        @endif
                                                          <span>By </span>
                                                          <a href="{{route('single_author', $post->author->id)}}">{{$post->author->name}}</a>
                                                      </li>
                                                     
                                                  </ul>
                                               </div>
                                               <p>
                                                {!! Str::ucfirst(words($post->post_content), 15) !!}
                                               </p>
                                               <p class="text-muted mt-4">{{ readDuration($post->post_title, $post->post_content)}} @choice("min|mins", readDuration($post->post_title, $post->post_content)) read</p>
                                           </div>
                                       </div>
                                   </div>
                                   <!-- End Single Item -->
                                </div>
                                @endforeach

                            </div>
                        </div>
                        
                        <!-- Pagination -->
                        {{-- <div class="row">
                            <div class="col-md-12 pagi-area text-center">
                                <nav aria-label="navigation">
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-double-left"></i></a></li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-double-right"></i></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div> --}}
                    </div>
                    <!-- Start Sidebar -->
                    <div class="sidebar col-lg-4 col-md-12">
                        <x-IDM-user-blog-sidebar />

                    </div>
                    <!-- End Start Sidebar -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog -->
{{-- End Blog --}}

@endsection
