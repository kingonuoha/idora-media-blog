<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //
    public function landing()
    {
    
       return view('users.index');
    }
    public function about()
    {
       return view('users.about');
    }
    public function services()
    {
       return view('users.services');
    }
    public function contact()
    {
       return view('users.contact');
    }
    public function add_testimonial ()
    {
       return view('users.add_testimonial ');
    }
}
