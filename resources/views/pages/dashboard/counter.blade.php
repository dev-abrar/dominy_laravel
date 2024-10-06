@extends('layouts.sideNav')

@section('content')
    @include('components.counter.counter_list')
    @include('components.counter.counter_create')
    @include('components.counter.counter_update')
@endsection
    
@section('footer_script')
    @include('components.counter.counter_js')
@endsection
