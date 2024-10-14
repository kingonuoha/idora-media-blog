<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AdminDashboard extends Component
{
    public $weekViews;
    public $weekViewsCount = [];
    public $weekViewsDays = [];
    public $stats ;

    public function mount()
    {   
        // dd(admin_dash()['mobile_visit']);
        $this->stats = admin_dash();
        $this->weekViews = views_week_ago();
        foreach ($this->weekViews as $key =>  $value) {
                    array_push($this->weekViewsCount, (Int)$value['count']);
                    array_push($this->weekViewsDays, $value['dayname']);
                    }
                   
                }
    public function render()
    {
        return view('livewire.admin-dashboard');
    }
}
