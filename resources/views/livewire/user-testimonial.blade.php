@if (all_testimonials()->count() != 0)
<div class="testimonials-area default-padding-bottom bg-gray">
    <div class="container">
        <div class="testimonial-items text-center">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="heading">
                        <h2>10,000+ Happy Customers</h2>
                    </div>
                    <div class="testimonials-carousel owl-carousel owl-theme">
                        @foreach (all_testimonials() as $item)
                            <div class="item">
                                <p>
                                    {{$item->message}}
                                </p>
                                <div class="thumb-box">
                                    <div class="thumb">
                                            @php
                                                $user = \App\Models\User::find($item->user_id)
                                            @endphp
                                        <img src="{{asset('idora_img/profile/'.strtoupper(substr($user->name, 0, 1)).".png")}}" alt="Thumb">
                                    </div>
                                </div>
                                <h5>{{$user->name}}</h5>
                                <span>{{$user->role == 0? "User" : "Admin"}}</span>
                            </div>
                        @endforeach
                        
                        {{-- <div class="item">
                            <p>
                                Ashamed no inhabit ferrars it ye besides resolve. Own judgment directly few trifling. Elderly as pursuit at regular do parlors. Rank what has into fond pursuit at regular. 
                            </p>
                            <div class="thumb-box">
                                <div class="thumb">
                                    <img src="{{asset('user/assets/img/teams/3.jpg')}}" alt="Thumb">
                                </div>
                            </div>
                            <h5>Jonath Dark</h5>
                            <span>Senior Developer</span>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endif