

@extends('layouts.email.email_layout')
@section('content')


                                <!--begin:Media-->
                                <div style="margin-bottom: 15px">
                                    <img alt="Logo" src="{{asset('admin/assets/media/email/icon-positive-vote-3.svg')}}" />
                                </div>
                                <!--end:Media-->
                                <!--begin:Text-->
                                <div style="font-size: 14px; font-weight: 500; margin-bottom: 27px; font-family:Arial,Helvetica,sans-serif;">
                                    <p style="margin-bottom:9px; color:#181C32; font-size: 22px; font-weight:700">Hi Idora Media, </p>
                                    <p style="margin-bottom:9px; color:#181C32; font-size: 22px; font-weight:700">You Have A new message from <span style="color:#50CD89">{{$sender_name}}</span>!</p>
                                    
                                </div>
                                <!--end:Text-->
                                <!--begin:Action-->
                                <a href="{{route('dashboard')}}" style="background-color:#50CD89; border-radius:6px;display:inline-block; padding:11px 19px; color: #FFFFFF; font-size: 14px; font-weight:500;">Back To Admin Page</a>
                                <!--begin:Action-->
                            
                        </td>
                    </tr>
                    <tr style="display: flex; justify-content: center; margin:0 60px 35px 60px">
                        <td align="start" valign="start" style="padding-bottom: 10px;">
                            <p style="color:#181C32; font-size: 18px; font-weight: 600; margin-bottom:13px">{{$sender_name}},</p>
                            <!--begin::Wrapper-->
                            <div style="background: #F9F9F9; border-radius: 12px; padding:35px 30px">
                                <!--begin::Item-->
                                <div style="display:flex">
                                    
                                    <!--begin::Block-->
                                    <div>
                                        <!--begin::Content-->
                                        <div>
                                            <!--begin::Title-->
                                            <a href="mailto:{{$sender_email}}" style="color:#50CD89; font-size: 14px; font-weight: 600;font-family:Arial,Helvetica,sans-serif">{{$sender_email}}</a>
                                            <!--end::Title-->
                                            <!--begin::Desc-->
                                            <p style="color:#5E6278; font-size: 13px; font-weight: 500; padding-top:3px; margin:0;font-family:Arial,Helvetica,sans-serif">"{{$sender_comment}}"</p>
                                            <!--end::Desc-->
                                            </div>
                                        <!--end::Content-->
                                        <!--begin::Separator-->
                                        <div class="separator separator-dashed" style="margin:17px 0 15px 0"></div>
                                        <!--end::Separator-->
                                        <p style="color:#5E6278; font-size: 13px; font-weight: 500; padding-top:3px; margin:0;font-family:Arial,Helvetica,sans-serif">"{{$sender_phone}}"</p>
                                    </div>
                                    <!--end::Block-->
                                </div>
                                <!--end::Item-->
                                
                            </div>
                            <!--end::Wrapper-->
                        </td>
                    </tr>


                    @endsection