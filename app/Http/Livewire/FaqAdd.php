<?php

namespace App\Http\Livewire;

use App\Models\Faq;
use App\Models\Logs;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class FaqAdd extends Component
{
    public $question, $answer;

    protected $listeners = [
        'clearFaqAddForm',
    ];
    public function clearFaqAddForm(){
        // dd('hi');
        $this->resetErrorBag();
        $this->question = null;
        $this->answer = null;
    }
    public function addFaq(){
        $this->emit('updateAdminFaq');

        $this->validate([
            'question' => 'required|max:30|unique:faqs,question',
            'answer' => 'required'
        ]);
       $faq = new Faq();
       $faq->question = $this->question;
       $faq->answer = $this->answer;
       $faq->publish = false;

       $saved = $faq->save();
       if($saved){
           $this->emit('updateAdminFaq');
           $this->emit('clearFaqAddForm');
           $this->clearFaqAddForm();
        //    $this->refresh;
           $this->showToast('Question has been Successfully Saved', 'success');
           $this->info_alert('Question has been Successfully Saved');
        }else{
        $this->showToast('An Error Occured while processing Query', 'danger');
        // $this->info_alert('Question has been Successfully Saved');
       }

    }
    public function saveLog($message, $type){
        $log = new Logs();
        $log->message = $message;
        $log->type = $type;
        $log->save();
    }
    public function info_alert($message){
        $this->saveLog(substr($message, 20).'...', 'info');

        return $this->dispatchBrowserEvent('info_alert', [
            'message'=> $message,
        ]);
    }

    public function showToast($message, $type){
        $this->saveLog(substr($message, 20).'...', $type);
        return $this->dispatchBrowserEvent('showToast', [
            'message'=> $message,
            'type'=>$type
        ]);
    }
    public function render()
    {
        return view('livewire.faq-add');
    }
}
