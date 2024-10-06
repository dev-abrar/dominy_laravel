@extends('layouts.sideNav')

@section('content')
    @include('components.portfolio.portfolio_list')
    @include('components.portfolio.portfolio_create')
  
    
@endsection
    
@section('footer_script')
@include('components.portfolio.portfolio_js')
    
@endsection