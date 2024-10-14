@extends('layouts.email.email_layout')
@section('content')

                                <!--begin:Media-->
                                <div style="margin-bottom: 15px">
                                    <img alt="Logo" src="{{asset('admin/assets/media/email/icon-positive-vote-2.svg')}}" />
                                </div>
                                <!--end:Media-->
                                <!--begin:Text-->
                                <div style="font-size: 14px; font-weight: 500; margin-bottom: 27px; font-family:Arial,Helvetica,sans-serif;">
                                    <p style="margin-bottom:9px; color:#181C32; font-size: 22px; font-weight:700">Hey '.$userName.', Thanks For Contacting Us!</p>
                                    <p style="margin-bottom:2px; color:#7E8299">Thank you for taking the time to contact us. We appreciate your </p>
                                    <p style="margin-bottom:2px; color:#7E8299">interest in our service and value your feedback. </p>
                                    <p style="margin-bottom:2px; color:#7E8299">We are committed to providing excellent customer service and will do  </p>
                                    <p style="margin-bottom:2px; color:#7E8299">our best to respond to your inquiry as soon as possible. </p>
                                    <p style="margin-bottom:2px; color:#7E8299">If you have any further questions or concerns, please dont hesitate to reach out. </p>
                                    <p style="margin-bottom:2px; color:#7E8299">We look forward to hearing from you again soon.</p>
                                </div>
                                <!--end:Text-->
                                <!--begin:Action-->
                                <a href="{{route('index', ['user'=> 1, 'type'=>'email'])}}" style="background-color:#50CD89; border-radius:6px;display:inline-block; padding:11px 19px; color: #FFFFFF; font-size: 14px; font-weight:500;">Back To Home Page</a>
                                <!--begin:Action-->
                            
                    
                    
@endsection