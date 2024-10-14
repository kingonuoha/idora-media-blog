<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UserHeader extends Component
{
    public function render()
    {
        return view('livewire.user-header');
    }

    // public function showfun(){
    //     $this->showToast('Hello bruh', 'success');
    // }
    public function showToast($message, $type){
        return $this->dispatchBrowserEvent('showToast', [
            'message'=> $message,
            'type'=>$type
        ]);
    }
}
