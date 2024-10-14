@extends('layouts.idora_user')
    @section('meta_tags')
    <meta name="description" content="{{Str::ucfirst(words($post->post_content, 120))}}">
    <meta name='robots' content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta name='author' content="{{$post->author->name}}">
    <meta name='title' content="{{Str::ucfirst($post->post_title)}}">
    <link rel="canonical" content="{{ route('read_post', $post->post_slug)}}">
    <meta property='og:title' content="{{Str::ucfirst($post->post_title)}}">
    <meta property='og:type' content="article">
    <meta property='og:description' content="{{Str::ucfirst(words($post->post_content, 120))}}">
    <meta property='og:url' content="{{route('read_post', $post->post_slug)}}">
    <meta property='og:image' content="{{asset('storage/images/post_images/thumbnails/resized_'.$post->featured_image)}}">
    <meta property='twitter:domain' content="{{Request::getHost()}}">
    <meta property='twitter:card' content="summary">
    <meta property='twitter:title' itemprop="name" name="twitter:title" content="{{Str::ucfirst($post->post_title)}}">
    <meta property='twitter:description' itemprop="description" name="twitter:description" content="{{Str::ucfirst(words($post->post_content, 120))}}">
    <meta property='twitter:image' content="{{asset('storage/images/post_images/thumbnails/resized_'.$post->featured_image)}}">
    @endsection
    @section('title', isset($pageTitle) ?  $pageTitle : "Idora Media | Categories")
    @section('content')



 <!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area bg-gray text-center shadow dark text-light bg-cover" style="background-image: url({{asset('storage/images/post_images/'.$post->featured_image)}});">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h1>Blog Single</h1>
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
                        <li class="active">{{$pageTitle}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Blog
    ============================================= -->
    <div class="blog-area single full-blog right-sidebar full-blog default-padding">
        <div class="container">
            <div class="blog-items">
                <div class="row">
                    <div class="blog-content col-lg-8 col-md-12">
                        
                        <div class="blog-item-box">

                            <div class="item">
                                <!-- Start Post Thumb -->
                                <div class="thumb">
                                    {{-- <img src="{{asset('storage/images/post_images/thumbnails/resized_'.$post->featured_image)}}" alt="Thumb"> --}}
                                    <img src="{{asset('storage/images/post_images/'.$post->featured_image)}}" alt="Thumb">
                                    <div class="date">{{date_formatter($post->created_at)}}</div>
                                </div>
                                <!-- Start Post Thumb -->

                                <div class="info">
                                    <h3>{{$post->post_title}}</h3>

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
                                           <li>
                                               <span class="badge badge-secondary p-2 "> 
                                                <a href="{{route('category_posts', $post->subcategory->slug)}}">{{$post->subcategory->subcategory_name}}</a>
                                               </span>
                                           </li>
                                       </ul>
                                    </div>
                                    

                                    {{-- <blockquote>
                                        He share of first to worse. Weddings and any opinions suitable smallest nay. Houses or months settle remove ladies appear. Engrossed suffering supposing he recommend do eagerness. Commanded no of depending. 
                                        <cite> - Adam John</cite> 
                                    </blockquote> --}}
                              
                                    <p>{!! $post->post_content !!}</p>
                                  
                                </div>
                            </div>
                        </div>

                      
                        <!-- Start Post Tags-->
                        <div class="post-tags share">
                            <div class="tags">
                                {{-- <img src="https://fontawesome.com/icons/eye?f=classic&s=solid" alt=""> --}}
                               <i class="fa-solid fa-eye"></i> {{$post->views->count()}}
                            </div>
                            <div class="social">
                                <ul>
                                    <li class="facebook">
                                        <a href="#">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li class="twitter">
                                        <a href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="pinterest">
                                        <a href="#">
                                            <i class="fab fa-pinterest-p"></i>
                                        </a>
                                    </li>
                                    <li class="linkedin">
                                        <a href="#">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- End Post Tags -->
                            <div class="mt-3">
                                <div id="disqus_thread"></div>
<script>
    // /**
    // *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    // *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    
    var disqus_config = function () {
    this.page.url ="{{ route('read_post', $post->post_slug)}}";  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = "{{$post->id}}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://idora-media.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                            </div>
                        <!-- Start Blog Comment -->
                        <div class="blog-comments">
                            <div class="comments-area">
                                <div class="comments-title">
                                    <h3>5 comments</h3>
                                    <div class="comments-list">
                                        <div class="commen-item">
                                            <div class="avatar">
                                                <img src="{{asset('user/assets/img/teams/1.jpg')}}" alt="Author">
                                            </div>
                                            <div class="content">
                                                <div class="title">
                                                    <h5>Bubhan Prova <span class="reply"><a href="#"><i class="fas fa-reply"></i> Reply</a></span></h5>
                                                    <span>28 Feb, 2021</span>
                                                </div>
                                                <p>
                                                    Delivered ye sportsmen zealously arranging frankness estimable as. Nay any article enabled musical shyness yet sixteen yet blushes. 
                                                </p>
                                            </div>
                                        </div>
                                        <div class="commen-item reply">
                                            <div class="avatar">
                                                <img src="{{asset('user/assets/img/teams/3.jpg')}}" alt="Author">
                                            </div>
                                            <div class="content">
                                                <div class="title">
                                                    <h5>Mickel Jones <span class="reply"><a href="#"><i class="fas fa-reply"></i> Reply</a></span></h5>
                                                    <span>15 Mar, 2021</span>
                                                </div>
                                                <p>
                                                    Arranging frankness estimable as. Nay any article enabled musical shyness yet sixteen yet blushes. Entire its the did figure wonder off. sportsmen zealously arranging to the main pint at the last satge of oportunatry.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="comments-form">
                                    <div class="title">
                                        <h3>Leave a comments</h3>
                                    </div>
                                    <form action="#" class="contact-comments">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <!-- Name -->
                                                    <input name="name" class="form-control" placeholder="Name *" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <!-- Email -->
                                                    <input name="email" class="form-control" placeholder="Email *" type="email">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group comments">
                                                    <!-- Comment -->
                                                    <textarea class="form-control" placeholder="Comment"></textarea>
                                                </div>
                                                <div class="form-group full-width submit">
                                                    <button class="btn-animation dark border" type="submit">Post Comments <i class="arrow_right"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Comments Form -->
                    </div>
                    <!-- Start Sidebar -->
                    <div class="sidebar col-lg-4 col-md-12">
                       <x-IDM-user-blog-sidebar :post_id="$post->id"/>
                    </div>
                    <!-- End Start Sidebar -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog -->




    @endsection

    @push('stylesheet')
        <link rel="stylesheet" href="{{asset('share_button/jquery.floating-social-share.css')}}">
    @endpush
    @push('script')
        <script src="{{asset('share_button/jquery.floating-social-share.js')}}"></script>
        <script>
            $('body').floatingSocialShare({
                buttons:[
                    'facebook', "twitter", 'whatsapp', "linkedin", "pinterest", "telegram"
                ],
                text: "Share with",
                url: "{{ route('read_post', $post->post_slug)}}"
            })
        </script>
    @endpush