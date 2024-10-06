@extends('layouts.sideNav')

@section('content')
    @include('components.gallery.gallery_create')
    @include('components.gallery.gallery_list')
    @include('components.gallery.gallery_update')
    @endsection
    
@section('footer_script')
    @include('components.gallery.gallery_js')
    
@endsection