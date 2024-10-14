@extends('layouts.email.email_layout')
    @section('content')



                                <!--begin:Media-->
                                <div style="margin-bottom: 15px">
                                    <img alt="Logo" src="{{asset('admin/assets/media/email/icon-positive-vote-1.svg')}}" />
                                </div>
                                <!--end:Media-->
                                <!--begin:Text-->
                                <div style="font-size: 14px; font-weight: 500; margin-bottom: 27px; font-family:Arial,Helvetica,sans-serif;">
                                    <p style="margin-bottom:9px; color:#181C32; font-size: 22px; font-weight:700">Hey {{$user->name}}, thanks for signing up!</p>
                                    <p style="margin-bottom:2px; color:#7E8299">We are delighted to welcome you to Idora Media Website! </p>
                                    <p style="margin-bottom:2px; color:#7E8299">We are excited to have you join our team and look forward  </p>
                                    <p style="margin-bottom:2px; color:#7E8299">to the contributions you will make.</p>
                                </div>
                                <!--end:Text-->
                                <!--begin:Action-->
                                <a href="{{route('index', ['user'=> $user->id])}}" style="background-color:#50CD89; border-radius:6px;display:inline-block; padding:11px 19px; color: #FFFFFF; font-size: 14px; font-weight:500;">Back To Home Page</a>
                                <!--begin:Action-->
                           
                    
@endsection
