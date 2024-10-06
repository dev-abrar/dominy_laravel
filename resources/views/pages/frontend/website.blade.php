@extends('layouts.master')
@php
$seo = App\Models\SEO::where('slug', 'website')->first();
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
                <h3 class="text-center important-tag">Website Packages</h3>
            </div>
        </div>
    </div>
</section>
<!-- ===================== banner part end====================== -->


<!-- ===================== service part start====================== -->
<section id="service">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="common_header text-center">
                    <h3>Our <span>Services</span> <span class="cmn_span">Our Services</span></h3>
                    <p>Get your business ahead of your competitors with our complete web solution packages!</p>
                </div>
            </div>
        </div>
        <div class="service_main">
            <div class="row service_row">

            </div>
        </div>
        <!-- ===================== service modal ====================== -->
        <!-- Button trigger modal -->
        <!-- Modal -->
        <div class="modal fade" style="margin-top: 130px;" id="serviceModal" tabindex="-1"
            aria-labelledby="serviceModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title fs-5" style="font-weight: 700" id="serviceModalHead"></h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p id="serviceModalP"></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- ===================== service part end====================== -->

<!-- ===================== website part start====================== -->
<section id="website">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="common_header web_header text-center">
                    <h3>Website <span>Packages</span> <span class="cmn_span">Website Packages</span></h3>
                    <p>Our package starts at only $190 for
                        website design</p>
                </div>
            </div>
        </div>
        <div class="web_main">
            <div class="row">
                <div class="col-lg-4">
                    <div class="web_item">
                        <div class="web_item_top">
                            <h3>Standard</h3>
                            <h5>$40/Per Month</h5>
                        </div>
                        <div class="web_top_diff">
                            <h2>$190</h2>
                            <h5>One Time</h5>
                        </div>
                        <div class="web_item_mid">
                            <ul>
                                <li><i class="fa-solid fa-check"></i>Custom Design & Mobile Friendly</li>
                                <li><i class="fa-solid fa-check"></i>Backend Development by PHP/Laravel</li>
                                <li><i class="fa-solid fa-check"></i> 1-5 Pages Website</li>
                                <li><i class="fa-solid fa-check"></i>Premium Theme & plugins</li>
                                <li><i class="fa-solid fa-check"></i>Popup Contact Form</li>
                                <li><i class="fa-solid fa-check"></i>Loading Speed Optimised</li>
                                <li><i class="fa-solid fa-check"></i>Premium Stock Images</li>
                                <li><i class="fa-solid fa-check"></i>Chat Widget Support</li>
                                <li><i class="fa-solid fa-check"></i>Social media page integrations</li>
                                <li><i class="fa-solid fa-check"></i>Turbo Fast Web Hosting</li>
                                <li><i class="fa-solid fa-check"></i>7 days Free Support</li>
                            </ul>
                        </div>
                        <div class="web_item_btm">
                            <a href="/event">Get Quote</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="web_item">
                        <div class="web_item_top">
                            <h3>Premium</h3>
                            <h5>$50/Per Month</h5>
                        </div>
                        <div class="web_top_diff">
                            <h2>$390</h2>
                            <h5>One Time</h5>
                        </div>
                        <div class="web_item_mid">
                            <ul>
                                <li><i class="fa-solid fa-check"></i>Custom Design & Mobile Friendly</li>
                                <li><i class="fa-solid fa-check"></i>Backend Development by PHP/Laravel</li>
                                <li><i class="fa-solid fa-check"></i> 6-10 Pages Website</li>
                                <li><i class="fa-solid fa-check"></i>Premium Theme & plugins</li>
                                <li><i class="fa-solid fa-check"></i>Popup Contact Form</li>
                                <li><i class="fa-solid fa-check"></i>Loading Speed Optimised</li>
                                <li><i class="fa-solid fa-check"></i>Premium Stock Images</li>
                                <li><i class="fa-solid fa-check"></i>Chat Widget Support</li>
                                <li><i class="fa-solid fa-check"></i>Social media page integrations</li>
                                <li><i class="fa-solid fa-check"></i>Turbo Fast Web Hosting</li>
                                <li><i class="fa-solid fa-check"></i>7 days Free Support</li>
                            </ul>
                        </div>
                        <div class="web_item_btm">
                            <a href="/event">Get Quote</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="web_item">
                        <div class="web_item_top">
                            <h3>Custom</h3>
                            <h5>White Label</h5>
                        </div>
                        <div class="web_top_diff">
                            <h2>$590+</h2>
                            <h5>Per Month</h5>
                        </div>
                        <div class="web_item_mid">
                            <ul>
                                <li><i class="fa-solid fa-check"></i>Unlimited Website</li>
                                <li><i class="fa-solid fa-check"></i>Backend Development by PHP/Laravel</li>
                                <li><i class="fa-solid fa-check"></i>Unlimited Pages</li>
                                <li><i class="fa-solid fa-check"></i>Premium Theme & plugins</li>
                                <li><i class="fa-solid fa-check"></i>Popup Contact Form</li>
                                <li><i class="fa-solid fa-check"></i>Loading Speed Optimised</li>
                                <li><i class="fa-solid fa-check"></i>Premium Stock Images</li>
                                <li><i class="fa-solid fa-check"></i>Chat Widget Support</li>
                                <li><i class="fa-solid fa-check"></i>Social media page integrations</li>
                                <li><i class="fa-solid fa-check"></i>Turbo Fast Web Hosting</li>
                                <li><i class="fa-solid fa-check"></i>7 days Free Support</li>
                            </ul>
                        </div>
                        <div class="web_item_btm">
                            <a href="/event">Get Quote</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ===================== website part end====================== -->


<!-- ===================== Testimoinal part start====================== -->
<section id="testimonial">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="common_header header_test text-center">
                    <h3>Test<span>imonial </span> <span class="cmn_span">Testimonial</span></h3>
                    <p>Awesome 5.0 Based on 62 reviews and ratings based on Google, Facebook, Trustpilot, and Clutch.
                    </p>
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
