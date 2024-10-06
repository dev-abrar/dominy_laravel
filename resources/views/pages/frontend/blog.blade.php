@extends('layouts.master')
@php
    $seo = App\Models\SEO::where('slug', 'blog')->first();
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
          <h1 class="text-center">Blog</h1>
        </div>
      </div>
    </div>
  </section>

  <!-- ===================== banner part end====================== -->
    <!-- ===================== blog part start====================== -->
    <section id="blog" style="padding-top: 80px">
        <div class="container">
          <div class="row blog-main">
            
          </div>
        </div>
      </section>
      <!-- ===================== blog part end====================== -->
       <!-- ===================== Testimoinal part start====================== -->
  <section id="testimonial">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 m-auto">
          <div class="common_header header_test text-center">
            <h3>Test<span>imonial </span> <span class="cmn_span">Testimonial</span></h3>
            <p>Awesome 5.0 Based on 62 reviews and ratings based on Google, Facebook, Trustpilot, and Clutch.</p>
          </div>
        </div>
      </div>
      <div class="test_main">
        <div class="row test_row">
          
        </div>
      </div>
    </div>
  </section>
  <!-- ===================== Testimoinal part end====================== -->
@endsection