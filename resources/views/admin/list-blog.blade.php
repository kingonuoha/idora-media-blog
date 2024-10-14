@extends('layouts.admin.admin-layout')
@section('title', "Idora Media Admin | Blog List");
@section('content')

@livewire('all-post')

@endsection
@push('script')
    <script>
        window.addEventListener('deletePostConfirm', (e)=>{
            swal.fire({
                title:e.detail.title,
                imageWidth:48,
                imageHeight:48,
                html:e.detail.body,
                showCloseButton:true,
                showCancelButton:true,
                cancelButtonText:'Cancel',
                confirmButtonText: "Yes, Delete!",
                cancelButtonColor: '#d33',
                confirmButtonColor: "#3085d6",
                width:300,
                allowOutsideClick:false
            }).then(function(result){
                if(result.value){
                    window.livewire.emit('deletePostAction', e.detail.id);
                }
            })
        })
    </script>
@endpush