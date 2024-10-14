<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from validthemes.live/themeforest/avedi/index-marketing-agency.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 29 Mar 2023 14:41:43 GMT -->
<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- <meta name="description" content="{{blogInfo()->blog_description}}">
    <meta name='author' content="{{blogInfo()->blog_name}}"> --}}
    @yield('meta_tags')
    {{-- <meta name="robots" content="index, follow">
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
    <meta property='twitter:card' content="summary"> --}}
    <!-- ========== Page Title ========== -->
    <title>@yield('title')</title>

    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="{{asset('user/assets/img/favicon.png')}}" type="image/x-icon">

    @livewireStyles
    <!-- ========== Start Stylesheet ========== -->
    <link href="{{asset('user/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('user/assets/css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('user/assets/css/themify-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('user/assets/css/flaticon-set.css')}}" rel="stylesheet" />
    <link href="{{asset('user/assets/css/elegant-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('user/assets/css/magnific-popup.css')}}" rel="stylesheet" />
    <link href="{{asset('user/assets/css/owl.carousel.min.css')}}" rel="stylesheet" />
    <link href="{{asset('user/assets/css/owl.theme.default.min.css')}}" rel="stylesheet" />
    <link href="{{asset('user/assets/css/animate.css')}}" rel="stylesheet" />
    <link href="{{asset('user/assets/css/bootsnav.css')}}" rel="stylesheet" />
    <link href="{{asset('user/style.css')}}" rel="stylesheet">
    <link href="{{asset('user/assets/css/responsive.css')}}" rel="stylesheet" />
    <link href="{{asset('notifications/css/lobibox.css')}}" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css">
    <!-- ========== End Stylesheet ========== -->
    @stack('stylesheet')
    <!-- HTML5 shim and Respond.js')}} for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js')}} doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="{{asset('user/assets/js/html5/html5shiv.min.js')}}"></script>
      <script src="{{asset('user/assets/js/html5/respond.min.js')}}"></script>
    <![endif]-->
    @stack('style')

</head>

<body class="blue">
 
    <x-IDM-preloader />
    <livewire:user-header />
    
    @yield('content')
    
    <x-IDM-footer />



    <!-- jQuery Frameworks
    ============================================= -->
    <script src="{{asset('user/assets/js/jquery-1.12.4.min.js')}}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script> --}}
    <script src="{{asset('user/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('user/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('user/assets/js/jquery.appear.js')}}"></script>
    <script src="{{asset('user/assets/js/jquery.easing.min.js')}}"></script>
    <script src="{{asset('user/assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('user/assets/js/modernizr.custom.13711.js')}}"></script>
    <script src="{{asset('user/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('user/assets/js/wow.min.js')}}"></script>
    <script src="{{asset('user/assets/js/progress-bar.min.js')}}"></script>
    <script src="{{asset('user/assets/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('user/assets/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('user/assets/js/count-to.js')}}"></script>
    <script src="{{asset('user/assets/js/YTPlayer.min.js')}}"></script>
    <script src="{{asset('user/assets/js/bootsnav.js')}}"></script>
    <script src="{{asset('user/assets/js/easy-pie-chart.js')}}"></script>
    <script src="{{asset('user/assets/js/pie-chart-active.js')}}"></script>
    <script src="{{asset('user/assets/js/main.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="{{asset('notifications/js/jquery.min.js')}}"></script> --}}
    <script src="{{asset('notifications/js/lobibox.js')}}"></script>
    <script src="{{asset('notifications/js/messageboxes.js')}}"></script>
    <script src="{{asset('notifications/js/notification-custom-script.js')}}"></script>
    <script src="{{asset('notifications/js/notifications.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
        <script>
            function toastR(message, type = "default") {
                let options = {
                    pauseDelayOnHover: true,
                    continueDelayOnInactiveTab: false,
                    position: 'top right',
                    msg: message,
                    
                };

                if (type == 'success') {
                    options.icon = 'bx bx-check-circle';
                } else if(type == 'error'){
                    options.icon =  'bx bx-x-circle'
                } else if(type == 'warning'){
                    options.icon =  'bx bx-error'
                } else if(type == 'info'){
                    options.icon =  'bx bx-info-circle'
                } 
               

                Lobibox.notify(type, options);
            }

            // notification with Image 
            function toastR_image(message, type = "default", imgSrc = null) {
                let options = {
                    pauseDelayOnHover: true,
                    continueDelayOnInactiveTab: false,
                    position: 'top right',
                    msg: message,
                    
                };
                if(imgSrc != null) {
                    // img: imgSrc, //path to image
                    options.img = imgSrc
                }

                Lobibox.notify(type, options);
            }
            // toastR_image("Hello BRo This is A default Success msg", 'info', "{{asset('user/assets/img/favicon.png')}}");
           

            window.addEventListener('showToast', (e)=>{
                toastR( e.detail.message, e.detail.type);
            })
        </script>
        <script>
            function success_alert(message){
			Swal.fire({
                        text: message,
						title:"Successful",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
		   }
           function error_alert(message){
			Swal.fire({
                        text: message,
						title:"An Error occured",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-danger"
                        }
                    });
		   }
           function info_alert(message){
			Swal.fire({
                        text: message,
						title:"There's An Info",
                        icon: "info",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-info"
                        }
                    });
		   }
           function warning_alert(message){
			Swal.fire({
                        text: message,
						title:"Warning",
                        icon: "warning",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-warning"
                        }
                    });
		   }
           

            window.addEventListener('success_alert', (e)=>{
                success_alert( e.detail.message);
            })
            window.addEventListener('error_alert', (e)=>{
                error_alert( e.detail.message);
            })
            window.addEventListener('info_alert', (e)=>{
                info_alert( e.detail.message);
            })
            window.addEventListener('warning_alert', (e)=>{
                warning_alert( e.detail.message);
            })
            
        </script>
    @stack('script')

        @livewireScripts
</body>

<!-- Mirrored from validthemes.live/themeforest/avedi/index-marketing-agency.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 29 Mar 2023 14:42:10 GMT -->
</html>