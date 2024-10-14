<div>
    
    <div class="mb-15 pt-2">
        <!--begin::Title-->
        <h3 class="text-gray-800 w-bolder mb-4">Frequently Asked Question</h3>
        <!--end::Title-->
        <!--begin::Accordion-->
        <!--begin::Section-->
            
        
        @forelse ($faqs as $item)
        <div class=" card mb-2 p-2">
            <!--begin::Heading-->
            <div class="d-flex align-items-center collapsible py-3 toggle mb-0 collapsed" data-bs-toggle="collapse" data-bs-target="#faq-{{$item->id}}" aria-expanded="false">
                <!--begin::Icon-->
                <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen036.svg-->
                    <span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                            <rect x="6.0104" y="10.9247" width="12" height="2" rx="1" fill="currentColor"></rect>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                    <span class="svg-icon toggle-off svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                            <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="currentColor"></rect>
                            <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor"></rect>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Icon-->
                <!--begin::Title-->
                <h4 class="text-gray-700 fw-bold cursor-pointer mb-0">{{$item->question}}</h4>
                <!--end::Title-->
            </div>
            <!--end::Heading-->
            <!--begin::Body-->
            <div id="faq-{{$item->id}}" class="fs-6 ms-1 collapse" style="">
                <!--begin::Text-->
                <div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">{{$item->answer}}</div>
                <div class="px-5">
                    {{-- <button class="btn btn-success"  wire:click="EditFaq({{$item->id}})">Edit</button> --}}
                    <a href="" class="btn btn-info" wire:click.prevent="EditFaq({{$item->id}})">
                        <span class="indicator-label" wire:loading.remove wire:target="EditFaq">edit</span>
                        <span class="indicator-progress" wire:loading wire:target="EditFaq" style="font-size:11px">Please wait... 
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span></a>
                    <button class="btn btn-danger" wire:click="deleteFaq({{$item->id}})">Del</button>
                </div>
                <!--end::Text-->
            </div>
            <!--end::Content-->
          
        </div>
        @empty
            <div class="card p-2 d-flex justify-content-center align-items-center" style="background-position: 100% 50%; background-image:url('{{asset('admin/assets/media/stock/900x600/42.png')}}')">
                <div class="mb-5">
                    <!--begin::Title-->
                    <div class="fs-2hx fw-bold text-gray-800 text-center mb-13">
                    <span class="me-2">There are no
                    <br>
                    <span class="position-relative d-inline-block text-danger">
                        <a href="#" class="text-danger opacity-75-hover">FAQ's</a>
                        <!--begin::Separator-->
                        <span class="position-absolute opacity-15 bottom-0 start-0 border-4 border-danger border-bottom w-100"></span>
                        <!--end::Separator-->
                    </span></span>For now</div>
                    <!--end::Title-->
                    <!--begin::Action-->
                    <!--begin::Action-->
                </div>
                <img src="{{asset('admin/assets/media/illustrations/sketchy-1/1.png')}}" class="mx-auto h-150px h-lg-200px" alt="">
                <p class="text-muted">No Questions for now, You can change that by adding a new one!</p>
            </div>
        @endforelse
        <!--end::Section-->
        
        <!--end::Accordion-->
    </div>
 {{-- Sub Category Modal  --}}
 <div wire:ignore.self class="modal fade" tabindex="-1" id="kt_edit_faq">
    <div class="modal-dialog">
        <form  method="post" wire:submit.prevent="saveEdit">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Update Faq</h3>
                

            
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>
              


                    <input type="hidden" wire:model="faq_edit_id">

            <div class="modal-body">
                <div class="form-group mb-2">
                    <label class="form-label">Question</label>
                    <input type="text" class="form-control" wire:model="faq_edit_question" placeholder="Enter Question">
                    <span class="text-danger">@error('faq_edit_question') {{$message}} @enderror</span>
                </div>
                <div class="form-group mb-2">
                    <label class="form-label">Answer</label>
                    <textarea type="text" class="form-control"  wire:model="faq_edit_answer" placeholder="Enter Answer"> </textarea>
                    <span class="text-danger">@error('faq_edit_answer') {{$message}} @enderror</span>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
        </div>
        </form>
        </div>
    </div>
    
</div>
