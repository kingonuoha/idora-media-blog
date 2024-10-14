@extends('layouts.admin.admin-layout')
@section('title', "Idora Media Admin | ".Str::ucfirst(auth()->user()->name). " | Account Setting");
@section('content')
    

{{-- Account Nav Card --}}
<x-IDM-admin-profile-nav />
{{-- End Account Nav Card --}}

  
          @livewire('author-personal-details')

@endsection