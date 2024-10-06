@extends('layouts.sideNav')

@section('content')
    @include('components.quote.quote_list')
@endsection

@section('footer_script')
    @include('components.quote.quote_js')
@endsection