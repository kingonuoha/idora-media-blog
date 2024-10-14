@extends('layouts.admin.admin-layout')
@section('title', "Idora Media Admin | Blog Categories");
@section('content')
    @livewire('categories')

@endsection

@push('script')
    <script>
        window.addEventListener('hideCategoriesModal', function(e){
            $('#kt_add_category').modal('hide');
        })
        window.addEventListener('showCategoriesModa', function(e){
            $('#kt_add_category').modal('show');
        })
        window.addEventListener('hideSubCategoriesModal', function(e){
            $('#kt_add_sub_category').modal('hide');
        })
        window.addEventListener('showSubCategoriesModa', function(e){
            $('#kt_add_sub_category').modal('show');
        })
        
        $('#kt_add_sub_category, #kt_add_category').on('hidden.bs.modal', function(e){
            Livewire.emit('resetModalForm');
        })
       
        window.addEventListener('deleteCategoryConfirm', function(e){
           swal.fire({
            title:e.detail.title,
            icon:"warning",
            html:e.detail.body,
            showCancelButton:true,
            showClodeButton:true,
            cancelButtonText: "Cancel",
            confirmButtonText:"Yes, Delete",
            cancelButtonColor: "#d33",
            confrimButtonColor:"#3085d6",
            allowOutsideClick:false,
           }).then(function(result){
            if(result.value){
                window.Livewire.emit('deleteCtegoryAction', e.detail.id)
            }else{
            swal.fire({
            title:"Canceled!",
            icon:"info",
            html:"Action Cancelled By User, Your Category is safe",
            confirmButtonText:"Ok, Got it",
           })
            }
           })
        })


        window.addEventListener('deleteSubCategoryConfirm', function(e){
           swal.fire({
            title:e.detail.title,
            icon:"warning",
            html:e.detail.body,
            showCancelButton:true,
            showClodeButton:true,
            cancelButtonText: "Cancel",
            confirmButtonText:"Yes, Delete",
            cancelButtonColor: "#d33",
            confrimButtonColor:"#3085d6",
            allowOutsideClick:false,
           }).then(function(result){
            if(result.value){
                window.Livewire.emit('deletesubCategoryAction', e.detail.id)
            }else{
            swal.fire({
            title:"Canceled!",
            icon:"info",
            html:"Action Cancelled By User, Your Category is safe",
            confirmButtonText:"Ok, Got it",
           })
            }
           })
        })
    </script>
@endpush