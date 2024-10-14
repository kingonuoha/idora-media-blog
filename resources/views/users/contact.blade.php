@extends('layouts.idora_user')
    @section('title', "Idora Media | Contact Us")
    @section('content')

<!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area shadow dark bg-cover text-center text-light" style="background-image: url({{asset('user/assets/img/banner/7.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>Contact Us</h1>
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Star Contact Area
    ============================================= -->
    <div class="contact-area overflow-hidden default-padding">
        <div class="container">
            <div class="contact-items">
                <!-- Fixed BG -->
                <div class="fixed-bg left">
                    <img src="{{asset('user/assets/img/shape/39.png')}}" alt="Shape">
                </div>
                <!-- Fixed BG -->
                <div class="row align-center">
                
                    <div class="col-lg-6 contact-box">
                        <div class="form-items">
                            <h2>You can connect with us when need help!</h2>
                            <form action="#" method="POST" class="contact-form">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input class="form-control" id="name" name="name" placeholder="Name" type="text">
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input class="form-control" id="email" name="email" placeholder="Email*" type="email">
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input class="form-control" id="phone" name="phone" placeholder="Phone" type="text">
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group comments">
                                            <textarea class="form-control" id="comments" name="comments" placeholder="Tell Us About Project *"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <button class="btn-animation dark border" type="submit" name="submit" id="submit">
                                            Send Message <i class="arrow_right"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- Alert Message -->
                                <div class="col-lg-12 alert-notification">
                                    <div id="message" class="alert-msg"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-5 offset-lg-1 left-info">
                        <div class="info-items text-light">
                            <!-- Single Item -->
                            <div class="item">
                                <div class="icon">
                                    <i class="flaticon-location"></i>
                                </div>
                                <div class="info">
                                    <h5>Location</h5>
                                    <p>
                                        {{blogInfo()->blog_address}}
                                    </p>
                                </div>
                            </div>
                            <!-- End Single Item -->
                            <!-- Single Item -->
                            <div class="item">
                                <div class="icon">
                                    <i class="flaticon-telephone"></i>
                                </div>
                                <div class="info">
                                    <h5>Make a Call</h5>
                                    <p>
                                        {{blogInfo()->blog_telephone}}
                                    </p>
                                </div>
                            </div>
                            <!-- End Single Item -->
                            <!-- Single Item -->
                            <div class="item">
                                <div class="icon">
                                    <i class="flaticon-email"></i>
                                </div>
                                <div class="info">
                                    <h5>Send a Mail</h5>
                                    <p>
                                       {{blogInfo()->blog_email}}
                                    </p>
                                </div>
                            </div>
                            <!-- End Single Item -->
                            <ul class="social">
                                @if (!empty(site_socials()->blog_facebook))
                                <li >
                                    <a href="{{site_socials()->blog_facebook}}">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                @endif
                                @if (!empty(site_socials()->blog_twitter))
                                <li >
                                    <a href="{{site_socials()->blog_twitter}}">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                @endif
                                @if (!empty(site_socials()->blog_youtube))
                                <li >
                                    <a href="{{site_socials()->blog_youtube}}">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </li>
                                @endif
                                @if (!empty(site_socials()->blog_instagram))
                                <li >
                                    <a href="{{site_socials()->blog_instagram}}">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                                @endif
                
                                {{-- <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-behance"></i></a></li> --}}
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Contact Area -->

    <!-- Star Google Maps
    ============================================= -->
    <div class="maps-area">
        <div class="google-maps">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d248.22387844658633!2d7.0352681!3d5.4801769!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104259a716dc7d4d%3A0x5fec007e4735a6a5!2s28%20Egbu%20Rd%2C%20460281%2C%20Owerri%2C%20Imo!5e0!3m2!1sen!2sng!4v1680277784221!5m2!1sen!2sng" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <!-- End Google Maps -->

    @endsection