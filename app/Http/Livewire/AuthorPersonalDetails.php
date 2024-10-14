<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthorPersonalDetails extends Component
{
    public $author;
    public $name, $phone, $occupation, $facebook_url, $youtube_url, $instagram_url,
        $twitter_url, $about_me, $about_work, $digital_marketing, $content_creation,
        $blogging;
    public $current_password, $new_password, $confirm_password;

    public function mount()
    {
        $this->author = User::find(auth()->user()->id);
        $this->name = $this->author->name;
        $this->phone = $this->author->phone;
        $this->occupation = $this->author->occupation;
        $this->facebook_url = $this->author->facebook_url;
        $this->youtube_url = $this->author->youtube_url;
        $this->instagram_url = $this->author->instagram_url;
        $this->twitter_url = $this->author->twitter_url;
        $this->about_me = $this->author->about_me;
        $this->about_work = $this->author->about_work;
        $this->digital_marketing = $this->author->digital_marketing;
        $this->content_creation = $this->author->content_creation;
        $this->blogging = $this->author->bloging;
    }

    public function UpdateDetails()
    {
        $this->validate([
            "name" => "required|max:30",
            "phone" => "required|max:13|min:10",
            "occupation" => "required",
            "facebook_url" => "nullable|url",
            "youtube_url" => "nullable|url",
            "instagram_url" => "nullable|url",
            "twitter_url" => "nullable|url",
            "about_me" => "nullable|max:1000|min:200",
            "about_work" => "nullable|max:700|min:150",
            "digital_marketing" => "nullable",
            "content_creation" => "nullable",
            "blogging" => "nullable"
        ]);

        $updated =    User::where('id', auth()->user()->id)->update([
            "name" => $this->name,
            "phone" => $this->phone,
            "occupation" => $this->occupation,
            "facebook_url" => $this->facebook_url,
            "youtube_url" => $this->youtube_url,
            "instagram_url" => $this->instagram_url,
            "twitter_url" => $this->twitter_url,
            "about_me" => $this->about_me,
            "about_work" => $this->about_work,
            "digital_marketing" => $this->digital_marketing,
            "content_creation" => $this->content_creation,
            "bloging" => $this->blogging,

        ]);

        if ($updated) {
            $this->emit('updateAdminHeader');
            $this->emit('updateAdminBanner');
            $this->dispatchBrowserEvent('success_alert', [
                'message' => "Profile details has been updated Successfully!"
            ]);
            addLog("info", "Profile Updated");
            // notify_admin('New Testimony',  $this->email." has Added a new Testimonial, do well to check it out for publishing!", 'info');
        }
    }
    public function updatePassword()
    {
        // dd('hi');
         $this->validate([
            "current_password"=>"required|min:5",
            "new_password"=>"required|min:8|max:15",
            "confirm_password"=>"required|min:8|max:15|same:new_password",

        ]);
          // Get the authenticated user
    $user = Auth::user();

    // Check if the provided current password matches the user's current password
    if (!Hash::check($this->current_password, $user->password)) {
        $this->addError('current_password', 'The current password is incorrect.');
        return;
    }

    // Update the user's password
    $user->update([
        'password' => Hash::make($this->new_password),
    ]);
     $this->dispatchBrowserEvent('success_alert', [
                'message' => "Password was Successfully Updated, your new password is ".$this->new_password.", and will take effect upon your next login!!"
            ]);
            notify_admin("Password Updated", "Password was Successfully Updated, your new password is ".$this->new_password.", and will take effect upon your next login!!");
    }
    public function render()
    {
        return view('livewire.author-personal-details');
    }
}
