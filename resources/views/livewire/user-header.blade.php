<header id="home" >
@push('style')
    {{-- <style>
        @media screen and (max-width:676px){.d-sm-none{display:none!important}}
    </style> --}}
@endpush
    <!-- Start Navigation -->
    <nav class="navbar navbar-default navbar-fixed white no-background bootsnav">

        <!-- Start Top Search -->
        <div class="top-search">
            <div class="container">
               <form action="{{route('search_posts')}}">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search" name="query" value="{{Request('query')}}">
                    <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                </div>
            </form>
            </div>
        </div>
        <!-- End Top Search -->

        <div class="container-full">

            <!-- Start Atribute Navigation -->
            <div class="attr-nav">
                <ul>
                    {{-- <li class="text-warning d-sm-none d-md-none"><p>Anthony Wiliams</p></li> --}}
                    <li class="search"><a href="#"><i class="ti-search"></i></a></li>
                    <li class="side-menu">
                        <a href="#">
                            <span class="bar-1"></span>
                            <span class="bar-2"></span>
                            <span class="bar-3"></span>
                        </a>
                    </li>
                </ul>
            </div>        
            <!-- End Atribute Navigation -->

            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                    
                </button>
                <a class="navbar-brand" href="index-2.html">
                    <img src="{{asset('user/assets/img/logo-light.png')}}" class="logo logo-display" style="width:142px; height:50px; object-fit:contain"alt="Logo">
                    <img src="{{asset('user/assets/img/logo-blue.png')}}" class="logo logo-scrolled" style="width:142px; height:50px; object-fit:contain"alt="Logo">
                </a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOutUp">
                    <li>
                        <a href="{{route('index')}}" class="dropdown-toggle active" data-toggle="dropdown" >Home</a>
                    </li>
                    <li>
                        <a href="{{route('about')}}" >About Us</a>
                    </li>
                    <li>
                        <a href="{{route('services')}}" >Services</a>
                    </li>
                  
                   
                    {{-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Projects</a>
                        <ul class="dropdown-menu">
                            <li><a href="projects.html">Projects Version One</a></li>
                            <li><a href="projects-2.html">Projects Version One</a></li>
                            <li><a href="projects-3.html">Projects Version Three</a></li>
                            <li><a href="project-details.html">Projects Details</a></li>
                        </ul>
                    </li> --}}
                    {{-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Services</a>
                        <ul class="dropdown-menu">
                            <li><a href="services.html">Services Version One</a></li>
                            <li><a href="services-2.html">Services Version Two</a></li>
                            <li><a href="services-3.html">Services Version Three</a></li>
                            <li><a href="services-details.html">Services Details</a></li>
                        </ul>
                    </li> --}}
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Blog</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('blog_home')}}">Blog Home</a></li>
                            
                        </ul>
                    </li>
                    <li><a href="{{route('contact')}}">contact</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>

        <!-- Start Side Menu -->
        <div class="side">
            <a href="#" class="close-side"><i class="icon_close"></i></a>
            <div class="widget">
                <div class="row">
                    @if (auth()->user())
                        
                    <div class="col-lg-3">
                        @if (auth()->user()->profile_photo_updated_at == null)
                        <img src="{{asset('idora_img/profile/'.strtoupper(substr(auth()->user()->name, 0, 1)).".png")}}" class="rounded-circle thumbnail" style="width:50px; height:50px; object-fit:cover; " alt="{{auth()->user()->name}}" />
                         @else
                         <img src="{{asset('storage/images/authors/'.auth()->user()->profile_photo_path)}}" class="rounded-circle thumbnail" style="width:50px; height:50px; object-fit:cover; " alt="{{auth()->user()->name}}" />
                        @endif
                    </div>
                    <div class="col-lg-9">
                        <h5 class="font-weight-bolder">{{auth()->user()->name}}</h5>
                        <p>{{auth()->user()->email}}</p>
                        @if (auth()->user()->role == 1)
                        <a href="{{route('dashboard')}}">Go to Admin</a>
                        @endif
                    </div>
                    @else
                    <a href="{{route('login')}}" class="btn btn-outline-danger m-2">Login</a>
                    <a href="{{route('register')}}" class="btn btn-outline-success m-2">Register</a>
                    @endif
                    </div>

                <hr>

                <img src="{{asset('user/assets/img/logo-blue.png')}}" class="mt-4" alt="Logo">
                <p>
                    {{blogInfo()->blog_description}}
                </p>
            </div>
            <div class="widget address">
                <div>
                    <ul>
                        <li>
                            <div class="content">
                                <p>Address</p> 
                                <strong>{{blogInfo()->blog_address}}</strong>
                            </div>
                        </li>
                        <li>
                            <div class="content">
                                <p>Email</p> 
                                <strong>{{blogInfo()->blog_email}}</strong>
                            </div>
                        </li>
                        <li>
                            <div class="content">
                                <p>Contact</p> 
                                <strong>{{blogInfo()->blog_telephone}}</strong>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="widget newsletter">
                <h4 class="title">Get Subscribed!</h4>
                <form action="#">
                    <div class="input-group stylish-input-group">
                        <input type="email" placeholder="Enter your e-mail" class="form-control" name="email">
                        <span class="input-group-addon">
                            <button type="submit">
                                <i class="arrow_right"></i>
                            </button>  
                        </span>
                    </div>
                </form>
            </div>
            <div class="widget social">
                <ul class="link">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                    <li><a href="#"><i class="fab fa-behance"></i></a></li>
                </ul>
            </div>
        </div>
        <!-- End Side Menu -->

    </nav>
    <!-- End Navigation -->

</header>
