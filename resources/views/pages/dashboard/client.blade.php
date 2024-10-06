@extends('layouts.sideNav')

@section('content')
    @include('components.client.client_create')
    @include('components.client.client_list')
@endsection

@section('footer_script')
    @include('components.client.client_js')
@endsection