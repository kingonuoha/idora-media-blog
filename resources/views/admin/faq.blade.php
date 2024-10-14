@extends('layouts.admin.admin-layout')
@section('title', "Idora Media Admin | ".Str::ucfirst(auth()->user()->name). " | Account Setting");
@section('content')
    
    <div class="row">
        <div class="col-lg-7">
            @livewire('fa-questions')
        </div>
        <div class="col-lg-5 ">
            <h3>Add new Question</h3>
           @livewire('faq-add')
        </div>
    </div>


@endsection
@push('script')
    <script>
        window.addEventListener('showFaqModal', (e)=>{
            $('#kt_edit_faq').modal('show');
    })
        window.addEventListener('closeFaqModal', (e)=>{
            $('#kt_edit_faq').modal('hide');
    })

        window.addEventListener('deleteFaqConfirm', (e)=>{
            swal.fire({
            title:e.detail.title,
            icon:"warning",
            html:e.detail.msg,
            showCancelButton:true,
            showClodeButton:true,
            cancelButtonText: "Cancel",
            confirmButtonText:"Yes, Delete",
            cancelButtonColor: "#d33",
            confrimButtonColor:"#3085d6",
            allowOutsideClick:false,
           }).then(function(result){
            if(result.value){
                window.Livewire.emit('deleteFaqConfirmed', e.detail.id)
            }else{
            swal.fire({
            title:"Canceled!",
            icon:"info",
            html:"Action Cancelled By User, Your Question was not Deleted",
            confirmButtonText:"Ok, Got it",
           })
            }
           })
        })
    </script>
@endpush
