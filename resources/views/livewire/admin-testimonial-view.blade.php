<div class="row">
    @foreach (\App\Models\Testimonials::orderBy('created_at', 'desc')->get() as $item)
    @php
        $author = \App\Models\User::find($item->user_id)
    @endphp
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
                    <img src="{{asset('idora_img/profile/'.strtoupper(substr($author->name, 0, 1)).".png")}}" alt="image">
                    @endif
                        
                </div>
                <!--end::Avatar-->
                <!--begin::Name-->
                <a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bold mb-0">{{$author->name}}</a>
                <!--end::Name-->
                <!--begin::Position-->
                <div class="fw-semibold text-gray-400 mb-2">{{$author->email}}</div>
                
                @if ($item->active == 1) 
                {{-- if its true --}}
                <div class="mb-3 badge badge-changelog badge-light-success fw-semibold fs-8 px-2 ms-2">Published!</div>
                @else
                <div class="mb-3 badge badge-changelog badge-light-danger fw-semibold fs-8 px-2 ms-2">Awaiting approval...</div>
                @endif


               <div class="d-flex justify-content-center text-center">
                <span class="text-secondary" style="font-size:1.2rem">"</span>
               <span class="text-primary fw-bold my-2">
                {{$item->message}}
               </span>
               <span class="text-secondary" style="font-size:1.2rem">"</span>
               </div>

                <!--end::Position-->
                <!--begin::Info-->
                <div class="d-flex flex-center flex-wrap">
                    <!--begin::Stats-->
                    <a class="btn btn-secondary border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3"  
                    @if ($item->active == 0)
                    wire:click.prevent="publish({{$item->id}})"
                    @else
                    wire:click.prevent="disable({{$item->id}})"
                    @endif
                    >
                    @if ($item->active == 0)
                    Publish 
                    @else
                    Disable 
                    @endif
                    </a>
                    <!--end::Stats-->
                    <!--begin::Stats-->
                    <div class="text-center border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                        <div class="fs-6 fw-bold text-gray-700">Posted</div>
                         <div class="fw-semibold text-gray-400">{{ $item->created_at != null? Carbon\Carbon::parse( $item->created_at )->diffForHumans(): "Not Defined!" }}</div>
                    </div>
                    <!--end::Stats-->
                    <!--begin::Stats-->
                    <a class="btn btn-secondary border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3"   wire:click.prevent="delete({{$item->id}})">
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
    @endforeach
</div>