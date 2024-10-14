@extends('layouts.admin.admin-layout')
@section('title', "Idora Media Admin | Users List");
@section('content')

    @livewire("users")

    
@endsection


@push('script')

<script>
    window.addEventListener('show_edit_user_modal', function (e){
        $('#kt_edit_user').modal('show');
    })
    window.addEventListener('hide_edit_user', function (e){
        $('#kt_edit_user').modal('hide');
    })
    </script>    
@endpush
