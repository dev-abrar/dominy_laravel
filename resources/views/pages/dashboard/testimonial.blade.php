@extends('layouts.sideNav')

@section('content')
    @include('components.testimonial.testimonial_list')
    @include('components.testimonial.testimonial_create')
  
    
@endsection
    
@section('footer_script')
@include('components.testimonial.testimonial_js')
    
@endsection