<?php

namespace App\Http\Livewire;

use App\Models\Testimonials;
use App\Models\User;
use Livewire\Component;

class AddTestimonial extends Component
{
    public $user;
    public $name, $email, $message;

    public function mount(){
        $this->user = User::where('id', auth()->user()->id)->first();
        $this->email = $this->user->email;
        $this->name = $this->user->name;
    }

    public function addTestimonial(){
        $this->validate([
            'email' => 'required|email',
            'name'=> 'required',
            'message' => "required|max:300"
        ]);

        $testimony = new Testimonials();
        $testimony->name = $this->name;
        $testimony->user_id = $this->user->id;
        $testimony->message = $this->message;
        $saved = $testimony->save();
        if($saved){
            addLog("info", $this->email." has Added a Testimonial");
            notify_admin('New Testimony',  $this->email." has Added a new Testimonial, do well to check it out for publishing!", 'info');
            $this->dispatchBrowserEvent('success_alert', [
                'message' => "Testimonial Addedd Successfully"
            ]);
        }
    }
    public function render()
    {
        return view('livewire.add-testimonial');
    }
}
