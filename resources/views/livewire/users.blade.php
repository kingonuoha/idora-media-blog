<div>
      
<div class="row">
    <div class=" my-5 col-5">
        <input wire:model="search" type="text" class="form-control" placeholder="Search Users...">
    </div>
    <div class=" my-5 col-4">
        <select class="form-select" wire:model="role">
            <option value="*">--Choose Category--</option>
            <option value="1">Admin</option>
            <option value="0">Users</option>
        </select>
    </div>
   
    {{-- <div class="col-md-6 col-lg-3 mb-5">
        <div class="card">
            <div class="card-body p-4 text-center">
                <span class="symbol symbol-circle symbol-160px overflow-hidden  mb-3 ">
                    <img src="https://laiacc.com/wp-content/uploads/2019/03/blank-profile-picture-973460_1280-1030x1030.png" alt=""> </span>
                <h3 class="m-0 mb-1"><a href="">Mathew Holand</a></h3>
                <div class="text-muted">VP Sales</div>
                <div class="mt-3 badge badge-changelog badge-light-danger fw-semibold fs-8 px-2 ms-2">owner</div>
            </div>
       <div class="d-flex justify-content-center mb-2">
        <a href="#" class="btn btn-light-secondary me-2">Secondary</a>
        <a href="#" class="btn btn-light-secondary me-2">Secondary</a>
       </div>
    </div>

    </div> --}}
@forelse ($authors as $author)
    
    <div class="col-md-6 col-xxl-6 my-5">

        <!--begin::Card-->
        <div class="card">
            <!--begin::Card body-->
            <div class="card-body d-flex flex-center flex-column pt-12 p-9">
                <!--begin::Avatar-->
                <div class="symbol symbol-65px symbol-circle mb-5">
                    {{-- {{}} --}}
                    @if ($author->profile_photo_path == null)
                    <img src="{{asset('idora_img/profile/'.strtoupper(substr($author->name, 0, 1)).".png")}}" alt="image">
                    @else
                    <img src="{{asset('storage/images/authors/'.$author->profile_photo_path)}}" alt="image">
                    @endif
                        
                </div>
                <!--end::Avatar-->
                <!--begin::Name-->
                <a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bold mb-0">{{$author->name}}</a>
                <!--end::Name-->
                <!--begin::Position-->
                <div class="fw-semibold text-gray-400 mb-2">{{$author->email}}</div>
                
                @if ($author->role == 0)
                <div class="mb-3 badge badge-changelog badge-light-success fw-semibold fs-8 px-2 ms-2">User</div>
                @else
                <div class="mb-3 badge badge-changelog badge-light-danger fw-semibold fs-8 px-2 ms-2">Administrator</div>
                @endif
                    

                <!--end::Position-->
                <!--begin::Info-->
                <div class="d-flex flex-center flex-wrap">
                    <!--begin::Stats-->
                    <a class="btn btn-secondary border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3"  wire:click.prevent="editUser({{$author}})">
                        {{-- <div class="fs-6 fw-bold text-gray-700"></div>
                        <div class="fw-semibold text-gray-400"></div> --}}
                        Edit
                    </a>
                    <!--end::Stats-->
                    <!--begin::Stats-->
                    <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                        <div class="fs-6 fw-bold text-gray-700">Last Seen</div>
                         <div class="fw-semibold text-gray-400">{{ $author->last_login != null? Carbon\Carbon::parse( $author->last_login )->diffForHumans(): "Not Defined!" }}</div>
                    </div>
                    <!--end::Stats-->
                    <!--begin::Stats-->
                    <a wire:click.prevent="deleteUser({{$author->id}})" class="btn btn-secondary border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                        {{-- <div class="fs-6 fw-bold text-gray-700">$236,400</div>
                        <div class="fw-semibold text-gray-400">Sales</div> --}}
                        Delete
                    </a>
                    <!--end::Stats-->
                </div>
                <!--end::Info-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>

    @empty
    <span class="text-danger"> No User Found </span>
@endforelse

<div class="row my-4">
    {{$authors->links('livewire::bootstrap')}}
</div>
{{-- Author Modal --}}

<div wire:ignore.self class="modal fade" tabindex="-1" id="kt_edit_user">
    <div class="modal-dialog">
        {{-- <form action="#" method="post"
        @if ($updateSubCategoryMode)
            wire:submit.prevent='updateSubCategory()'
        @else
            wire:submit.prevent='addSubCategory()'
        @endif
        > --}}
        <form  method="post"  wire:submit.prevent='updateUser()'>
            <input hidden type="text" wire:model="selected_user_id">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Edit User</h3>
                

            
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>
              


                    {{-- @if ($updateSubCategoryMode)
                    <input type="hidden" wire:model="selected_subcategory_id">
                    @endif --}}

            <div class="modal-body">
               <div class="mb-3">
                <label for="parent">Selected User Name:</label>
                <div class="mb-3 badge badge-changelog badge-light-danger fw-semibold fs-8 px-2 ms-2">{{$selected_user_role != 0 ? "Administrator" :"User"}}</div>
                <p class="text-muted">{{$user_name}}</p>
               </div>
               
               <div class="mb-3">
                <label for="parent">Update User role  </label>
                <select class="form-select" wire:model="selected_user_role">
                <option  >__No Role Selected --</option>
                <option value="0" {{($selected_user_role == 0) ? 'selected' : '' }}>User</option>
                <option value="1"  {{($selected_user_role == 1) ? 'selected' : '' }}>Admin</option>
            </select>
            <span class="text-danger">@error('selected_user_role') {{$message}} @enderror</span>
               </div>

               <div class="mb-3" >
               <label class="form-check form-switch form-check-custom form-check-solid my-3">
                <input class="form-check-input" type=checkbox wire:model="blocked" checked="checked"/>
                <span class="form-check-label fw-semibold text-muted">
                   Block User
                </span>
            </label>
            <span class="text-danger">@error('blocked') {{$message}} @enderror</span>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
        </div>
    </div>
</div>
@push('script')
    <script>
        window.addEventListener('alert:deleteUserConfirm', (e)=>{
            Swal.fire({
                html: e.detail.message,
                title: "Warning!",
                text: e.detail.message,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: "Ok, Proceed!",
                cancelButtonText: "Later",
                // customClass: {
                //     confirmButton: e.detail.confirmButtonClass,
                //     cancelButton: e.detail.cancelButtonClass
                //     },
                // buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    toastR('Deleting....', 'info')
                    livewire.emit('deleteUserConfirmed', e.detail.userId)
                } else {
                    toastR('Delete Acton has been canceled by user!', 'warning')
                }
            })
        })
    </script>
@endpush
</div>
