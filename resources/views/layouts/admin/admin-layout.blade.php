<!DOCTYPE html>

<html lang="en">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
		<title>@yield('title', 'Idora Media Admin Dashboard')</title>
		<meta charset="utf-8" />
		<meta name="description" content="Log into your Idora Media Administrator Account" />
		<meta name="keywords" content="seo, digital marketer, content creator, social media manager, blog, read blogs, write blogs, entertainment, lifestyle" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="@yield('title', 'Idora Media Admin Dashboard')" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Keenthemes | Metronic" />
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="{{asset('user/assets/img/favicon.png')}}" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Vendor Stylesheets(used by this page)-->
		<link href="{{asset('admin/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('admin/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('admin/assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{asset('admin/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('ijabo_crop_plugin/ijaboCropTool.min.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('admin/assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('amsify/amsify.suggestags.css')}}" rel="stylesheet" type="text/css" />
		
		<link href="{{asset('notifications/css/lobibox.css')}}" rel="stylesheet" />
		<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
		<!--end::Global Stylesheets Bundle-->
		<!--Begin::Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});let f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src= '../../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f); })(window,document,'script','dataLayer','GTM-5FS8GGP');</script>
		@livewireStyles
	</head>
	<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
		<script>
		let defaultThemeMode = "light"; 
		let themeMode; 
		if ( document.documentElement ) { 
			if ( document.documentElement.hasAttribute("data-theme-mode")) { 
				themeMode = document.documentElement.getAttribute("data-theme-mode"); 
			} else { 
				if ( localStorage.getItem("data-theme") !== null ) { 
					themeMode = localStorage.getItem("data-theme"); 
				} else { themeMode = defaultThemeMode; } 
			} 
			if (themeMode === "system") {
				 themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; 
				} 
				document.documentElement.setAttribute("data-theme", themeMode); 
			}
			</script>

		<!--end::Theme mode setup on page load-->
		<!--Begin::Google Tag Manager (noscript) -->
		<noscript>
			<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe>
		</noscript>
		<!--End::Google Tag Manager (noscript) -->
		<!--begin::App-->
		<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
			<!--begin::Page-->
			<div class="app-page flex-column flex-column-fluid" id="kt_app_page">

                <livewire:admin-header />
                <!--begin::Wrapper-->
				<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                    <livewire:side-bar />
                    <!--begin::Main-->
					<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
						<!--begin::Content wrapper-->
						<div class="d-flex flex-column flex-column-fluid">
                            <div id="kt_app_content" class="app-content flex-column-fluid ">
								<!--begin::Content container-->
								{{-- <div id="kt_app_content_container" class="app-container container-fluid"> --}}
                                    <div id="kt_app_content_container" class="app-container container-xxl">
									<x-IDM-admin-breadcrumb />
                                    @yield('content')

                                    </div>
                                {{-- </div> --}}
                                <x-IDM-admin-footer />
                            </div>
                        </div>
                    </div>
                </div>

            </div>
			<!--end::Page-->
		</div>
		<!--end::App-->
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
        <script src="{{asset('admin/assets/plugins/lozad.min.js')}}"></script>
        <script src="{{asset('admin/assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('admin/assets/js/scripts.bundle.js')}}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Vendors Javascript(used by this page)-->
		<script src="{{asset('admin/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
		<script src="{{asset('admin/cdn.amcharts.com/lib/5/index.js')}}"></script>
		<script src="{{asset('admin/cdn.amcharts.com/lib/5/xy.js')}}"></script>
		<script src="{{asset('admin/cdn.amcharts.com/lib/5/percent.js')}}"></script>
		<script src="{{asset('admin/cdn.amcharts.com/lib/5/radar.js')}}"></script>
		<script src="{{asset('admin/cdn.amcharts.com/lib/5/themes/Animated.js')}}"></script>
		<script src="{{asset('admin/cdn.amcharts.com/lib/5/map.js')}}"></script>
		<script src="{{asset('admin/cdn.amcharts.com/lib/5/geodata/worldLow.js')}}"></script>
		<script src="{{asset('admin/cdn.amcharts.com/lib/5/geodata/continentsLow.js')}}"></script>
		<script src="{{asset('admin/cdn.amcharts.com/lib/5/geodata/usaLow.js')}}"></script>
		<script src="{{asset('admin/cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js')}}"></script>
		<script src="{{asset('admin/cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js')}}"></script>
		<script src="{{asset('admin/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
		<script src="{{asset('admin/assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
		<!--end::Vendors Javascript-->
		<!--begin::Custom Javascript(used by this page)-->
		<script src="{{asset('admin/assets/js/widgets.bundle.js')}}"></script>
		<script src="{{asset('admin/assets/js/custom/widgets.js')}}"></script>
		<script src="{{asset('admin/assets/js/custom/apps/chat/chat.js')}}"></script>
		<script src="{{asset('admin/assets/js/custom/utilities/modals/upgrade-plan.js')}}"></script>
		<script src="{{asset('admin/assets/js/custom/utilities/modals/create-app.js')}}"></script>
		<script src="{{asset('admin/assets/js/custom/utilities/modals/new-target.js')}}"></script>
		<script src="{{asset('admin/assets/js/custom/utilities/modals/users-search.js')}}"></script>
		<script src="{{asset('notifications/js/lobibox.js')}}"></script>
		<script src="{{asset('notifications/js/messageboxes.js')}}"></script>
		<script src="{{asset('notifications/js/notification-custom-script.js')}}"></script>
		<script src="{{asset('notifications/js/notifications.js')}}"></script>
		<script src="{{asset('amsify/jquery.amsify.suggestags.js')}}"></script>
		<script src="{{asset('ijabo_crop_plugin/ijaboCropTool.min.js')}}"></script>

		{{-- Suggestion Tags for new blog post --}}
		<script>
			$('input[name="meta_tags"]').amsifySuggestags();
			$('input[name="post_tags"]').amsifySuggestags();
		</script>
		{{-- Suggestion Tags for new blog post --}}
		{{-- //Lazy Load Functionality  --}}
		<script>
			const observer = lozad(); // lazy loads elements with default selector as '.lozad'
			observer.observe();
			
			setInterval(() => {
				observer.observe();
				
			}, 2000);
		</script>
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
            

            window.addEventListener('showToast', (e)=>{
                toastR( e.detail.message, e.detail.type);
            })
			</script>

			{{-- Nav bar Active toggle  --}}
				<script>
				$(function(){
						var current = window.location.href;
						// alert(current)
						$('a.menu-link').each(function(){
							var $this = $(this);
							// if the current path is like this link, make it active
							if($this.attr('href') == current){
								console.log($this.closest('div.app-sidebar-menu div.menu-accordion')[0]);
								$this.closest('div.app-sidebar-menu div.menu-accordion').addClass('show')
								$this.addClass('active');
							}
						})
					})

					$(function(){
						var current = window.location.href;
						$('li.nav-item a.nav-link').each(function(){
							var $this = $(this);
							// if the current path is like this link, make it active
							if($this.attr('href') == current){
								$this.addClass('active');
							}
						})
					})
				</script>
			{{-- Nav bar Active toggle  --}}

			
		@stack('script')
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
		@livewireScripts
	</body>
	<!--end::Body-->

</html>