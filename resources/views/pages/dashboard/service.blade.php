@extends('layouts.sideNav')

@section('content')
    @include('components.service.service_list')
    @include('components.service.service_create')
    @include('components.service.service_update')
@endsection
    
@section('footer_script')
    @include('components.service.service_js')
@endsection
