<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Livewire\UserNotifications;
use App\Http\Controllers\EmailSendController;
use App\Http\Controllers\Users\BlogController;
use App\Http\Controllers\Users\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\EmailTemplateController;
use App\Http\Controllers\Auth\SocialAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::middleware(['auth:sanctum', 'isAdmin', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard/notification', [AdminController::class, 'AdminNotification'])->name('notification');
    Route::get('/users/list', [AdminController::class, 'users_list'])->name('users');
    Route::get('/users/', [AdminController::class, 'user_single'])->name('user_single');
    Route::get('/blog/create', [AdminController::class, 'new_blog'])->name('new_blog');
    Route::post('/blog/newPost/create', [AdminController::class, 'create_post'])->name('create_post');
    Route::get('/blog/categories', [AdminController::class, 'categories'])->name('categories');
    Route::get('/blog/list', [AdminController::class, 'list_blog'])->name('list_blog');
    Route::get('/blog/edit', [AdminController::class, 'edit_blog'])->name('edit_blog');
    Route::post('/blog/edit/save', [AdminController::class, 'update_blog'])->name('update_blog');
    Route::get('/blog/setting', [AdminController::class, 'blog_setting'])->name('blog_setting');
    Route::get('/setting/account', [AdminController::class, 'account_setting'])->name('account_setting');
    Route::get('/setting/account/edit_details', [AdminController::class, 'edit_details'])->name('edit_details');
    Route::get('/setting/account/logs', [AdminController::class, 'user_logs'])->name('user_logs');
    Route::get('/setting/account/posts', [AdminController::class, 'user_posts'])->name('user_posts');
    Route::get('/setting/account/notifications',  UserNotifications::class)->name('user_notification');
    Route::post('/setting/account/change-profile-picture', [AdminController::class, 'profile_change'])->name('profile_change');
    Route::get('/setting/site', [AdminController::class, 'site_setting'])->name('site_setting');
    Route::get('/extra/testimonial', [AdminController::class, 'testimonial'])->name('testimonial');
    Route::get('/extra/others', [AdminController::class, 'others'])->name('others');
    Route::get('/extra/faq', [AdminController::class, 'faq'])->name('faq');
    Route::get('/new-user/welcome', [AdminController::class, 'welcome'])->name('welcome');
    
    });
    
    Route::get('/v/dashboard', function () {
        return view('dashboard');
    })->name('vdashboard');

    // Social Auth Routes 

Route::get('/login_google', [SocialAuthController::class, 'G_redirectToProvider'])->name('google.login');
Route::get('/auth/google/callback', [SocialAuthController::class, 'G_handleCallback'])->name('google.login.callback');


Route::get('/login_facebook', [SocialAuthController::class, 'FB_redirectToProvider'])->name('facebook.login');
Route::get('/auth/facebook/callback', [SocialAuthController::class, 'FB_handleCallback'])->name('facebook.login.callback');


    // Guest or Auth User Routes 
    Route::get('/version', function () {
        return view('welcome');
    })->name('dev');

    Route::middleware([ 'auth', 'verified', 'isEmailConfrimed', "countPageVisits"])->group(function(){
            
            Route::get('/', [HomeController::class, 'landing'])->name('index');
            Route::get('/about', [HomeController::class, 'about'])->name('about');
            Route::get('/services', [HomeController::class, 'services'])->name('services');
            Route::get('/contact/idora', [HomeController::class, 'contact'])->name('contact');

            // Blog Related {Posts}
            Route::get('/blog', [BlogController::class, 'blog_home'])->name('blog_home');
            Route::get('/article/{any}', [BlogController::class, 'read_post'])->name('read_post');
            Route::get('/category/{any}', [BlogController::class, 'category_posts'])->name('category_posts');
            Route::get('/posts/{any}', [BlogController::class, 'tag_posts'])->name('tag_posts');
            Route::get('/posts/q/search', [BlogController::class, 'search_posts'])->name('search_posts');
            Route::get('/author/single/{any}', [BlogController::class, 'single_author'])->name('single_author');
            Route::middleware(['auth:sanctum', config('jetstream.auth_session')])->group(function(){
                Route::get('/add_testimonial/new', [HomeController::class, 'add_testimonial'])->name('add_testimonial');
            });

            // Route::get('/', [HomeController::class, 'landing'])->name('index');
            // Route::get('/', [HomeController::class, 'landing'])->name('index');
            // Route::get('/', [HomeController::class, 'landing'])->name('index');
    
    });

    //email Testing Route
    // Route::get('/email/welcome', [EmailTemplateController::class, 'welcomeMessage']);
    // Route::get('/email/welcome/send', [EmailSendController::class, 'sendWelcomeMsg']);
    Route::post('/email/contact/send', [EmailSendController::class, 'sendContactUs'])->name('contact.sendMail');
    // Route::get('/email/contact/send/reciever', [EmailTemplateController::class, 'contactMessageReciever']);
    // Route::get('/email/contact/send/admin', [EmailTemplateController::class, 'contactMessageAdmin']);
    // Route::get('/email/new_blog_post/', [EmailTemplateController::class, 'newBlog_email']);
    Route::get('/link_storage', function(){
        dd(Artisan::call("storage:link"));
    });



    Route::prefix('email/')->group(function () {
        
        Route::get('send_message/send', function(){
            (new EmailSendController())->sendWelcomeMsg();
            dd('done');
        });
        Route::get('v/welcome/', [EmailTemplateController::class, 'welcomeView'])->name('email.welcome');
        Route::get('v/contact/reciever', [EmailTemplateController::class, 'contactMessageRecieverView'])->name('email.contact.reciever');
    });