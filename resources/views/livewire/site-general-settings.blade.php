<form method="POST" wire:submit.prevent="updateGeneralSetting()">
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="" class="form-label">Blog Name</label>
                <input wire:model="blog_name" type="text" class="form-control" placeholder="Enter Blog name">
                <span class="text-danger">@error('blog_name') {{$message}} @enderror</span>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Blog Email</label>
                <input  wire:model="blog_email" type="text" class="form-control" placeholder="Enter Blog email">
                <span class="text-danger">@error('blog_email') {{$message}} @enderror</span>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Blog Telephone</label>
                <input  wire:model="blog_telephone" type="text" class="form-control" placeholder="Enter Blog Nobile Number">
                <span class="text-danger">@error('blog_telephone') {{$message}} @enderror</span>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Blog Description</label>
                <textarea class="form-control"  wire:model="blog_description" rows="6" placeholder="Enter Blog Description"></textarea>
                <span class="text-danger">@error('blog_description') {{$message}} @enderror</span>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Organization Address</label>
                <textarea class="form-control"  wire:model="blog_address" rows="3" placeholder="Enter Organization Address"></textarea>
                <span class="text-danger">@error('blog_address') {{$message}} @enderror</span>
            </div>
            <button class="btn btn-success">Save Changes</button>
        </div>

        <div class="col-lg-6 mt-2 align-center">
            <img src="{{asset('admin/assets/media/stock/900x600/43.jpg')}}" class="rounded mw-100" alt="">
        </div>
    </div>
</form>
