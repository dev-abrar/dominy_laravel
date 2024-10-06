@extends('layouts.sideNav')

@section('content')
    @include('components.team.team_list')
    @include('components.team.team_create')
    @include('components.team.team_update')
@endsection

@section('footer_script')
    @include('components.team.team_js')
@endsection