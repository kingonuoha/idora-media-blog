<form method="POST" wire:submit.prevent="updateBlogSocialMedia()">
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Facebook</label>
                <input wire:model="facebook_url" type="text" class="form-control" placeholder="Facebook Page Url">
                <span class="text-danger">@error('facebook_url') {{$message}} @enderror</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Instagram</label>
                <input wire:model="instagram_url" type="text" class="form-control" placeholder="Instagram Page Url">
                <span class="text-danger">@error('instagram_url') {{$message}} @enderror</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Youtube</label>
                <input wire:model="youtube_url" type="text" class="form-control" placeholder="Youtube Page Url">
                <span class="text-danger">@error('youtube_url') {{$message}} @enderror</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Twitter</label>
                <input wire:model="twitter_url" type="text" class="form-control" placeholder="Twitter Page Url">
                <span class="text-danger">@error('twitter_url') {{$message}} @enderror</span>
            </div>
            <button class="btn btn-success" type="submit">Submit</button>
        </div>
    </div>
   </form>
