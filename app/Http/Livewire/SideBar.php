<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SideBar extends Component
{
    public function render()
    {
       $links  = $this->links();
        return view('livewire.side-bar', ['link' => $links]);
    }

    public function links(){
        return  [
            'Users' => [
                ['title'=>'Users List', 'url' => route('users')],

            ],
            'Blog' => [
                ['title'=>'Blog Categories', 'url' => route('categories')],
                ['title'=>'New Blog', 'url' => route('new_blog')],
                ['title'=>'List Blog', 'url' => route('list_blog')],

            ],
            'Account' => [
                ['title'=>'Account Overview', 'url' => route('account_setting')],
                ['title'=>'Edit Profile', 'url' => route('edit_details')],
                // ['title'=>'Logs', 'url' => route('user_logs')],
                ['title'=>'My Posts', 'url' => route('user_posts')],
                ['title'=>'Site Setting', 'url' => route('site_setting')],
                ['title'=>'Notifications', 'url' => route('user_notification')]

            ],
            'Extras' => [
                ['title'=>'Testimonials', 'url' => route('testimonial')],
                ['title'=>'Others', 'url' => route('others')],
                ['title'=>'Faq', 'url' => route('faq')],

            ],
            
        ];
    }
}
