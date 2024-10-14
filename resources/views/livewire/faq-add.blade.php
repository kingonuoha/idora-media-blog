<div>
   <form action="" wire:submit.prevent="addFaq">
    <div class="card p-4">
        <div class="form-group mb-2">
            <label class="form-label">Question</label>
            <input type="text" class="form-control" wire:model="question" placeholder="Enter Question">
            <span class="text-danger">@error('question') {{$message}} @enderror</span>
        </div>
        <div class="form-group mb-2">
            <label class="form-label">Answer</label>
            <textarea type="text" class="form-control"  wire:model="answer" placeholder="Enter Answer"> </textarea>
            <span class="text-danger">@error('answer') {{$message}} @enderror</span>
        </div>
        <button class="btn btn-info">
            <span class="indicator-label" wire:loading.remove wire:target="addFaq">Save</span>
            <span class="indicator-progress" wire:loading wire:target="addFaq" style="font-size:11px">Please wait... 
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span></button>
        {{-- <button class="btn btn-success w-100">Save</button> --}}
    </div>
   </form>
</div>
