@extends('layouts.master')
@php
    $seo = App\Models\SEO::where('slug', 'contact')->first();
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
                    <h1 class="text-center">Contact</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- ===================== banner part end====================== -->

    <!-- ===================== contact part start====================== -->
    <section id="contact" style="background: url('{{asset('frontend/images/contact_bg.jpg')}}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="common_header head_team text-center">
                        <h3>Contct <span>Us</span> <span class="cmn_span">Contact Us</span></h3>
                        <p>We promote sustained, inclusive, and sustainable economic growth, full and productive
                            employment, and
                            decent work for all.</p>
                    </div>
                </div>
            </div>
            <div class="contact_main">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact_left">
                            <img src="{{asset('frontend/images/contact.jpg')}}" class="w-100 img-fluid" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact_form">
                            <h3>Dominy <span>Tech</span></h3>
                            <form id="contactFrom">
                                <div class="mb-3">
                                    <label>Your Name</label>
                                    <input type="text" id="c_name">
                                </div>
                                <div class="mb-3">
                                    <label>Your Email</label>
                                    <input type="text" id="c_email">
                                </div>
                                <div class="mb-3">
                                    <label>Message</label>
                                    <textarea id="c_desp"></textarea>
                                </div>
                                <div class="mb-3">
                                    <button type="button" class="c_btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===================== contact part end====================== -->
@endsection