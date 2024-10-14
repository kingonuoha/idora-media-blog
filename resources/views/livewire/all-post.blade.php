<div>
  <div class="">
    <div class="row">
      <div class="col-md-6 mb-3">
        <label for="" class="form-label">Search</label>
        <input type="text" class="form-control" placeholder="Search..." wire:model="search">
      </div>
      <div class="col-md-2 mb-3">
        <label for="" class="form-label">Category</label>
        <select name="" class="form-select" wire:model="category">
          <option>--No Category</option>
          @foreach (\App\Models\SubCategory::whereHas('posts')->get() as $category)
          <option value="{{$category->id}}">{{$category->subcategory_name}}</option>
          @endforeach
              
          <option value="">Value</option>
          <option value="">Value</option>
        </select>
      </div>

      <div class="col-md-2 mb-3">
        <label for="" class="form-label">Athour</label>
        <select name="" class="form-select" wire:model="author">
          <option>--No Author</option>
         @foreach (\App\Models\User::whereHas('posts')->get() as $author)
         <option value="{{$author->id}}">{{$author->name}}</option>
         @endforeach 
             
        </select>
      </div>
      <div class="col-md-2 mb-3">
        <label for="" class="form-label">Order By</label>
        <select name="" class="form-select" wire:model="orderBy">
          <option value="asc">ASC</option>
          <option value="desc">DESC</option>
        </select>
      </div>
    </div>
    <hr>
  </div>
  <div class="row g-4">
  @forelse ($posts as $post)
            <div class="col-md-6 col-lg-4 col-sm-6 my-5">
              <div class="card">
                <img src="{{asset('idora_img/spinners/figet.gif')}}" 
                data-src="{{asset("/storage/images/post_images/thumbnails/resized_".$post->featured_image)}}" class="card-img-top lozad " alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{$post->post_title}}</h5>
                  <p class="card-text">{{$post->meta_desc}}</p>
                </div>
                <div class="card-footer">
                    <a href="{{route('edit_blog', ['post_id'=>$post->id])}}" class="btn btn-secondary">Edit</a>
                    <a wire:click.prevent="deletePost({{$post->id}})" class="btn btn-secondary">Delete</a>
                </div>
              </div>
            </div>
          
            @empty
            <div class="card">
              <!--begin::Card body-->
              <div class="card-body p-0">
                <!--begin::Wrapper-->
                <div class="card-px text-center py-20 my-10">
                  <!--begin::Title-->
                  <h2 class="fs-2x fw-bold mb-10">Welcome to Blog List Section</h2>
                  <!--end::Title-->
                  <!--begin::Description-->
                  <p class="text-gray-400 fs-4 fw-semibold mb-10">There are no Blogs added yet.
                  <br>Kickstart your CRM by adding a your first Blog</p>
                  <!--end::Description-->
                  <!--begin::Action-->
                  <a href="{{route('new_blog')}}" class="btn btn-primary" >Add Blog</a>
                  <!--end::Action-->
                </div>
                <!--end::Wrapper--> search
                <!--begin::Illustration-->
                <div class="text-center px-4">
                  <img class="mw-100 mh-300px" alt="" src="{{asset('admin/assets/media/illustrations/sketchy-1/5.png')}}">
                </div>
                <!--end::Illustration-->
              </div>
              <!--end::Card body-->
            </div>
            @endforelse

          </div>
            <div class="d-block mt-">
              {{ $posts->links('livewire::simple-bootstrap')}}
          </div>

       
</div>