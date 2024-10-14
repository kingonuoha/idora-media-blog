<!DOCTYPE html>

<html lang="en">
	{{-- <!--begin::Head--> --}}
	
{{-- <!-- /Added by HTTrack --> --}}
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
		<title>@yield('title')</title>
		<meta charset="utf-8" />
		<meta name="description" content="Create a free account and enjoy our amazing benefits today" />
		<meta name="keywords" content="seo, digital marketer, content creator, social media manager, blog, read blogs, write blogs, entertainment, lifestyle" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="@yield('title')" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Keenthemes | Metronic" />
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="{{asset('user/assets/img/favicon.png')}}" />
		{{-- <!--begin::Fonts--> --}}
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		{{-- <!--end::Fonts--> --}}
		{{-- <!--begin::Global Stylesheets Bundle(used by all pages)--> --}}
		<link href="{{asset('admin/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('admin/assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		{{-- <!--end::Global Stylesheets Bundle--> --}}
		{{-- <!--Begin::Google Tag Manager --> --}}
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src= '../../../../../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f); })(window,document,'script','dataLayer','GTM-5FS8GGP');</script>
		{{-- <!--End::Google Tag Manager --> --}}
	</head>
	{{-- <!--end::Head--> --}}
	{{-- <!--begin::Body--> --}}
	<body id="kt_body" class="app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
		{{-- <!--begin::Theme mode setup on page load--> --}}
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-theme-mode")) { themeMode = document.documentElement.getAttribute("data-theme-mode"); } else { if ( localStorage.getItem("data-theme") !== null ) { themeMode = localStorage.getItem("data-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-theme", themeMode); }</script>
		
		<noscript>
			<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe>
		</noscript>

            @yield('content')

			
        
        <script>var hostUrl = "{{asset('admin/assets/index.html')}}";</script>
		
		<script src="{{asset('admin/assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('admin/assets/js/scripts.bundle.js')}}"></script>
		
		
		<script src="{{asset('admin/assets/js/custom/idora_media/auth.js')}}"></script>

		
	</body>
	


</html>
        