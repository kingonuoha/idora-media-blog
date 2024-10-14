<?php

namespace App\Http\Livewire;

use App\Models\Faq;
use Livewire\Component;

class FaQuestions extends Component
{
    public $faqs, $faq_edit_id, $faq_edit_answer, $faq_edit_question;

    protected $listeners = [
        "updateAdminFaq" => '$refresh',
        'deleteFaqConfirmed'
    ];

    // public function mount(){
    // }
    public function saveEdit(){
        $faq = Faq::findOrFail($this->faq_edit_id);
        $faq->question = $this->faq_edit_question;
        $faq->answer = $this->faq_edit_answer;
        $updated = $faq->save();
        if($updated){
       $this->info_alert('Question has been Successfully Updated!, Running some functions in the background');
       $this->dispatchBrowserEvent('closeFaqModal');
    }else{
            $this->error_alert('An error Occured saving update!');

        }
    }

    public function EditFaq($id){
        $question = Faq::find($id);
        $this->faq_edit_answer = $question->answer;
        $this->faq_edit_id = $id;
        $this->faq_edit_question = $question->question;
        $this->dispatchBrowserEvent('showFaqModal');
    }

    public function deleteFaq($id){
        // dd($id);
       $this->dispatchBrowserEvent('deleteFaqConfirm', [
        'title' => "Are you Sure?",
        'msg' => "You are about to Delete this Question, Action cannot be reversed!",
        'id' => $id
       ]);
    }
    public function deleteFaqConfirmed($id){
       $question = Faq::find($id);
       $question->delete();
       $this->emit('updateAdminFaq');
       $this->info_alert('Question has been Successfully Deleted!');
    }

    public function info_alert($message){
        (new AdminHeader)->saveLog(substr($message, 20).'...', 'info');

        return $this->dispatchBrowserEvent('info_alert', [
            'message'=> $message,
        ]);
    }
    public function error_alert($message){
        (new AdminHeader)->saveLog(substr($message, 20).'...', 'info');

        return $this->dispatchBrowserEvent('error_alert', [
            'message'=> $message,
        ]);
    }

    public function render()
    {
        $this->faqs = Faq::all();
        return view('livewire.fa-questions');
    }
}
