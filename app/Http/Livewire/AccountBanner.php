<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class AccountBanner extends Component
{
    public $author;
    protected $listeners = [
        "updateAdminBanner" => '$refresh'
    ];
 
    public function mount(){
        $this->author = User::find(auth()->user()->id);
    }
    public function render()
    {
        return view('livewire.account-banner');
    }
}
