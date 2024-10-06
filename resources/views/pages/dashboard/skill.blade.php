@extends('layouts.sideNav')

@section('content')
    @include('components.skill.skill_create')
    @include('components.skill.skill_list')
@endsection
@section('footer_script')
    @include('components.skill.skill_js')
@endsection