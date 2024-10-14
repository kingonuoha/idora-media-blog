<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Hamcrest\Core\IsTypeOf;
use Livewire\WithPagination;
use App\Notifications\blogNotification;
use Illuminate\Support\Facades\Notification;

class Users extends Component
{
    use WithPagination;

    public $search;
    public $role;
    public $selected_user_id;
    public $selected_user_role;
    public $user_name;
    public $blocked = 0;
    public $perPage = 4;

    protected $listeners = ['deleteUserConfirmed'];


    public function mount(){
        $this->resetPage();
    }

    public function updatingSearch(){
        $this->resetPage();
    }


    public function editUser($author)    {
        
        $this->selected_user_id = $author['id'] ;
        $this->selected_user_role = $author['role'] ;
        $this->user_name = $author['name'] ;
        $this->blocked = 0;// $author['blocked'];
        $this->dispatchBrowserEvent('show_edit_user_modal');
    }
    public function updateUser(){
        $this->validate([
            'selected_user_role' =>"required|int",
        ]);

        if ($this->selected_user_id) {
            $user = User::find($this->selected_user_id);
            // dd( $user);
            $user->update([
                'role' => $this->selected_user_role,
                'blocked' => $this->blocked
            ]);
        }
    
        Notification::send($user, new blogNotification([
            'desc'=>auth()->user()->name." Added You to become An Administrator",
            'blog_image' => '',
            'title'=> 'You were made an Admin!',
            'time'=> now(),
            'type' => 'success'
        ]));
        $this->showToast("User Details Has been Updated Successfully", 'success');
        $this->dispatchBrowserEvent('hide_edit_user');
        // dd("Hi Bruh!");
    }

    public function showToast($message, $type){
        return $this->dispatchBrowserEvent('showToast', [
            'message'=> $message,
            'type'=>$type
        ]);
    }

    public function deleteUser($userId){
        $user = User::find($userId);
        return $this->dispatchBrowserEvent('alert:deleteUserConfirm', [
            'message'=> "you are about to Permanently Delete ". $user->name." from Idora Media, Proceed?",
            'userId'=>$userId
        ]);
    }
    public function deleteUserConfirmed($userId){
        $user = User::find($userId);
        $deluser = $user->delete();
        if($deluser){
            return $this->dispatchBrowserEvent('info_alert', [
                'message'=> $user->name."has been Deleted from Idora Media",
            ]);
        }
    }

    public function render()
    {
        return view('livewire.users', [
            'authors'=> User::search(trim($this->search)) 
            ->when($this->role, function($query){
                $query->where('role', $this->role);
            })
             ->where('id', '!=', auth()->user()->id)->paginate($this->perPage)
        ]);
    }
}
