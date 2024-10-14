<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Notifications\blogNotification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;

class AllUserPost extends Component
{
    use WithPagination;
    public $perPage = 10;
    public $search = null;
    public $author = null;
    public $category = null;
    public $orderBy = null;

    protected $listeners = [
        'deletePostAction'
    ];

    public function mount(){
        // $this->author = auth()->user();
        $this->resetPage();
    }

    public function updatingSearch(){
        $this->resetPage();
    }
    public function updatingCategory(){
        $this->resetPage();
    }
    public function updatingAuthor(){
        $this->resetPage();
    }

    public function deletePost($id)
    {
        $this->dispatchBrowserEvent('deletePostConfirm',[
            'title' => "Are you sure?",
            'body' => "You are about to delete this Post, This action cannot be reversed",
            'id'=>$id
        ]);
    }

    public function deletePostAction($id){
        // dd("Deleting...".$id);
        $post = Post::find($id);
        $post_name = $post->post_title;
        $path = "images/post_images/";
        $featured_image = $post->featured_image;

        if($featured_image != null && Storage::disk('public')->exists($path.$featured_image)){
            //delete resized image
            if(Storage::disk('public')->exists($path.'thumbnails/resized_'.$featured_image)){
                Storage::disk('public')->delete($path.'thumbnails/resized_'.$featured_image);
               }

               //delete resized image
            if(Storage::disk('public')->exists($path.'thumbnails/thumb_'.$featured_image)){
                Storage::disk('public')->delete($path.'thumbnails/thumb_'.$featured_image);
               }

               //delete Main image
                Storage::disk('public')->delete($path.$featured_image);
        }
        $delete_post = $post->delete();
        if($delete_post){
                //send Notification To all Admin
                $admin = User::where('role', 1)->get();
                Notification::send($admin, new blogNotification([
                    'desc'=>auth()->user()->name." Deleted A Post, Post Name=>(".$post_name.")",
                    'blog_image' => '',
                    'title'=> 'A Blog Post has been Deleted!',
                    'time'=> now(),
                    'type' => 'warning'
                ]));
            $this->showToast("Post Has been Successfully Deleted!", 'success');
        }else{
            $this->showToast("Something Went Wrong!!", 'error');
        }
    }

    public function showToast($message, $type){
        return $this->dispatchBrowserEvent('showToast', [
            'message'=> $message,
            'type'=>$type
        ]);
    }

    public function render()
    {
        
        return view('livewire.all-user-post', [
            'posts'=> Post::
            searchUser(trim($this->search))
            ->when($this->category, function($query){
                $query->where('category_id', $this->category);
            })
            ->when($this->orderBy, function($query){
                $query->orderBy('id', $this->orderBy);
            })
            ->paginate($this->perPage)
        ]);
    }
}
