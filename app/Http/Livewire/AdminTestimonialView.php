<?php

namespace App\Http\Livewire;

use App\Models\Testimonials;
use Livewire\Component;

class AdminTestimonialView extends Component
{

    protected $listeners = [
        'deleteTestimonial'
    ];

    public function showToast($message, $type){
        return $this->dispatchBrowserEvent('showToast', [
            'message'=> $message,
            'type'=>$type
        ]);
    }
    public function publish($id){
        $testimony = Testimonials::find($id);
        $testimony->update([
            'active' => true
        ]);
        $this->showToast('Testimony has been Published to the general Public', 'info');

       
    }
    public function disable($id){
        $testimony = Testimonials::find($id);
        $testimony->update([
            'active' => false
        ]);
        $this->showToast('Testimony has been Disabled, only Admins can view', 'warning');
       
    }
    public function delete($id){
        // dd('Hi');
      return $this->dispatchBrowserEvent('deleteTestimonialConfirm', [
        "title" => 'Are you Sure?',
        "message" => 'You are bout to delete selected Testimony, pls note that this action cannot be undone, proceed?',
        "id" => $id,
      ]);
    }
    public function deleteTestimonial($id){
        $testimony = Testimonials::find($id);
        $testimony->delete();
        return $this->dispatchBrowserEvent('success_alert', [
          "message" => 'Testimonial Has been successfully removed!',
        ]);
    }
    public function render()
    {
        return view('livewire.admin-testimonial-view');
    }
}
