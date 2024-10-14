@extends('layouts.admin.admin-layout')
@section('title', "Idora Media Admin | Post New Blog");
@section('content')
    
    @livewire('admin-testimonial-view')

@endsection

@push('script')
    <script>
        
        window.addEventListener('deleteTestimonialConfirm', (e)=>{
            swal.fire({
                title:e.detail.title,
                icon:"warning",
                // imageWidth:48,
                // imageHeight:48,
                html:e.detail.message,
                showCloseButton:true,
                showCancelButton:true,
                cancelButtonText:'Cancel',
                confirmButtonText: "Yes, Delete!",
                cancelButtonColor: '#d33',
                confirmButtonColor: "#3085d6",
                // width:300,
                allowOutsideClick:false
            }).then(function(result){
                if(result.value){
                    window.livewire.emit('deleteTestimonial', e.detail.id);
                }
            })
        })
    </script>
@endpush