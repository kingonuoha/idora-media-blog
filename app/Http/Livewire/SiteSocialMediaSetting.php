<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\BlogSocialMedia;
use App\Notifications\blogNotification;
use Illuminate\Support\Facades\Notification;

class SiteSocialMediaSetting extends Component
{
    public $blog_social_media;

    public $facebook_url, $instagram_url, $youtube_url, $twitter_url;

    public function mount(){
        $this->blog_social_media = BlogSocialMedia::find(1);
        $this->facebook_url = $this->blog_social_media->blog_facebook;
        $this->instagram_url = $this->blog_social_media->blog_instagram;
        $this->youtube_url = $this->blog_social_media->blog_youtube;
        $this->twitter_url = $this->blog_social_media->blog_twitter;
    }
    public function updateBlogSocialMedia()
    {
        $this->validate([
            'facebook_url' =>"nullable|url",
            'instagram_url' =>"nullable|url",
            'twitter_url' =>"nullable|url",
            'youtube_url' =>"nullable|url",
        ]);

       $updated =  $this->blog_social_media->update([
        'blog_facebook' => $this->facebook_url,
        'blog_instagram' => $this->instagram_url,
        'blog_youtube' => $this->youtube_url,
        'blog_twitter' => $this->twitter_url,
       ]);

       if ($updated)  {
        # code...
        $this->dbNotifyAdmin("social Media Settings has been updated successfully by:". auth()->user()->name, "General Site Settings Updated ", "success");
        $this->showToast("Social Media Settings has been updated successfully", "success");
        addLog("success", "Site Socials Updated");
        // notify_admin('New Testimony',  $this->email." has Added a new Testimonial, do well to check it out for publishing!", 'info');
    }else{
        $this->dbNotifyAdmin("Social Media  Settings Failed to update by:". auth()->user()->name, "Social Media  Site Failed to Update", "danger");
        $this->showToast("An error occured while updating Site settings", "success");
    }
    }

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

   
    public function showToast($message, $type){
        return $this->dispatchBrowserEvent('showToast', [
            'message'=> $message,
            'type'=>$type
        ]);
    }

    
    public function render()
    {
        return view('livewire.site-social-media-setting');
    }
}
