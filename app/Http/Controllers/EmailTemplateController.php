<?php

namespace App\Http\Controllers;

use App\Models\BlogSetting;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class EmailTemplateController extends Controller
{

    public function welcomeView(){
        $data = [
            'user' => User::where('role', 0)->get()->first()
        ];
        return view('emails.welcome', $data);
    }
    public function contactMessageRecieverView(){
        $data = [
            'user' => User::where('role', 0)->get()->first()
        ];
        return view('emails.contact-reciever', $data);
    }

    //
    public function welcomeMessage()
    {
        $user = User::find(2);
        $userName = $user->name;
        $userEmail = $user->email;
       return $this->emailHeader().'
                       <div class="scroll-y flex-column-fluid px-10 py-10" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_header_nav" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true" style="background-color:#F7F2EF; --kt-scrollbar-color: #d9d0cc; --kt-scrollbar-hover-color: #d9d0cc">
                           <!--begin::Email template-->
                           <style>html,body { padding:0; margin:0; font-family: Inter, Helvetica, "sans-serif"; } a:hover { color: #009ef7; }</style>
                           <div id="#kt_app_body_content" style="background-color:#F7F2EF; font-family:Arial,Helvetica,sans-serif; line-height: 1.5; min-height: 100%; font-weight: normal; font-size: 15px; color: #2F3044; margin:0; padding:0; width:100%;">
                               <div style="background-color:#ffffff; padding: 45px 0 34px 0; border-radius: 24px; margin:40px auto; max-width: 600px;">
                                   <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" height="auto" style="border-collapse:collapse">
                                       <tbody>
                                           <tr>
                                               <td align="center" valign="center" style="text-align:center; padding-bottom: 10px">
                                                   <!--begin:Email content-->
                                                   <div style="text-align:center; margin:0 15px 34px 15px">
                                                       <!--begin:Logo-->
                                                       <div style="margin-bottom: 10px">
                                                           <a href="https://keenthemes.com/" rel="noopener" target="_blank">
                                                               <img alt="Logo" src="'.asset('user/assets/img/logo-blue.png').'" style="height: 35px" />
                                                           </a>
                                                       </div>
                                                       <!--end:Logo-->
                                                       <!--begin:Media-->
                                                       <div style="margin-bottom: 15px">
                                                           <img alt="Logo" src="'.asset('admin/assets/media/email/icon-positive-vote-1.svg').'" />
                                                       </div>
                                                       <!--end:Media-->
                                                       <!--begin:Text-->
                                                       <div style="font-size: 14px; font-weight: 500; margin-bottom: 27px; font-family:Arial,Helvetica,sans-serif;">
                                                           <p style="margin-bottom:9px; color:#181C32; font-size: 22px; font-weight:700">Hey '.$userName.', thanks for signing up!</p>
                                                           <p style="margin-bottom:2px; color:#7E8299">We are delighted to welcome you to Idora Media Website! </p>
                                                           <p style="margin-bottom:2px; color:#7E8299">We are excited to have you join our team and look forward  </p>
                                                           <p style="margin-bottom:2px; color:#7E8299">to the contributions you will make.</p>
                                                       </div>
                                                       <!--end:Text-->
                                                       <!--begin:Action-->
                                                       <a href="'.route('index').'" style="background-color:#50CD89; border-radius:6px;display:inline-block; padding:11px 19px; color: #FFFFFF; font-size: 14px; font-weight:500;">Back To Home Page</a>
                                                       <!--begin:Action-->
                                                   </div>
                                                   <!--end:Email content-->
                                               </td>
                                           </tr>
                                           '.$this->emailBlogList().$this->emailFooter();
    }



    public function emailBlogList()
    {
        return '<tr style="display: flex; justify-content: center; margin:0 60px 35px 60px">
        <td align="start" valign="start" style="padding-bottom: 10px;">
            <p style="color:#181C32; font-size: 18px; font-weight: 600; margin-bottom:13px">What’s next?</p>
            <!--begin::Wrapper-->
            <div style="background: #F9F9F9; border-radius: 12px; padding:35px 30px">
                <!--begin::Item-->
                <div style="display:flex">
                    <!--begin::Media-->
                    <div style="display: flex; justify-content: center; align-items: center; width:40px; height:40px; margin-right:13px">
                        <img alt="Logo" src="'.asset('admin/assets/media/email/icon-polygon.svg').'" />
                        <span style="position: absolute; color:#50CD89; font-size: 16px; font-weight: 600;">1</span>
                    </div>
                    <!--end::Media-->
                    <!--begin::Block-->
                    <div>
                        <!--begin::Content-->
                        <div>
                            <!--begin::Title-->
                            <a href="#" style="color:#181C32; font-size: 14px; font-weight: 600;font-family:Arial,Helvetica,sans-serif">Complete your account</a>
                            <!--end::Title-->
                            <!--begin::Desc-->
                            <p style="color:#5E6278; font-size: 13px; font-weight: 500; padding-top:3px; margin:0;font-family:Arial,Helvetica,sans-serif">Lots of people make mistakes while creating paragraphs Some writers just put whitespace in their text</p>
                            <!--end::Desc-->
                        </div>
                        <!--end::Content-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed" style="margin:17px 0 15px 0"></div>
                        <!--end::Separator-->
                    </div>
                    <!--end::Block-->
                </div>
                <!--end::Item-->
                <!--begin::Item-->
                <div style="display:flex">
                    <!--begin::Media-->
                    <div style="display: flex; justify-content: center; align-items: center; width:40px; height:40px; margin-right:13px">
                        <img alt="Logo" src="'.asset('admin/assets/media/email/icon-polygon.svg').'" />
                        <span style="position: absolute; color:#50CD89; font-size: 16px; font-weight: 600;">2</span>
                    </div>
                    <!--end::Media-->
                    <!--begin::Block-->
                    <div>
                        <!--begin::Content-->
                        <div>
                            <!--begin::Title-->
                            <a href="#" style="color:#181C32; font-size: 14px; font-weight: 600;font-family:Arial,Helvetica,sans-serif">Communication Tool</a>
                            <!--end::Title-->
                            <!--begin::Desc-->
                            <p style="color:#5E6278; font-size: 13px; font-weight: 500; padding-top:3px; margin:0;font-family:Arial,Helvetica,sans-serif">Craft a headline that is both informative and will capture readers’ improtant attentions</p>
                            <!--end::Desc-->
                        </div>
                        <!--end::Content-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed" style="margin:17px 0 15px 0"></div>
                        <!--end::Separator-->
                    </div>
                    <!--end::Block-->
                </div>
                <!--end::Item-->
                <!--begin::Item-->
                <div style="display:flex">
                    <!--begin::Media-->
                    <div style="display: flex; justify-content: center; align-items: center; width:40px; height:40px; margin-right:13px">
                        <img alt="Logo" src="'.asset('admin/assets/media/email/icon-polygon.svg').'" />
                        <span style="position: absolute; color:#50CD89; font-size: 16px; font-weight: 600;">3</span>
                    </div>
                    <!--end::Media-->
                    <!--begin::Block-->
                    <div>
                        <!--begin::Content-->
                        <div>
                            <!--begin::Title-->
                            <a href="#" style="color:#181C32; font-size: 14px; font-weight: 600;font-family:Arial,Helvetica,sans-serif">Task Planner</a>
                            <!--end::Title-->
                            <!--begin::Desc-->
                            <p style="color:#5E6278; font-size: 13px; font-weight: 500; padding-top:3px; margin:0;font-family:Arial,Helvetica,sans-serif">Use images to enhance your post, improve its flow, add humor, and explain complex topics</p>
                            <!--end::Desc-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Block-->
                </div>
                <!--end::Item-->
            </div>
            <!--end::Wrapper-->
        </td>
    </tr>';
    }

    public function newBlog_email(Post $post, User $user)
    {
        // $post = Post::find(1);
        // $user = User::find(1);

       return  $this->emailHeader().'
                       <div class="scroll-y flex-column-fluid px-10 py-10" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_header_nav" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true" style="background-color:#F7F2EF; --kt-scrollbar-color: #d9d0cc; --kt-scrollbar-hover-color: #d9d0cc">
                           <!--begin::Email template-->
                           <style>html,body { padding:0; margin:0; font-family: Inter, Helvetica, "sans-serif"; } a:hover { color: #009ef7; }</style>
                           <div id="#kt_app_body_content" style="background-color:#F7F2EF; font-family:Arial,Helvetica,sans-serif; line-height: 1.5; min-height: 100%; font-weight: normal; font-size: 15px; color: #2F3044; margin:0; padding:0; width:100%;">
                               <div style="background-color:#ffffff; padding: 45px 0 34px 0; border-radius: 24px; margin:40px auto; max-width: 600px;">
                                   <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" height="auto" style="border-collapse:collapse">
                                       <tbody>
                                           <tr>
                                               <td align="center" valign="center" style="text-align:center; padding-bottom: 10px">
                                                   <!--begin:Email content-->
                                                   <div style="text-align:center; margin:0 15px 34px 15px">
                                                       <!--begin:Logo-->
                                                       <div style="margin-bottom: 10px">
                                                           <a href="https://keenthemes.com/" rel="noopener" target="_blank">
                                                               <img alt="Logo" src="'.asset('user/assets/img/logo-blue.png').'" style="height: 35px" />
                                                           </a>
                                                       </div>
                                                       <!--end:Logo-->
                                                       <!--begin:Media-->
                                                       <div style="margin-bottom: 15px">
                                                           <img alt="Logo" src="'.asset('admin/assets/media/email/icon-positive-vote-2.svg').'" />
                                                       </div>
                                                       <!--end:Media-->
                                                       <!--begin:Text-->
                                                       <div style="font-size: 14px; font-weight: 500; margin-bottom: 27px; font-family:Arial,Helvetica,sans-serif;">
                                                           <p style="margin-bottom:9px; color:#181C32; font-size: 22px; font-weight:700">Hey '.$user->name.', We`ve just Made a new Post!!</p>
                                                          
                                                       </div>
                                                    <div style="margin-bottom: 57px;">
													<img alt="" style="width:100%" src="'.asset('/storage/images/post_images/thumbnails/resized_'.$post->featured_image).'">
                                                    </div>
                                                    <div style="font-size: 14px; font-weight: 500; margin:0 10px 33px 10px; font-family:Arial,Helvetica,sans-serif">
                                                        <p style="color:#181C32; font-size: 28px; font-weight:700; margin-bottom:24px">'.$post->meta_title.'</p>
                                                        '.substr($post->post_content, 0 ,430).'...
                                                    </div>
                                                       <!--end:Text-->
                                                       <!--begin:Action-->
                                                       <a href="'.route('index').'" style="background-color:#50CD89; border-radius:6px;display:inline-block; padding:11px 19px; color: #FFFFFF; font-size: 14px; font-weight:500;">Read More</a>
                                                       <!--begin:Action-->
                                                   </div>
                                                   <!--end:Email content-->
                                               </td>
                                           </tr>
                                           '.$this->emailFooter();

    }



    public function emailHeader(){
        return '<!DOCTYPE html>

        <html lang="en">
            <!--begin::Head-->
            
        <!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
        <head>
                <title>Idora Media | Welcome to Our website</title>
                <meta charset="utf-8" />
                <meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Blazor, Django, Flask & Laravel versions. Grab your copy now and get life-time updates for free." />
                <meta name="keywords" content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Blazor, Django, Flask & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
                <meta name="viewport" content="width=device-width, initial-scale=1" />
                <meta property="og:locale" content="en_US" />
                <meta property="og:type" content="article" />
                <meta property="og:title" content="Metronic | Bootstrap HTML, VueJS, React, Angular, Asp.Net Core, Blazor, Django, Flask & Laravel Admin Dashboard Theme" />
                <meta property="og:url" content="https://keenthemes.com/metronic" />
                <meta property="og:site_name" content="Keenthemes | Metronic" />
                <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
                <link rel="shortcut icon" href="'.asset('user/assets/img/favicon.png').'" />
                <!--begin::Fonts-->
                <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
                <!--end::Fonts-->
                <!--begin::Global Stylesheets Bundle(used by all pages)-->
                <link href="'.asset('admin/assets/plugins/global/plugins.bundle.css').'" rel="stylesheet" type="text/css" />
                <link href="'.asset('admin/assets/css/style.bundle.css').'" rel="stylesheet" type="text/css" />
                <!--end::Global Stylesheets Bundle-->
                <!--Begin::Google Tag Manager -->
                <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({"gtm.start": new Date().getTime(),event:"gtm.js"});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!="dataLayer"?"&l="+l:"";j.async=true;j.src= "../www.googletagmanager.com/gtm5445.html?id="+i+dl;f.parentNode.insertBefore(j,f); })(window,document,"script","dataLayer","GTM-5FS8GGP");</script>
                <!--End::Google Tag Manager -->
            </head>
            <!--end::Head-->
            <!--begin::Body-->
            <body id="kt_body" class="app-blank app-blank">
                <!--begin::Theme mode setup on page load-->
                <script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-theme-mode")) { themeMode = document.documentElement.getAttribute("data-theme-mode"); } else { if ( localStorage.getItem("data-theme") !== null ) { themeMode = localStorage.getItem("data-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-theme", themeMode); }</script>
                <!--end::Theme mode setup on page load-->
                <!--Begin::Google Tag Manager (noscript) -->
                <noscript>
                    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe>
                </noscript>
                <!--End::Google Tag Manager (noscript) -->
                <!--begin::Root-->
                <div class="d-flex flex-column flex-root" id="kt_app_root">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column flex-column-fluid">
                        
                        <!--begin::Body-->';
    }

    public function emailFooter(){
        $idora_Email = BlogSetting::find(1)->blog_email;

        return '<tr>
        <td align="center" valign="center" style="font-size: 13px; text-align:center; padding: 0 10px 10px 10px; font-weight: 500; color: #A1A5B7; font-family:Arial,Helvetica,sans-serif">
            <p style="color:#181C32; font-size: 16px; font-weight: 600; margin-bottom:9px">It’s all about customers!</p>
            <p style="margin-bottom:2px">Call our customer care number: +31 6 3344 55 56</p>
            <p style="margin-bottom:4px">You may reach us at 
            <a href="mailto:'.$idora_Email.'" rel="noopener" target="_blank" style="font-weight: 600">'.$idora_Email.'</a>.</p>
            <p>We serve Mon-Fri, 9AM-18AM</p>
        </td>
    </tr>
    <tr>
        <td align="center" valign="center" style="text-align:center; padding-bottom: 20px;">
            <a href="#" style="margin-right:10px">
                <img alt="Logo" src="'.asset('admin/assets/media/email/icon-linkedin.svg').'" />
            </a>
            <a href="#" style="margin-right:10px">
                <img alt="Logo" src="'.asset('admin/assets/media/email/icon-dribbble.svg').'" />
            </a>
            <a href="#" style="margin-right:10px">
                <img alt="Logo" src="'.asset('admin/assets/media/email/icon-facebook.svg').'" />
            </a>
            <a href="#">
                <img alt="Logo" src="'.asset('admin/assets/media/email/icon-twitter.svg').'" />
            </a>
        </td>
    </tr>
    <tr>
        <td align="center" valign="center" style="font-size: 13px; padding:0 15px; text-align:center; font-weight: 500; color: #A1A5B7;font-family:Arial,Helvetica,sans-serif">
            <p>&copy; Copyright KeenThemes. 
            <a href="https://keenthemes.com/" rel="noopener" target="_blank" style="font-weight: 600;font-family:Arial,Helvetica,sans-serif">Unsubscribe</a>&nbsp; from newsletter.</p>
        </td>
    </tr>
</tbody>
</table>
</div>
</div>
<!--end::Email template-->
</div>
<!--end::Body-->
</div>
<!--end::Wrapper-->
</div>
<!--end::Root-->
<!--begin::Javascript-->
<script>var hostUrl = "'.route('index').'";</script>
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="'.asset('admin/assets/plugins/global/plugins.bundle.js').'"></script>
<script src="'.asset('admin/assets/js/scripts.bundle.js').'"></script>
<!--end::Global Javascript Bundle-->
<!--end::Javascript-->
</body>
<!--end::Body-->

<!-- Mirrored from preview.keenthemes.com/metronic8/demo1/authentication/email/welcome-message.html by HTTrack Website Copier/3.x [XR&CO"2014], Thu, 18 Aug 2022 14:59:06 GMT -->
</html>';
    }
    public function contactMessageReciever($userName="Brother Benard", $userEmail ="bb@benard.com")
    {
        $user = User::find(2);
       return  $this->emailHeader().'
                       <div class="scroll-y flex-column-fluid px-10 py-10" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_header_nav" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true" style="background-color:#F7F2EF; --kt-scrollbar-color: #d9d0cc; --kt-scrollbar-hover-color: #d9d0cc">
                           <!--begin::Email template-->
                           <style>html,body { padding:0; margin:0; font-family: Inter, Helvetica, "sans-serif"; } a:hover { color: #009ef7; }</style>
                           <div id="#kt_app_body_content" style="background-color:#F7F2EF; font-family:Arial,Helvetica,sans-serif; line-height: 1.5; min-height: 100%; font-weight: normal; font-size: 15px; color: #2F3044; margin:0; padding:0; width:100%;">
                               <div style="background-color:#ffffff; padding: 45px 0 34px 0; border-radius: 24px; margin:40px auto; max-width: 600px;">
                                   <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" height="auto" style="border-collapse:collapse">
                                       <tbody>
                                           <tr>
                                               <td align="center" valign="center" style="text-align:center; padding-bottom: 10px">
                                                   <!--begin:Email content-->
                                                   <div style="text-align:center; margin:0 15px 34px 15px">
                                                       <!--begin:Logo-->
                                                       <div style="margin-bottom: 10px">
                                                           <a href="https://keenthemes.com/" rel="noopener" target="_blank">
                                                               <img alt="Logo" src="'.asset('user/assets/img/logo-blue.png').'" style="height: 35px" />
                                                           </a>
                                                       </div>
                                                       <!--end:Logo-->
                                                       <!--begin:Media-->
                                                       <div style="margin-bottom: 15px">
                                                           <img alt="Logo" src="'.asset('admin/assets/media/email/icon-positive-vote-2.svg').'" />
                                                       </div>
                                                       <!--end:Media-->
                                                       <!--begin:Text-->
                                                       <div style="font-size: 14px; font-weight: 500; margin-bottom: 27px; font-family:Arial,Helvetica,sans-serif;">
                                                           <p style="margin-bottom:9px; color:#181C32; font-size: 22px; font-weight:700">Hey '.$userName.', Thanks For Contacting Us!</p>
                                                           <p style="margin-bottom:2px; color:#7E8299">Thank you for taking the time to contact us. We appreciate your </p>
                                                           <p style="margin-bottom:2px; color:#7E8299">interest in our service and value your feedback. </p>
                                                           <p style="margin-bottom:2px; color:#7E8299">We are committed to providing excellent customer service and will do  </p>
                                                           <p style="margin-bottom:2px; color:#7E8299">our best to respond to your inquiry as soon as possible. </p>
                                                           <p style="margin-bottom:2px; color:#7E8299">If you have any further questions or concerns, please dont hesitate to reach out. </p>
                                                           <p style="margin-bottom:2px; color:#7E8299">We look forward to hearing from you again soon.</p>
                                                       </div>
                                                       <!--end:Text-->
                                                       <!--begin:Action-->
                                                       <a href="'.route('index').'" style="background-color:#50CD89; border-radius:6px;display:inline-block; padding:11px 19px; color: #FFFFFF; font-size: 14px; font-weight:500;">Back To Home Page</a>
                                                       <!--begin:Action-->
                                                   </div>
                                                   <!--end:Email content-->
                                               </td>
                                           </tr>
                                           
                                           '.$this->emailFooter();
    }
    public function contactMessageAdmin($req)
    {
        $sender_email = $req->email;
        $sender_name = $req->name;
        $sender_comment = $req->comment;
        $sender_phone = $req->phone;
        $user = User::find(2);
        $idora_Email = BlogSetting::where('title', 'email')->first()->content;
       return $this->emailHeader().'
                       <div class="scroll-y flex-column-fluid px-10 py-10" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_header_nav" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true" style="background-color:#F7F2EF; --kt-scrollbar-color: #d9d0cc; --kt-scrollbar-hover-color: #d9d0cc">
                           <!--begin::Email template-->
                           <style>html,body { padding:0; margin:0; font-family: Inter, Helvetica, "sans-serif"; } a:hover { color: #009ef7; }</style>
                           <div id="#kt_app_body_content" style="background-color:#F7F2EF; font-family:Arial,Helvetica,sans-serif; line-height: 1.5; min-height: 100%; font-weight: normal; font-size: 15px; color: #2F3044; margin:0; padding:0; width:100%;">
                               <div style="background-color:#ffffff; padding: 45px 0 34px 0; border-radius: 24px; margin:40px auto; max-width: 600px;">
                                   <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" height="auto" style="border-collapse:collapse">
                                       <tbody>
                                           <tr>
                                               <td align="center" valign="center" style="text-align:center; padding-bottom: 10px">
                                                   <!--begin:Email content-->
                                                   <div style="text-align:center; margin:0 15px 34px 15px">
                                                       <!--begin:Logo-->
                                                       <div style="margin-bottom: 10px">
                                                           <a href="https://keenthemes.com/" rel="noopener" target="_blank">
                                                               <img alt="Logo" src="'.asset('user/assets/img/logo-blue.png').'" style="height: 35px" />
                                                           </a>
                                                       </div>
                                                       <!--end:Logo-->
                                                       <!--begin:Media-->
                                                       <div style="margin-bottom: 15px">
                                                           <img alt="Logo" src="'.asset('admin/assets/media/email/icon-positive-vote-3.svg').'" />
                                                       </div>
                                                       <!--end:Media-->
                                                       <!--begin:Text-->
                                                       <div style="font-size: 14px; font-weight: 500; margin-bottom: 27px; font-family:Arial,Helvetica,sans-serif;">
                                                           <p style="margin-bottom:9px; color:#181C32; font-size: 22px; font-weight:700">Hi Idora Media, </p>
                                                           <p style="margin-bottom:9px; color:#181C32; font-size: 22px; font-weight:700">You Have A new message from <span style="color:#50CD89">'.$sender_name.'</span>!</p>
                                                           
                                                       </div>
                                                       <!--end:Text-->
                                                       <!--begin:Action-->
                                                       <a href="'.route('index').'" style="background-color:#50CD89; border-radius:6px;display:inline-block; padding:11px 19px; color: #FFFFFF; font-size: 14px; font-weight:500;">Back To Home Page</a>
                                                       <!--begin:Action-->
                                                   </div>
                                                   <!--end:Email content-->
                                               </td>
                                           </tr>
                                           <tr style="display: flex; justify-content: center; margin:0 60px 35px 60px">
                                               <td align="start" valign="start" style="padding-bottom: 10px;">
                                                   <p style="color:#181C32; font-size: 18px; font-weight: 600; margin-bottom:13px">'.$sender_name.',</p>
                                                   <!--begin::Wrapper-->
                                                   <div style="background: #F9F9F9; border-radius: 12px; padding:35px 30px">
                                                       <!--begin::Item-->
                                                       <div style="display:flex">
                                                           
                                                           <!--begin::Block-->
                                                           <div>
                                                               <!--begin::Content-->
                                                               <div>
                                                                   <!--begin::Title-->
                                                                   <a href="mailto:'.$sender_email.'" style="color:#50CD89; font-size: 14px; font-weight: 600;font-family:Arial,Helvetica,sans-serif">'.$sender_email.'</a>
                                                                   <!--end::Title-->
                                                                   <!--begin::Desc-->
                                                                   <p style="color:#5E6278; font-size: 13px; font-weight: 500; padding-top:3px; margin:0;font-family:Arial,Helvetica,sans-serif">"'.$sender_comment.'"</p>
                                                                   <!--end::Desc-->
                                                                   </div>
                                                               <!--end::Content-->
                                                               <!--begin::Separator-->
                                                               <div class="separator separator-dashed" style="margin:17px 0 15px 0"></div>
                                                               <!--end::Separator-->
                                                               <p style="color:#5E6278; font-size: 13px; font-weight: 500; padding-top:3px; margin:0;font-family:Arial,Helvetica,sans-serif">"'.$sender_phone.'"</p>
                                                           </div>
                                                           <!--end::Block-->
                                                       </div>
                                                       <!--end::Item-->
                                                       
                                                   </div>
                                                   <!--end::Wrapper-->
                                               </td>
                                           </tr>'.$this->emailFooter();
    }
}
