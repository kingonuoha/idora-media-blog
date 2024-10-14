{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>


 --}}










 @extends('layouts.auth')
 @section('title', "Idora Media | Create Account")
 
     @section('content')
         
 <div class="d-flex flex-column flex-root" id="kt_app_root">
     
     <style>body { background-image: url("{{asset('admin/assets/media/auth/bg4.jpg')}}"); } [data-theme="dark"] body { background-image: url("{{asset('admin/assets/media/auth/bg9-dark.jpg')}}"); }</style>
     
     
     <div class="d-flex flex-column flex-column-fluid flex-lg-row">
         
         <div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
             
             <div class="d-flex flex-center flex-lg-start flex-column">
                 
                 <a href="{{route('index')}}" class="mb-7">
                     <img style="max-width:200px;" alt="Logo" src="{{asset('user/assets/img/logo-light-auth.png')}}" />
                 </a>
                 
                 
                 <h2 class="text-white fw-normal m-0">Branding tools designed for your business</h2>
                 
             </div>
             
         </div>
         
         
         <div class="d-flex flex-center w-lg-50 p-10">
             
             <div class="card rounded-3 w-md-550px">
                 
                 <div class="card-body p-10 p-lg-20">
                     
                     <form class="form w-100" novalidate="novalidate" id="kt_sign_up_form"  method="POST" action="{{ route('register') }}">
                         @csrf
                         
                         <div class="text-center mb-11">
                             
                             <h1 class="text-dark fw-bolder mb-3">Sign Up</h1>
                             
                             
                             <div class="text-gray-500 fw-semibold fs-6">Your Social Campaigns</div>
                             
                         </div>
                         
                         
                         <div class="row g-3 mb-9">
                             
                             <div class="col-md-6">
                                 
                                 <a href="{{route('google.login')}}" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                                 <img alt="Logo" src="{{asset('admin/assets/media/svg/brand-logos/google-icon.svg')}}" class="h-15px me-3" />Sign in with Google</a>
                                 
                             </div>
                             
                             
                             <div class="col-md-6">
                                 
                                 <a href="{{route('facebook.login')}}" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                                 <img alt="Logo" src="{{asset('admin/assets/media/svg/brand-logos/facebook-4.svg')}}" class="theme-light-show h-15px me-3" />
                                 <img alt="Logo" src="{{asset('admin/assets/media/svg/brand-logos/facebook-4.svg')}}" class="theme-dark-show h-15px me-3" />Sign in with Facebook</a>
                                 
                             </div>
                             
                         </div>
                         
                         
                         <div class="separator separator-content my-14">
                             <span class="w-125px text-gray-500 fw-semibold fs-7">Or with email</span>
                         </div>
                         
                         <div class="row">
                             <div class="fv-row col-12 mb-5">
                             <input type="text" name="name" value="{{old('name')}}" required placeholder="Enter Name" name="name" autocomplete="off" class="form-control bg-transparent" />
                             <span class="text-danger mb-2">@error('name') {{$message}} @enderror</span>
                             </div>
                         </div>
                         
                         <div class="fv-row mb-8">
                             
                             <input type="email" name="email" value="{{old('email')}}" required placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent" />
                             <span class="text-danger mb-2">@error('email') {{$message}} @enderror</span>

                             
                         </div>
                         
                         <div class="fv-row mb-8" data-kt-password-meter="true">
                             
                             <div class="mb-1">
                                 
                                 <div class="position-relative mb-3">
                                     <input class="form-control bg-transparent" type="password" placeholder="Password" name="password" required autocomplete="off" />
                                     <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                         <i class="bi bi-eye-slash fs-2"></i>
                                         <i class="bi bi-eye fs-2 d-none"></i>
                                     </span>
                             <span class="text-danger mb-2">@error('password') {{$message}} @enderror</span>

                                 </div>
                                 
                                 
                                 <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                     <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                     <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                     <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                     <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                 </div>
                                 
                             </div>
                             
                             
                             <div class="text-muted">Use 8 or more characters with a mix of letters, numbers & symbols.</div>
                             
                         </div>
                         
                         
                         <div class="fv-row mb-8">
                             
                             <input placeholder="Repeat Password" type="password" name="password_confirmation" required autocomplete="off" class="form-control bg-transparent" />
                             <span class="text-danger mb-2">@error('password_confirmation') {{$message}} @enderror</span>
                             
                         </div>
                         
                         
                         <div class="fv-row mb-8">
                             <label class="form-check form-check-inline">
                                 <input class="form-check-input" type="checkbox" name="toc" value="1" />
                                 <span class="form-check-label fw-semibold text-gray-700 fs-base ms-1">I Accept the 
                                 <a href="" class="ms-1 link-primary">Terms</a></span>
                             </label>
                         </div>
                         
                         
                         <div class="d-grid mb-10">
                             <button type="submit" id="signupbtn" class="btn btn-primary">
                                 
                                 <span class="indicator-label">Sign up</span>
                                 
                                 
                                 <span class="indicator-progress">Please wait... 
                                 <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                 
                             </button>
                         </div>
                         
                         
                         <div class="text-gray-500 text-center fw-semibold fs-6">Already have an Account? 
                         <a href="{{route('login')}}" class="link-primary fw-semibold">Sign in</a></div>
                         
                     </form>
         <x-validation-errors class="mb-4" />
                     
                 </div>
                 
             </div>
             
         </div>
         
     </div>
     
 </div>
 
 @endsection