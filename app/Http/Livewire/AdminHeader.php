<?php

namespace App\Http\Livewire;

use App\Models\Logs;
use App\Models\User;
use Livewire\Component;

class AdminHeader extends Component
{

    public $user, $links;
    protected $listeners = [
        "updateAdminHeader" => '$refresh'
    ];
 

    public function mount()
    {
        $this->user= User::find(auth()->user()->id);
       
        $this->links = (new SideBar())->links();
    }
    public function render()
    {
       $user = $this->user;
        return view('livewire.admin-header', ['links'=>$this->links,], compact('user'));
    }

    

    public function markAlertsAsRead($previousCount){
        $user= User::find(auth()->user()->id);
        $newCount =$user->unreadNotifications->count();
        $user->unreadNotifications->markAsRead();
        if($newCount != $previousCount){
            
        }
    }

    public function saveLog($message, $type){
        $log = new Logs();
        $log->message = $message;
        $log->type = $type;
        $log->save();
    }

    public function markAllAsRead(){
        $user= User::find(auth()->user()->id);
        // $newCount =$user->unreadNotifications->count();
        $user->unreadNotifications->markAsRead();
      $this->showToast('All Notifications Are now Marked as Read', 'info');
    }
  
    public function showToast($message, $type){
        $this->saveLog(substr($message, 20).'...', $type);
        return $this->dispatchBrowserEvent('showToast', [
            'message'=> $message,
            'type'=>$type
        ]);
    }
    public function success_alert($message){
        $this->saveLog(substr($message, 20).'...', 'success');

        return $this->dispatchBrowserEvent('success_alert', [
            'message'=> $message,
        ]);
    }
    public function error_alert($message){
        $this->saveLog(substr($message, 20).'...', 'danger');

        return $this->dispatchBrowserEvent('error_alert', [
            'message'=> $message,
        ]);
    }
    public function warning_alert($message){
        $this->saveLog(substr($message, 20).'...', 'warning');

        return $this->dispatchBrowserEvent('warning_alert', [
            'message'=> $message,
        ]);
    }
    public function info_alert($message){
        $this->saveLog(substr($message, 20).'...', 'info');

        return $this->dispatchBrowserEvent('info_alert', [
            'message'=> $message,
        ]);
    }
}
