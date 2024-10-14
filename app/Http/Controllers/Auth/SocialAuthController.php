<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    //
    public function G_redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function G_handleCallback(){
        try {
            //code...
            $user = Socialite::driver('google')->user();

        } catch (\Throwable $th) {
            return redirect("login")->with('error', $th->getMessage());
        }

        // /existing user 
        $existingUser = User::where('google_id', $user->id)->first();

        if($existingUser){
            Auth::login($existingUser, true);
        }

        else{
            $newUser = User::create([
                'name'=> $user->name,
                "google_id" => $user->id,
                "email"=> $user->email,
                "profile_photo_path" => $user->getAvatar()
            ]);

            Auth::login($newUser, true);
        }

        return redirect('/')->with( 'success','Google Authentication Successfull');
        
        // dd($user);
    }


    public function FB_redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function FB_handleCallback(){
        $user = Socialite::driver('facebook')->user();
        dd($user);
        try {
            //code...
            $user = Socialite::driver('facebook')->user();

        } catch (\Throwable $th) {
            return redirect("login")->with('error', $th->getMessage());
        }

        // /existing user 
        $existingUser = User::where('facebook_id', $user->id)->first();

        if($existingUser){
            Auth::login($existingUser, true);
        }

        else{
            $newUser = User::create([
                'name'=> $user->name,
                "facebook_id" => $user->id,
                "email"=> $user->email,
                "profile_photo_path" => $user->getAvatar()
            ]);

            Auth::login($newUser, true);
        }

        return redirect('/')->with( 'success','Google Authentication Successfull');
        
        // dd($user);
    }
}
