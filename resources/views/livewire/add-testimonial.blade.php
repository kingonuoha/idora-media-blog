<form wire:submit.prevent="addTestimonial()" method="post">
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow">
               <div class="card-header">
                <h3>Add Testimony</h3><hr>
               </div>
               <div class="card-body">
                <div class="row p-2">
                    <div class="col-lg-6 mb-2">
                        <label for="" class="form-label">Name</label>
                        <input wire:model="name" class="form-control" type="text" placeholder="Enter Name" disabled>
                    </div>
                    <div class="col-lg-6 mb-2">
                        <label for="" class="form-label">Email</label>
                        <input wire:model='email'  class="form-control" type="text" placeholder="Enter Email"  disabled>
                    </div>
                    <div class="col-lg-12 mb-2">
                        <label for="" class="form-label">Testimony</label>
                        <textarea wire:model="message"  class="form-control" rows="3" placeholder="Enter Testimonial.."></textarea>
                        <span class="text-danger">@error('message') {{$message}} @enderror</span>
                    </div>
                    <button type="submit" class="btn btn-success ml-2">Submit</button>
                </div>
               </div>
               </div>
        </div>
      </div>
 </form>