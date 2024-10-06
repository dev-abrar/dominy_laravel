@extends('layouts.sideNav')

@section('content')
@include('components.quote.view_quote')
@endsection

@section('footer_script')
@include('components.quote.quote_js')
@endsection
