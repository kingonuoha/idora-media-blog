<?php

namespace App\Http\Controllers\Users;

use App\Models\Post;
use App\Models\User;
use App\Models\BlogViews;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use function PHPSTORM_META\type;
use Jenssegers\Agent\Facades\Agent;

use App\Http\Controllers\Controller;
use App\Models\Logs;
use App\Notifications\blogNotification;
use Illuminate\Support\Facades\Notification;

class BlogController extends Controller
{
    //
    public function blog_home(){
        return view('users.blog-index');
    }
    
    
  

    public function search_posts(Request $req){
      $query = request()->query('query');
    //   dd($query);
      if($query && strlen($query) >= 2){
            $searchVaues = preg_split("/\s+/", $query, -1, PREG_SPLIT_NO_EMPTY);
            $posts = Post::query();
            $posts->where(function($q) use($searchVaues){
               foreach ($searchVaues as $values ) {
                $q->orWhere('post_title', "LIKE", "%{$values}%");
                $q->orWhere('post_tags', "LIKE", "%{$values}%");
               }
            });
            $posts = $posts->with("subcategory")
                            ->with('author')
                            ->orderBy('created_at', 'desc')
                            ->paginate(6);

            $data = [
                "pageTitle" => "Showing results for :: ".request()->query('query'),
                'posts'=> $posts
            ];

            return view('users.search_posts', $data);
      }else{
        return abort(404);
      }
    }




    public function category_posts (Request $req, $slug){
        if(!$slug){
            return abort(404);
        }else{
            $subcategory = SubCategory::where('slug', $slug)->first();
            if(!$subcategory){
                return abort(404);
            }else{
                $posts = Post::where('category_id', $subcategory->id)
                            ->orderBy('created_at', 'desc')
                            ->paginate(6);

                            $data = [
                                "pageTitle" => "Category - ". $subcategory->subcategory_name,
                                'category' => $subcategory,
                                "posts"=>$posts

                             ];
                            return view('users.category-post', $data);
            }
        }
    }

    public function read_post($slug){
        
       if (!$slug) {
        return abort(404);
       }else{
        $post = Post::where('post_slug', $slug)
                    ->with('subcategory')
                    ->with('views')
                    ->with('author')
                    ->first();
                    // dd($post->id);
                    // dd(Agent::isMobile());
        // add views plus 1
        $blogViews = BlogViews::where(['ip_address' => request()->getClientIp(), 'post_id' => $post->id])->first();
        $admin = User::where('role', '!=', 0)->get();
        // $author
        
        if($blogViews){
                // user visited twice
                  //send emails to users 
                  Notification::send($admin, new blogNotification([
                    'desc'=>"A User returned back to read a post again on a ".$blogViews->device_name. " device",
                    'blog_image' => '',
                    'title'=> 'Returned reader',
                    'time'=> now(),
                    'type' => 'success'
                ]));
                
                $log = new Logs();
                $log->type = "success";
                $log->user_id = (auth()->hasUser())? auth()->user()->id : null;
                $log->message = "You have a returned Reader";
                $log->save();
            }else{
                
                $blogViews = new BlogViews();
                $blogViews->ip_address =  request()->getClientIp();
                $blogViews->post_id = $post->id;
                $blogViews->device_name = Agent::device();
                $blogViews->isMobile = Agent::isMobile();
                $blogViews->browser = Agent::browser();
                $blogViews->os = Agent::platform();
                $blogViews->save();

                Notification::send($admin, new blogNotification([
                  'desc'=>"A User Just Read Your Post on [".$post->title."], on a ".$blogViews->device_name. " device",
                  'blog_image' => '',
                  'title'=> 'New Reader',
                  'time'=> now(),
                  'type' => 'success'
              ]));
            }

        $data = [
            "pageTitle" => Str::ucfirst($post->post_title),
            'post'=>$post,
        ];
        return view('users.single-post', $data);
       }
    }

    public function single_author($id){
        $user = User::find($id);
        if(!$user){
           return abort(403, "Invalid Url Paremeters");
        }else{
            if ($user->role == 0) {
              return  abort(403, "Invalid Url Paremeters");
            }else{

                $data = [
                    'author' => $user
                ];
                addLog("info", " Your Profile was Viewed");
                Notification::send($user, new blogNotification([
                    'desc'=>"A User Viewed Your Profile Information, on a ".Agent::device(). " device",
                    'blog_image' => '',
                    'title'=> 'Profile Viewed',
                    'time'=> now(),
                    'type' => 'info'
                ]));
                return view('users.single-author', $data);
            }
                
        }
    }

}
