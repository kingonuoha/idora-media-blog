<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\BlogSetting;
use App\Notifications\blogNotification;
use Illuminate\Support\Facades\Notification;
use App\Http\Controllers\Admin\AdminController;

class SiteGeneralSettings extends Component
{
    public $settings;
    public $blog_name, $blog_email, $blog_description, $blog_telephone, $blog_address;

    public function updateGeneralSetting(){
        $this->validate([
            'blog_email' => "required|email",
            'blog_description' => "required|max:500",
            "blog_name" => "required",
            "blog_telephone" => "required", 
            "blog_address" => "required",
        ]);

        $update = $this->settings->update([
            'blog_name' => $this->blog_name,
            'blog_description' => $this->blog_description,
            'blog_email' => $this->blog_email,
            "blog_telephone" => $this->blog_telephone, 
            "blog_address" => $this->blog_address,
        ]);

        if ($update)  {
            # code...
            $this->dbNotifyAdmin("General Settings has been updated successfully by:". auth()->user()->name, "General Site Settings Updated ", "success");
            $this->showToast("General Settings has been updated successfully", "success");
            addLog("info", "General Site Settings Updated");
            // notify_admin('New Testimony',  $this->email." has Added a new Testimonial, do well to check it out for publishing!", 'info');
        }else{
            $this->dbNotifyAdmin("General Settings Failed to update by:". auth()->user()->name, "General Site Failed to Update", "danger");
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


    public function mount(){
        $this->settings = BlogSetting::find(1);
        $this->blog_name = $this->settings->blog_name;
        $this->blog_email = $this->settings->blog_email;
        $this->blog_description = $this->settings->blog_description;
        $this->blog_telephone = $this->settings->blog_telephone;
        $this->blog_address = $this->settings->blog_address;
        
    }
    public function render()
    {
        return view('livewire.site-general-settings');
    }
}
