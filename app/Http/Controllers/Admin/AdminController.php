<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Livewire\AdminHeader;
use PHPMailer\PHPMailer\PHPMailer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Notifications\blogNotification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;
use App\Http\Controllers\EmailSendController;

class AdminController extends Controller
{
    public $adminHeader;

  public  function __construct()
    {
     $this->adminHeader = new AdminHeader();   
    }
    //
    public function welcome(){
        return view('admin.welcome');
    }
    //
    public function dbNotifyAdmin($title, $desc, $type){
         //send Notification To all Admin
         $admin = User::where('role', 1)->get();
         Notification::send($admin, new blogNotification([
             'desc'=>$desc,
             'blog_image' => '',
             'title'=> $title,
             'time'=> now(),
             'type' => $type
         ]));
    }

    public function AdminNotification(Request $req){
        return response()->json( $req->currentValue);
    }
    public function faq(Request $req){
        return view('admin.faq');
    }

    public function account_setting(){
        $data = [
            'user' => User::find(auth()->user()->id)
        ];
        return view('admin.account_setting', $data);
    }
    public function edit_details(){
        return view('admin.account_edit_details');
    }

    public function dashboard(){
        // dd(views_week_ago());
        return view('admin.dashboard');
    }
    public function testimonial(){
        return view('admin.testimonial');
    }
    
    public function users_list(){
        $users = User::where('role', 0)->get();
        // dd($users->toArray());
        return view('admin.users-list');
    }
    public function categories(){

        return view('admin.blog-categories');
    }
    public function new_blog(){

        return view('admin.new-blog');
    }
    public function user_posts(){

        return view('admin.user-posts');
    }
    public function site_setting(){

        return view('admin.site-setting');
    }
    public function profile_change(Request $req){
                // return response()->json(['status' => 1, 'msg' => "Your Profile Picture has been successfully Updated!!"]);
                $user = User::find(auth()->user()->id);
                $path = 'storage/images/authors/';
                $file = $req->file('file');
                $oldPicture =$user->profile_photo_path;
            $file_path = $path.$oldPicture;
            $new_picture_name = 'AIMG'.$user->id.time().rand(1, 100000).'.jpg';

            if($oldPicture != null && File::exists(public_path($file_path))){
                File::delete(public_path($file_path));
                $user->update([
                    'profile_photo_path' => null,
                    'profile_photo_updated_at' => null
                ]);
            }
            $upload = $file->move(public_path($path), $new_picture_name);
            if($upload){
                $user->update([
                    'profile_photo_path' => $new_picture_name,
                    'profile_photo_updated_at' => now()
                ]);
                return response()->json(['status' => 1, 'msg' => "Your Profile Picture has been successfully Updated!!"]);
            }else{
                return response()->json(['status' => 0, "Something Went Wrong!!"]);

            }
      
    }

    public function create_post(Request $req){
        
            $req->validate([
                'post_title' => 'required|unique:posts,post_title',
                'post_content' => 'required',
                'post_category' => 'required|exists:sub_categories,id',
                'meta_title' => 'required',
                'meta_desc' => 'required|max:300|min:50',
                'meta_tags' => 'required',
                'avatar'=> 'required|mimes:jpeg,jpg,png|max:3048'
                
            ]);

            if($req->hasFile('avatar')){
                $path = "images/post_images/";
                $file = $req->file('avatar');
                $filename = $file->getClientOriginalName();
                $newfilename = time().'_'.$filename;

                $upload = Storage::disk('public')->put($path.$newfilename, (string) file_get_contents($file));

                $post_thumbnail_path = $path.'thumbnails';
                if (!Storage::disk('public')->exists($post_thumbnail_path)) {   
                    Storage::disk('public')->makeDirectory($post_thumbnail_path, 0755, true, true);
                    # code...
                }

                //create square image
                Image::make(storage_path('app/public/'.$path.$newfilename))
                ->fit(300, 300)
                ->save(storage_path('app/public/'.$path.'thumbnails/'.'thumb_'.$newfilename));

                //create resized image
                Image::make(storage_path('app/public/'.$path.$newfilename))
                ->fit(500, 350)
                ->save(storage_path('app/public/'.$path.'thumbnails/'.'resized_'.$newfilename));

                if($upload){
                    $admin = User::where('role', 1)->get();
                  $post = new Post();
                  $post->author_id = auth()->id();
                  $post->category_id =  $req->post_category;
                  $post->post_title = $req->post_title;
                  $post->meta_title = $req->meta_title;
                  $post->meta_desc = $req->meta_desc;
                  $post->meta_tags = $req->meta_tags;
                  $post->post_tags = $req->post_tags;
                //   $post->post_slug = Str::slug($req->post_title);
                  $post->post_content = $req->post_content;
                  $post->featured_image = $newfilename;
                  $saved = $post->save();

                  if($saved){
                    //send emails to users 
                    Notification::send($admin, new blogNotification([
                        'desc'=>auth()->user()->name." Created A new Blog Post",
                        'blog_image' => $newfilename,
                        'title'=> 'new Blog Post Added',
                        'time'=> now(),
                        'type' => 'success'
                    ]));
                    if(isset($req->sendEmail) && $req->sendEmail == 1){
                        (new EmailSendController)->sendNewBlogEmail($post);
                      
                    }
                    $this->adminHeader->success_alert("Post Creation was Successfully Created, New Post Added");
                    return response()->json([
                        'code'=>1,
                        'msg'=>"New post has been created successfully!!"
                    ]);
                  }else{
                    $this->dbNotifyAdmin("Error Creating Post", "Post Creation was Unsuccessfull, An error occured", "danger");
                    $this->adminHeader->error_alert("Post Creation was Unsuccessfull, An error occured");
                    return response()->json([
                        'code'=>3,
                        'msg'=>"Something Went wrong while saveing new Post"
                    ]);
                  }
                }else{
                    $this->dbNotifyAdmin("Error Creating Post", "Post Creation was Unsuccessfull, Something Went wrong while uploading Featured Image", "danger");
                    $this->adminHeader->error_alert("Post Creation was Unsuccessfull, Something Went wrong while uploading Featured Image");
                    return response()->json([
                        'code'=>3,
                        'msg'=>"Something Went wrong while uploading Featured Image"
                    ]);
                }

            }
    }

   
    public function list_blog(){
        // $author = User::inRandomOrder()->where('role', 1)->first();
        // dd($author->name);
        return view('admin.list-blog');
    }
   
   
    public function edit_blog  (Request $req){
        if(!request()->post_id){
            return abort(404);
        }else{
            $post = Post::find(request()->post_id);
            $data = [
                'post'=>$post,
                'pageTitle' => "Edit Post |".$post->post_title,
            ];
        }
        return view('admin.edit-blog', $data);
    }

    public function update_blog(Request $request){
        if($request->hasFile('avatar')){
            $request->validate([
                'post_title' => 'required|unique:posts,post_title,'.$request->post_id,
                'post_content' => 'required',
                'post_category'=> 'required|exists:sub_categories,id',
                'meta_title' => 'required',
                'meta_desc' => 'required|max:300|min:50',
                'meta_tags' => 'required',
                'avatar'=> 'required|mimes:jpeg,jpg,png|max:2048'
            ]);

            $path = "images/post_images/";
            $file = $request->file('avatar');
            $filename = $file->getClientOriginalName();
            $new_filename = time().'_'.$filename;

            $upload = Storage::disk('public')->put($path.$new_filename, (string) file_get_contents($file));

            $post_thumbnails_path = $path.'thumbnails';
            if(!Storage::disk('public')->exists($post_thumbnails_path)){
                Storage::disk('public')->makeDirectory($post_thumbnails_path, 0755, true, true);
            };

            Image::make(storage_path('app/public/'.$path.$new_filename))
            ->fit(200, 200)
            ->save(storage_path('app/public/'.$path."thumbnails/"."thumb_".$new_filename));
            
            
            Image::make(storage_path('app/public/'.$path.$new_filename))
            ->fit(500, 350)
            ->save(storage_path('app/public/'.$path."thumbnails/"."resized_".$new_filename));

            if ($upload) {
                $old_post_image = Post::find($request->post_id)->featured_image;
                if ($old_post_image != null && Storage::disk('public')->exists($path.$old_post_image)) {
                   Storage::disk('public')->delete($path.$old_post_image);
                   if(Storage::disk('public')->exists($path.'thumbnails/resized_'.$old_post_image)){
                    Storage::disk('public')->delete($path.'thumbnails/resized_'.$old_post_image);
                   }

                   if(Storage::disk('public')->exists($path.'thumbnails/thumb_'.$old_post_image)){
                    Storage::disk('public')->delete($path.'thumbnails/thumb_'.$old_post_image);
                   }
                }
                
            $post = Post::find($request->post_id);
            $post->category_id =  $request->post_category;
            $post->post_title = $request->post_title;
            $post->meta_title = $request->meta_title;
            $post->meta_desc = $request->meta_desc;
            $post->meta_tags = $request->meta_tags;
            $post->post_tags = $request->post_tags;
            $post->featured_image = $new_filename;
            $post->post_slug = null;
            $post->post_content = $request->post_content;
            $saved = $post->save();

            if($saved){
                $this->dbNotifyAdmin("Post Updated successfully", auth()->user()->name." Updated A blog Post", "success");
                return response()->json(['code'=> 1, 'msg'=>'Post Updated successfully!']);
            }else{
                    $this->dbNotifyAdmin("Error Updating blog Post", "Post Update was Unsuccessfull, Something Went wrong  Updating Post!", "danger");
                    return response()->json(['code'=> 3, 'msg'=>'Something Went wrong Updating Post!']);
                    
                }
            } else {
                $this->dbNotifyAdmin("Error Updating blog Post", "Post Update was Unsuccessfull, Something Went wrong Uploading Featured Image!", "danger");
                return response()->json(['code'=> 3, 'msg'=>'Something Went wrong Uploading Featured Image']);
            }
            
        }else{
            $request->validate([
                'post_title' => 'required|unique:posts,post_title,'.$request->post_id,
                'post_content' => 'required',
                'post_category'=> 'required|exists:sub_categories,id',
                'meta_title' => 'required',
                'meta_desc' => 'required|max:300|min:50',
                'meta_tags' => 'required',
                // 'avatar'=> 'required|mimes:jpeg,jpg,png|max:2048'
            ]);

            $post = Post::find($request->post_id);
            $post->category_id =  $request->post_category;
            $post->post_title = $request->post_title;
            $post->meta_title = $request->meta_title;
            $post->meta_desc = $request->meta_desc;
            $post->meta_tags = $request->meta_tags;
            $post->post_tags = $request->post_tags;
            $post->post_slug = null;
            $post->post_content = $request->post_content;
            $saved = $post->save();

            if($saved){

                $this->dbNotifyAdmin("Post Updated successfully", auth()->user()->name." Updated A blog Post", "success");
                return response()->json(['code'=> 1, 'msg'=>'Post has been Updated Successfully']);
            }else{
                $this->dbNotifyAdmin("Post Update Failed!", "something went wrong while Updating Post", "danger");
                return response()->json(['code'=> 3, 'msg'=>'something went wrong while Updating Post']);
            }
        }
    }

}

