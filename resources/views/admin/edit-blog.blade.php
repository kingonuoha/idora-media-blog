@extends('layouts.admin.admin-layout')
@section('title', "Idora Media Admin | ".$pageTitle);
@section('content')
    
{{-- Begin Edit Post --}}

<form id="editPostForm" method="POST" class="form d-flex flex-column flex-lg-row" action="{{route('update_blog', ['post_id' => Request('post_id') ])}}" enctype="multipart/form-data">
    @csrf
    <!--begin::Aside column-->
    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
        <!--begin::Thumbnail settings-->
        <div class="card card-flush py-4">
            <!--begin::Card header-->
            <div class="card-header">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2>Featured Image</h2>
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body text-center pt-0">
                <!--begin::Image input-->
                <!--begin::Image input placeholder-->
                <style>.image-input-placeholder { background-image: url("{{asset('storage/images/post_images/thumbnails/resized_'.$post->featured_image)}}"); } [data-theme="dark"] .image-input-placeholder { background-image: url("{{asset('storage/images/post_images/thumbnails/resized_'.$post->featured_image)}}"); }</style>
                <!--end::Image input placeholder-->
                <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
                    <!--begin::Preview existing avatar-->
                    <div class="image-input-wrapper w-150px h-150px"></div>
                    <!--end::Preview existing avatar-->
                    <!--begin::Label-->
                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change Featured Image">
                        <i class="bi bi-pencil-fill fs-7"></i>
                        <!--begin::Inputs-->
                        <input type="file" name="avatar"  accept=".png, .jpg, .jpeg" />
                        <input type="hidden" name="avatar_remove" value="{{$post->avatar_remove}}" />
                        <!--end::Inputs-->
                    </label>
                    <!--end::Label-->
                    <!--begin::Cancel-->
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel Featured Image">
                        <i class="bi bi-x fs-2"></i>
                    </span>
                    <!--end::Cancel-->
                    <!--begin::Remove-->
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove Featured Image">
                        <i class="bi bi-x fs-2"></i>
                    </span>
                    <!--end::Remove-->
                </div>
                <!--end::Image input-->
                <!--begin::Description-->
                <span class="text-danger error-text avatar_error"></span>
                <div class="text-muted fs-7">Set the Featured Image image. Only *.png, *.jpg and *.jpeg image files are accepted</div>
                <!--end::Description-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Thumbnail settings-->
        <!--begin::Status-->
        <div class="card card-flush py-4">
            <!--begin::Card header-->
            <div class="card-header">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2>Status</h2>
                </div>
                <!--end::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_product_status"></div>
                </div>
                <!--begin::Card toolbar-->
            </div>
            <!--end::Card header-->
             <!--begin::Card body-->
             <div class="card-body">
                <label for="" class="form-label">Post Tags</label>
                <input type="text" class="form-control" name="post_tags" value="{{$post->post_tags}}">
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Status-->
        <!--begin::Category & tags-->
        <div class="card card-flush py-4">
            <!--begin::Card header-->
            <div class="card-header">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2>Post Details</h2>
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Input group-->
                <!--begin::Label-->
                <label class="form-label">Categories</label>
                <!--end::Label-->
                <!--begin::Select2-->
                <select name="post_category" value="{{$post->post_category}}" class="form-select mb-2" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple">
                    <option></option>
                    @foreach (\App\Models\SubCategory::all() as $category)
                        
                    <option value="{{$category->id}}" {{ $post->category_id == $category->id ? 'selected' : ''}}>{{$category->subcategory_name}}</option>
                    @endforeach
                </select>
                <span class="text-danger error-text post_category_error"></span>

                <!--end::Select2-->
                <!--begin::Description-->
                <div class="text-muted fs-7 mb-7">Add Post to a category.</div>
                <!--end::Description-->
                <!--end::Input group-->
                <!--begin::Button-->
                <a href="{{route('categories')}}" class="btn btn-light-primary btn-sm mb-10">
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor" />
                        <rect x="6" y="11" width="12" height="2" rx="1" fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->Create new category</a>
                <!--end::Button-->
                <!--begin::Input group-->
                <!--begin::Label-->
           
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Category & tags-->
        <!--begin::Weekly sales-->
     
       
        <!--end::Template settings-->
    </div>
    <!--end::Aside column-->
    <!--begin::Main column-->
    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
        <!--begin:::Tabs-->
        <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2">
            <!--begin:::Tab item-->
            <li class="nav-item">
                <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_ecommerce_add_product_general">General</a>
            </li>
            <!--end:::Tab item-->
            <!--begin:::Tab item-->
            <li class="nav-item">
                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_add_product_advanced">Advanced</a>
            </li>
            <!--end:::Tab item-->
        </ul>
        <!--end:::Tabs-->
        <!--begin::Tab content-->
        <div class="tab-content">
            <!--begin::Tab pane-->
            <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                <div class="d-flex flex-column gap-7 gap-lg-10">
                    <!--begin::General options-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>General</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">Post Title</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="post_title" value="{{$post->post_title}}" class="form-control mb-2" placeholder="Post Title" value="" />
                                <span class="text-danger error-text post_title_error"></span>

                                <!--end::Input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">A post title is required and recommended to be unique.</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div>
                                <!--begin::Label-->
                                <label class="form-label">Description</label>
                                <textarea id="post_content" name="post_content" value="{{$post->post_content}}" rows="6" placeholder="Post Description" class="ckeditor form-control">{!! $post->post_content !!}</textarea>
                                <span class="text-danger error-text post_content_error"></span>
                                
                                <!--end::Label-->
                                <!--begin::Editor-->
                                {{-- <div id="kt_ecommerce_add_product_description" name="kt_ecommerce_add_product_description" value="{{$post->kt_ecommerce_add_product_description}}" class="min-h-200px mb-2"></div> --}}
                                <!--end::Editor-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Set a description to the Post for better Understanding.</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::General options-->
                    <!--begin::Media-->
                    
                </div>
            </div>
            <!--end::Tab pane-->
            <!--begin::Tab pane-->
            <div class="tab-pane fade" id="kt_ecommerce_add_product_advanced" role="tab-panel">
                <div class="d-flex flex-column gap-7 gap-lg-10">
                    <!--begin::Meta options-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Meta Options</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label">Meta Tag Title</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control mb-2" name="meta_title" value="{{$post->meta_title}}" placeholder="Meta tag name" />
                                <span class="text-danger error-text meta_title_error"></span>

                                <!--end::Input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Set a meta tag title. Recommended to be simple and precise keywords.</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label">Meta Tag Description</label>
                                <!--end::Label-->
                                <!--begin::Editor-->
                                <textarea name="meta_desc" value="{{$post->meta_desc}}" rows="5" class="form-control">
                                        {!! $post->meta_desc !!}
                                </textarea>
                                <span class="text-danger error-text meta_desc_error"></span>
                                    
                                <!--end::Editor-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Set a meta tag description to the product for increased SEO ranking. We recommend you make it as brief as possible</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div>
                                <!--begin::Label-->
                                <label class="form-label">Meta Tag Keywords</label>
                                <!--end::Label-->
                                <!--begin::Editor-->
                                <input id="kt_ecommerce_add_product_meta_keywords" name="meta_tags" value="{{$post->meta_tags}}" class="form-control mb-2" />
                                <span class="text-danger error-text meta_tags_error"></span>

                                <!--end::Editor-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Set a list of keywords that the product is related to. Separate the keywords by adding a comma 
                                <code>,</code>between each keyword.</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::Meta options-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Email Notification</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <div class="fv-row">
                                <!--begin::Input-->
                                <div class="form-check form-check-custom form-check-solid mb-2">
                                    <input class="form-check-input" type="checkbox" id="kt_ecommerce_add_product_shipping_checkbox" value="1" />
                                    <label class="form-check-label">Send Emails to {{\App\Models\User::where('role', 0)->count()}} users</label>
                                </div>
                                <!--end::Input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Set if You want to notitify your users about your new post</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Shipping form-->
                            <div id="kt_ecommerce_add_product_shipping" class="d-none mt-10">
                                <!--begin::Input group-->
                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="form-label">Weight</label>
                                    <!--end::Label-->
                                    <!--begin::Editor-->
                                    <input type="text" name="weight" value="" class="form-control mb-2" placeholder="Product weight" value="" />
                                    <!--end::Editor-->
                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">Set a product weight in kilograms (kg).</div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row">
                                    <!--begin::Label-->
                                    <label class="form-label">Dimension</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <div class="d-flex flex-wrap flex-sm-nowrap gap-3">
                                        <input type="number" name="width" class="form-control mb-2" placeholder="Width (w)" value="" />
                                        <input type="number" name="height" class="form-control mb-2" placeholder="Height (h)" value="" />
                                        <input type="number" name="length" class="form-control mb-2" placeholder="Lengtn (l)" value="" />
                                    </div>
                                    <!--end::Input-->
                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">Enter the product dimensions in centimeters (cm).</div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Shipping form-->
                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::Shipping-->
                    <!--begin::Inventory-->
                    
                    <!--begin::Variations-->
                    <
                    <!--begin::Shipping-->
                    
                    
                </div>
            </div>
            <!--end::Tab pane-->
        </div>
        <!--end::Tab content-->
        <div class="d-flex justify-content-end">
            <!--begin::Button-->
            <a href="products.html" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">Cancel</a>
            <!--end::Button-->
            <!--begin::Button-->
            <button type="submit" class="btn btn-primary">
                <span class="indicator-label">Save Changes</span>
                <span class="indicator-progress">Please wait... 
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
            <!--end::Button-->
        </div>
    </div>
    <!--end::Main column-->
</form>

@endsection
@push('script')
<script src="{{asset('/ckeditor/ckeditor.js')}}"></script>
    <script>
        $('form#editPostForm').on('submit', function(e){
            e.preventDefault();
            var form = this;
            var post_content = CKEDITOR.instances.post_content.getData();
            var formdata =  new FormData(form);
             formdata.append('post_content', post_content)
            console.log(formdata);
            $.ajax({
                url: $(form).attr('action'),
                method: $(form).attr('method'),

                data:formdata,
                processData:false,
                dataType:'json',
                contentType:false,
                beforeSend:function(){
                    $(form).find('span.error-text').text('');
                },
                success:function(response){
                    if (response.code == 1) {
                       
                        toastR( response.msg, 'success')
                        // $('div.image_holder').html('')
                    }else{
                        toastR( response.msg, 'error')

                    }
                },
                error:function(response){
                    console.log(response);
                    let error = response.responseJSON.message || response.responseText;
                    error_alert("An Error Occured, Pls make sure you have filled the forms in the 'Advanced' tab  ERROR:"+error);
                    $.each(response.responseJSON.errors, function(prefix, val){
                        $(form).find('span.'+prefix+'_error').text(val[0]);
                    })
                   
                }

            })
        })
    </script>
@endpush

{{-- End Edit Post --}}