<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SendWelcomeEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //check if the user is coming from email sent to him
        if(request()->has('user') && request()->has('type') && request('type') == 'email'){
             $returned_user= User::where('id', request('user'))->get()->first();
            $updated = $returned_user->update([
                'email_sent_at' => now(),
            ]);
            if($updated){
                notify_admin("you have a returned User", $returned_user->name." Returned to Site via Email Sent to him/her");
                // dd('hi bruh');
            }
            // dd($returned_user);
        }

        if(auth()->hasUser() && auth()->user()->email_verified_at == null && auth()->user()->email_sent_at == null ){
            $user = User::where('id', auth()->user()->id)->get()->first();
            $data = [
               'user' => $user
           ];
            $mail_body = view('emails.welcome', $data)->render();
            $mailConfig = array(
               'mail_from_email' => env('EMAIL_FROM_ADDRESS'),
               'mail_from_name' => env('ENV_FROM_NAME'),
               'mail_recipient_email' => $user->email,
               'mail_recipient_name' => $user->name,
               'mail_subject' => "Welcome to Idora Media",
               'mail_body' => $mail_body
            );
            if (sendMailPHP($mailConfig)) {
                $user->update([
                    'email_sent_at' => now()
                ]);
            }
            
             ;
         }
        return $next($request);
    }
}
