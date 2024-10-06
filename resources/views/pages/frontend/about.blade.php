@extends('layouts.master')
@php
    $seo = App\Models\SEO::where('slug', 'about')->first();
@endphp
@section('header')
    
@if ($seo)
    <meta name="Developed By" content="{{$seo->author}}">
    <title>{{$seo->title}}</title>
    <meta name="title" content="{{$seo->title}}">
    <meta name="description" content="{{$seo->desp}}">
    <meta name="keywords" content="{{$seo->keywords}}">
    <link rel="canonical" href="{{$seo->canonical}}">
    <meta property="og:title" content="{{$seo->title}}">
    <meta property="og:description" content="{{$seo->desp}}">
    <meta property="og:type" content="{{$seo->og_type}}">
    <meta property="og:locale" content="{{$seo->og_locale}}">
    <meta property="og:url" content="{{$seo->og_url}}">
    <meta property="og:image:url" content="{{asset('upload/seo')}}/{{$seo->img}}">
    <meta property="og:image" content="{{asset('upload/seo')}}/{{$seo->img}}">
    <meta property="article:published_time" content="{{$seo->published_time}}">
    <meta property="article:modified_time" content="{{$seo->modified_time}}">
    <link rel="image_src" href="{{asset('upload/seo')}}/{{$seo->img}}" />
    <meta name="twitter:card" content="{{$seo->twitter_card}}" />
    <meta name="twitter:site" content="{{$seo->twitter_site}}" />
    <meta name="twitter:label1" content="{{$seo->twitter_label}}" />
    <meta name="twitter:data1" content="{{$seo->twitter_data}}" />
@endif
 
@endsection
@section('content')
<!-- ===================== banner part start====================== -->
<section id="banner" class="single-banner">
    <div class="d-none d-lg-block" id="particles-js"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center align-items-center">
                <h3 class="text-center important-tag">About Us</h3>
            </div>
        </div>
    </div>
</section>
<!-- ===================== banner part end====================== -->

<!-- ===================== about part start====================== -->
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="common_header agency_head text-center">
                    <h3>Our <span>Agency</span> <span class="cmn_span">Our Agency</span></h3>
                    <p>Hire us now to build cloud-based software, websites, and SEO strategies that generate leads
                        and sales for you </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="about_left">
                    <img src="" class="w-100 img-fluid" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about_right">
                    <h3>Our <span>Mission</span></h3>
                    <div id="ab_right_content">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ===================== about part end====================== -->

<!-- ===================== member part start====================== -->
<section id="member">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="common_header mem_head text-center">
                    <h3>Our <span>Members</span> <span class="cmn_span">Our Members</span></h3>
                    <p>We promote sustained, inclusive, and sustainable economic growth, full and productive
                        employment, and decent work for all.</p>
                </div>
            </div>
        </div>
        <div class="member_main">
            
        </div>
    </div>
</section>
<!-- ===================== member part end====================== -->
@endsection
