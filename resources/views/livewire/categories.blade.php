<div class="row">
    <div class="col-lg-6 my-5">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3 class="card-title">Categories</h3>
                <div class="card-toolbar">
                    <button type="button" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#kt_add_category">
                        Add Category
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive" style="max-height:500px">
                    <table class="table table-rounded table-striped border gy-7 gs-7">
                        <thead>
                            <tr class="fw-semibold fs-6 text-gray-800 border-bottom border-gray-200">
                                <th >Category Name</th>
                                <th>N. of Sub Category</th>
                                <th ></th>
                                
                            </tr>
                        </thead>
                        <tbody>
                           @forelse ($categories as $category)
                           <tr>
                            <td>{{$category->category_name}}</td>
                            <td>{{$category->subCategory->count()}}</td>
                            <td>
                               <div class="btn-group">
                                <a href="" class="btn btn-primary" wire:click.prevent="editCategory({{$category->id}})">Edit</a>
                                <a href="#" wire:click.prevent="deleteCategory({{$category->id}})" class="btn btn-danger">
                                    <span class="indicator-label" wire:loading.remove wire:target="deleteCategory">Delete</span>
                                    <span class="indicator-progress" wire:loading wire:target="deleteCategory" style="font-size:11px">Please wait... 
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span></a>
                               </div>
                            </td>
                           
                        </tr>
                           @empty
                               <tr colspan="3">
                                <span class="text-danger">No Categories Found</span>
                               </tr>
                           @endforelse
                           
                           
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                Footer
            </div>
        </div>
    </div>
    
    {{-- Category Modal  --}}
    <div wire:ignore.self class="modal fade" tabindex="-1" id="kt_add_category">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">{{$updateCategoryMode ? "Update Category" : "Add Category"}}</h3>
    
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                    <!--end::Close-->
                </div>
                <form  method="post"  
                 @if ($updateCategoryMode)
                wire:submit.prevent="updateCategory()"
                @else
                wire:submit.prevent="addCategory"
                @endif

            >
                    @csrf

                  
                <div class="modal-body">
                    @if ($updateCategoryMode)
                    <input type="hidden" wire:model="selected_category_id">
                    @endif
                    
                    <div class="mb-10">
                        <label for="" class="required form-label">Category Name</label>
                        <input type="text" class="form-control form-control-solid" placeholder="Enter  Category Name" 
                        wire:model="category_name"/>
                        <span class="text-danger">@error('category_name')
                            {{$message}}
                        @enderror</span>
                    </div>
                </div>
    
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" >
                        <span class="indicator-label" wire:loading.remove wire:target="addCategory">{{ $updateCategoryMode ? "Update" : "Save"}}</span>
                        <span class="indicator-progress" wire:loading wire:target="addCategory" style="font-size:11px">Please wait... 
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span></button>
                </div>
            </form>
            </div>
        </div>
    </div>


    <div class="col-lg-6 my-5">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3 class="card-title">Sub Category</h3>
                <div class="card-toolbar">
                    <button type="button" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#kt_add_sub_category">
                        Add sub-category
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive" style="max-height:500px">
                    <table class="table table-rounded table-striped border gy-4 gs-4" >
                        <thead>
                            <tr class="fw-semibold fs-6 text-gray-800 border-bottom border-gray-200">
                                <th >Sub Category Name</th>
                                <th>Parent Category</th>
                                <th >N. of Post</th>
                                <th ></th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($subcategories as $subcategory)
                                
                            <tr>
                                <td>{{$subcategory->subcategory_name}} </td>
                                <td>{{$subcategory->parentCategory->category_name}}</td>
                                <td>{{$subcategory->posts->count()}}</td>
                                <td>
                                   <div class="btn-group">
                                    <a href="" class="btn btn-primary" wire:click.prevent="editSubCategory({{$subcategory->id}})">Edit</a>
                                    <a href="" class="btn btn-danger" wire:click.prevent="deleteSubCategory({{$subcategory->id}})">
                                        <span class="indicator-label" wire:loading.remove wire:target="deleteSubCategory">Delete</span>
                                        <span class="indicator-progress" wire:loading wire:target="deleteSubCategory" style="font-size:11px">Please wait... 
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span></a>
                                   </div>
                                </td>
                               
                            </tr>
                            @empty
                            <tr colspan="4">
                                <span class="text-danger">No Categories Found</span>
                               </tr>
                            @endforelse
                           
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                Footer
            </div>
        </div>
    </div>
    {{-- Sub Category Modal  --}}
<div wire:ignore.self class="modal fade" tabindex="-1" id="kt_add_sub_category">
    <div class="modal-dialog">
        {{-- <form action="#" method="post"
        @if ($updateSubCategoryMode)
            wire:submit.prevent='updateSubCategory()'
        @else
            wire:submit.prevent='addSubCategory()'
        @endif
        > --}}
        <form  method="post"  
            @if ($updateSubCategoryMode)
        wire:submit.prevent="updateSubCategory"
        @else
        wire:submit.prevent="addSubCategory"
        @endif
        
                    >
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">{{ $updateSubCategoryMode ? "Update SubCategory" : "Add SubCategory"}}</h3>
                

            
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>
              


                    @if ($updateSubCategoryMode)
                    <input type="hidden" wire:model="selected_subcategory_id">
                    @endif

            <div class="modal-body">
               <div class="mb-3">
                <label for="parent">Select Parent</label>
                <select class="form-select" aria-label="Select example" id="parent" wire:model="parent_category">
                    
                   @if (!$updateSubCategoryMode)
                   <option >No Selected</option>
                   @endif

                   @foreach (\App\Models\Category::all() as $category)
                   <option value="{{$category->id}}">{{$category->category_name}}</option>
                   @endforeach

                </select>
                <span class="text-danger">  @error('parent_category') 
                    {{$message}}
                     @enderror </span>
               </div>
               <div class="mb-10">
                <label for="exampleFormControlInput1" class="required form-label">Sub Category Name</label>
                <input wire:model="subcategory_name" type="text" class="form-control form-control-solid" placeholder="Enter Sub Category Name"/>
                <span class="text-danger"> @error('subcategory_name') 
                    {{$message}} 
                    @enderror </span>

            </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">{{ $updateSubCategoryMode ? "Update" : "Save"}}</button>
            </div>
        </form>
        </div>
    </div>
</div>

