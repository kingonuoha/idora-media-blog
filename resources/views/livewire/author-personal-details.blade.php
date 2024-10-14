<div>
      {{-- Begin form --}}
      <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">Profile Details Edit</h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Card header-->
        <!--begin::Content-->
        <div id="kt_account_settings_profile_details" class="collapse show">
        <!--begin::Form-->
        <form method="POST" wire:submit.prevent="UpdateDetails()" class="form fv-plugins-bootstrap5 fv-plugins-framework" >
            <!--begin::Card body-->
            <div class="card-body border-top p-9">
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Avatar</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <!--begin::Image input-->
                        <div class="image-input image-input-outline image-input-changed" data-kt-image-input="true" style="background-image: url('../assets/media/svg/avatars/blank.svg')">
                            <!--begin::Preview existing avatar-->
                            
                            <!--end::Preview existing avatar-->
                            <!--begin::Label-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar" data-kt-initialized="1">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <!--begin::Inputs-->
                                <input type="file" name="avatar" accept=".png, .jpg, .jpeg">
                                <input type="hidden" name="avatar_remove">
                                <!--end::Inputs-->
                            </label>
                            <!--end::Label-->
                            <!--begin::Cancel-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel avatar" data-kt-initialized="1">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Cancel-->
                            <!--begin::Remove-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" aria-label="Remove avatar" data-kt-initialized="1">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Remove-->
                        </div>
                        <!--end::Image input-->
                        <!--begin::Hint-->
                        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                        <!--end::Hint-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Full Name</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                    
                        <input type="text" wire:model="name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="First name" value="Max">
                        <div class="fv-plugins-message-container invalid-feedback">@error('name') {{$message}} @enderror</div>
                    </div>
                            
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Phone Number</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                        <input type="tel" wire:model="phone" class="form-control form-control-lg form-control-solid" placeholder="Enter Phone number name" value="08090775994">
                    <div class="fv-plugins-message-container invalid-feedback">@error('phone') {{$message}} @enderror</div></div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">
                        <span class="required">Occupation</span>
                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" aria-label="Your Current Occupation" data-kt-initialized="1"></i>
                    </label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                        <input type="text" wire:model="occupation" class="form-control form-control-lg form-control-solid" placeholder="Occupation eg.('MARKETING EXPERT')" value="044 3276 454 935">
                    <div class="fv-plugins-message-container invalid-feedback">@error('occupation') {{$message}} @enderror</div></div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Socials</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-6 ">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6 text-muted" >Facebook url</label>
                                <input type="text" wire:model="facebook_url" class="form-control form-control-lg form-control-solid" placeholder="Enter Link to your Facebook Page" value="keenthemes.com">
                                <div class="fv-plugins-message-container invalid-feedback">@error('facebook_url') {{$message}} @enderror</div>
                            </div>
                            <div class="col-lg-6 ">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6 text-muted" >Youtube url</label>
                                <input type="text" wire:model="youtube_url" class="form-control form-control-lg form-control-solid" placeholder="Enter Link to your Youtube Page" value="keenthemes.com">
                                <div class="fv-plugins-message-container invalid-feedback">@error('youtube_url') {{$message}} @enderror</div>
                            </div>
                            <div class="col-lg-6 ">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6 text-muted" >Instagram_url</label>
                                <input type="text" wire:model="instagram_url" class="form-control form-control-lg form-control-solid" placeholder="Enter Link to your Instagram Page" value="keenthemes.com">
                                <div class="fv-plugins-message-container invalid-feedback">@error('instagram_url') {{$message}} @enderror</div>
                            </div>
                            <div class="col-lg-6 ">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6 text-muted" >Twitter Url</label>
                                <input type="text" wire:model="twitter_url" class="form-control form-control-lg form-control-solid" placeholder="Enter Link to your Twitter Page" value="keenthemes.com">
                                <div class="fv-plugins-message-container invalid-feedback">@error('twitter_url') {{$message}} @enderror</div>
                            </div>

                            </div>
                    </div>
                    <!--end::Col-->
                </div>
                <hr>
                <!--end::Input group-->
                <!--begin::Input group-->
                
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">About Me</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <textarea wire:model="about_me" id="" class="form-control"  rows="6" placeholder="Tell us more about you!"></textarea>
                        <div class="fv-plugins-message-container invalid-feedback">@error('about_me') {{$message}} @enderror</div>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">About My work</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <textarea wire:model="about_work" id="" class="form-control"  rows="6" placeholder="Tell us more about you!"></textarea>
                        <div class="form-text mb-2">Pls tell us more about your role as a (social Egnineer), you can mention people/companies you've worked for along side the time frame</div>
                        <div class="fv-plugins-message-container invalid-feedback">@error('about_work') {{$message}} @enderror</div>

                    </div>
                    
                    <!--end::Col-->
                </div>
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Your Skill Rating</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="customRange1" class="form-label" >Digital Marketing</label>
                            <input wire:model="digital_marketing" type="range" class="form-range" id="customRange1" min="0" max="100" oninput="document.getElementById('digital_marketing').innerHTML = this.value+'%'"  />
                            <span class="mb-2" id="digital_marketing">{{$digital_marketing}}%</span>
                            <div class="fv-plugins-message-container invalid-feedback">@error('digital_marketing') {{$message}} @enderror</div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="customRange2" class="form-label" >Content Creation</label>
                            <input wire:model="content_creation" type="range" class="form-range" id="customRange2" min="0" max="100" oninput="document.getElementById('content_creation').innerHTML = this.value+'%'"  />
                            <span class="mb-2" id="content_creation">{{$content_creation}}%</span>
                            <div class="fv-plugins-message-container invalid-feedback">@error('content_creation') {{$message}} @enderror</div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="customRange3" class="form-label" >Blogging</label>
                            <input wire:model="blogging" type="range" class="form-range" id="customRange3" min="0" max="100" oninput="document.getElementById('bloging').innerHTML = this.value+'%'"  />
                            <span class="mb-2" id="bloging">{{$blogging}}%</span>
                            <div class="fv-plugins-message-container invalid-feedback">@error('blogging') {{$message}} @enderror</div>
                        </div>
                    </div>

                    </div>
                    
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                
                <!--begin::Input group-->
                <div class="row mb-0">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Allow Contactable</label>
                    <!--begin::Label-->
                    <!--begin::Label-->
                    <div class="col-lg-8 d-flex align-items-center">
                        <div class="form-check form-check-solid form-switch fv-row">
                            <input class="form-check-input w-45px h-30px" type="checkbox" id="allowmarketing" checked="checked">
                            <label class="form-check-label" for="allowmarketing"></label>
                        </div>
                    </div>
                    <!--begin::Label-->
                </div>
                <!--end::Input group-->
            </div>
            <!--end::Card body-->
            <!--begin::Actions-->
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                <button type="submit" class="btn btn-primary">
                    <span class="indicator-label" wire:loading.remove wire:target="UpdateDetails">Save Changes</span>
                    <span class="indicator-progress" wire:loading wire:target="UpdateDetails" style="font-size:11px">Please wait... 
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
            </div>
            <!--end::Actions-->
        <input type="hidden">
        <div></div>
        </form>
        <!--end::Form-->

    </div>
    <!--end::Content-->
</div>
{{-- End form --}}





        
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_signin_method">
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">Sign-in Method</h3>
            </div>
        </div>
        <!--end::Card header-->
        <!--begin::Content-->
        <div id="kt_account_settings_signin_method" class="collapse show">
            <!--begin::Card body-->
            <div class="card-body border-top p-9">
                <!--begin::Password-->
                <div class="d-flex flex-wrap align-items-center mb-10">
                    <!--begin::Label-->
                    <div id="kt_signin_password" wire:ignore.self>
                        <div class="fs-6 fw-bold mb-1">Password</div>
                        <div class="fw-semibold text-gray-600">************</div>
                    </div>
                    <!--end::Label-->
                    <!--begin::Edit-->
                    <div id="kt_signin_password_edit" class="flex-row-fluid d-none" wire:ignore.self>
                        <!--begin::Form-->
                        <form id="kt_signin_change_password" class="form fv-plugins-bootstrap5 fv-plugins-framework" wire:submit.prevent="updatePassword">
                            <div class="row mb-1">
                                <div class="col-lg-4">
                                    <div class="fv-row mb-0 fv-plugins-icon-container">
                                        <label for="current_password" class="form-label fs-6 fw-bold mb-3">Current Password</label>
                                        <input type="password" class="form-control form-control-lg form-control-solid" wire:model.defer="current_password" id="current_password">
                                    </div>
                                    @error('current_password') <div class="text-danger bg-light-danger px-2 py-1 mt-1">{{$message}}</div> @enderror
                                </div>
                                <div class="col-lg-4">
                                    <div class="fv-row mb-0 fv-plugins-icon-container">
                                        <label for="new_password" class="form-label fs-6 fw-bold mb-3">New Password</label>
                                        <input type="password" class="form-control form-control-lg form-control-solid" wire:model.defer="new_password" id="new_password">
                                    </div>
                                    @error('new_password') <div class="text-danger bg-light-danger px-2 py-1 mt-1">{{$message}}</div> @enderror
                                </div>
                                <div class="col-lg-4">
                                    <div class="fv-row mb-0 fv-plugins-icon-container">
                                        <label for="confirm_password" class="form-label fs-6 fw-bold mb-3">Confirm New Password</label>
                                        <input type="password" class="form-control form-control-lg form-control-solid" wire:model.defer="confirm_password" id="confirm_password">
                                    </div>
                                    @error('confirm_password') <div class="text-danger bg-light-danger px-2 py-1 mt-1">{{$message}}</div> @enderror
                                </div>
                            </div>
                            <div class="form-text mb-5">Password must be at least 8 character and contain symbols</div>
                            <div class="d-flex">
                                <button id="kt_password_submit" type="submit" class="btn btn-primary me-2 px-6">Update Password</button>
                                <button id="kt_password_cancel" type="reset" class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
                            </div>
                        <div></div></form>
                        <!--end::Form-->
                    </div>
                    <!--end::Edit-->
                    <!--begin::Action-->
                    <div id="kt_signin_password_button" class="ms-auto">
                        <button class="btn btn-light btn-active-light-primary">Reset Password</button>
                    </div>
                    <!--end::Action-->
                </div>
                <!--end::Password-->
                <!--begin::Notice-->
                <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed p-6">
                    <!--begin::Icon-->
                    <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                    <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor"></path>
                            <path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="currentColor"></path>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <!--end::Icon-->
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                        <!--begin::Content-->
                        <div class="mb-3 mb-md-0 fw-semibold">
                            <h4 class="text-gray-900 fw-bold">Secure Your Account</h4>
                            <div class="fs-6 text-gray-700 pe-7">Two-factor authentication adds an extra layer of security to your account. To log in, in addition you'll need to provide a 6 digit code</div>
                        </div>
                        <!--end::Content-->
                        <!--begin::Action-->
                        <a href="#" class="btn btn-primary px-6 align-self-center text-nowrap" data-bs-toggle="modal" data-bs-target="#kt_modal_two_factor_authentication" onclick="alert('opps, an error occured, couldnt reach the servers')">Enable</a>
                        <!--end::Action-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Notice-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Content-->
    </div>
    @push('script')
    <script src="{{asset('admin/assets/js/custom/account/settings/signin-methods.js')}}"></script>
    @endpush
</div>
