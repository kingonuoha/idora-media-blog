
    <!-- Star Footer
    ============================================= -->
  
    <footer class="bg-dark text-light">
        <div class="container">
            <div class="f-items default-padding">
                <div class="row">
                    <div class="col-lg-5 col-md-6 item">
                        <div class="f-item about">
                            <h4 class="widget-title">About Us</h4>
                            <p>
                                {{blogInfo()->blog_description}}

                            </p>
                            <div class="social">
                                @if (!empty(site_socials()->blog_facebook))
                                <li class="facebook">
                                    <a href="{{site_socials()->blog_facebook}}">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                @endif
                                @if (!empty(site_socials()->blog_twitter))
                                <li class="twitter">
                                    <a href="{{site_socials()->blog_twitter}}">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                @endif
                                @if (!empty(site_socials()->blog_youtube))
                                <li class="g-plus">
                                    <a href="{{site_socials()->blog_youtube}}">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </li>
                                @endif
                                @if (!empty(site_socials()->blog_instagram))
                                <li class="g-plus">
                                    <a href="{{site_socials()->blog_instagram}}">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                                @endif
                
                                {{-- <ul>
                                    <li class="facebook">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li class="twitter">
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="youtube">
                                        <a href="#"><i class="fab fa-youtube"></i></a>
                                    </li>
                                    <li class="instagram">
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </li>
                                </ul> --}}
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 item">
                        <div class="f-item link">
                            <h4 class="widget-title">Quick links</h4>
                            <ul>
                                <li>
                                    <a href="{{route('index')}}">Home</a>
                                </li>
                                <li>
                                    <a href="{{route('about')}}">About Us</a>
                                </li>
                                <li>
                                    <a href="{{route('services')}}">Our Services</a>
                                </li>
                                <li>
                                    <a href="{{route('contact')}}">Contact Us</a>
                                </li>
                                <li>
                                    <a href="{{route('blog_home')}}">Blog Posts</a>
                                </li>
                                @if (auth()->hasUser())
                                <li>
                                    <a href="{{route('add_testimonial')}}">Add Testimonial</a>
                                </li>
                                    
                                @endif
                               
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 item">
                        <div class="f-item link">
                            <h4 class="widget-title">Company</h4>
                            <ul>
                                <li>
                                    <a href="{{route('blog_home')}}">Recent Posts</a>
                                </li>
                                <li>
                                    <a href="{{route('about')}}">Know More</a>
                                </li>
                                <li>
                                    <a href="{{route('services')}}">what we do</a>
                                </li>
                                <li>
                                    <a href="{{route('contact')}}">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 item">
                        <div class="f-item contact">
                            <h4 class="widget-title">Reach Us</h4>
                            <div class="address">
                                <ul>
                                    <li>
                                        <p>Address</p> 
                                        <strong>{{blogInfo()->blog_address}}</strong>
                                    </li>
                                    <li>
                                        <p>Email</p> 
                                        <strong>{{blogInfo()->blog_email}}</strong>
                                    </li>
                                    <li>
                                        <p>Contact</p> 
                                        <strong>{{blogInfo()->blog_telephone}}</strong>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-center">
                    <div class="col-lg-4">
                        <p>&copy; Copyright <script> document.write( new Date().getFullYear())</script>. All Rights Reserved</p>
                    </div>
                    <div class="col-lg-4 text-center logo">
                        <a href="#"><img src="{{asset('user/assets/img/logo-light.png')}}" alt="Logo"></a>
                    </div>
                    <div class="col-lg-4 text-right newsletter">
                        <form action="#">
                            <div class="input-group stylish-input-group">
                                <input type="email" placeholder="Enter your e-mail" class="form-control" name="email">
                                <span class="input-group-addon">
                                    <button type="submit">
                                        <i class="fa fa-paper-plane"></i>
                                    </button>  
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- {{blogInfo()}} --}}
        <!-- End Footer Bottom -->
    </footer>
    <!-- End Footer-->