@extends('layouts.master')
@php
    $seo = App\Models\SEO::where('slug', 'home')->first();
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
  <section id="banner" class="banner" style=" background: linear-gradient(126deg, rgba(0, 0, 0, 0.70) 70%, rgba(255, 95, 32, 0.85) 30%), url('{{asset('frontend/images/bannwe1.JPG')}}') no-repeat center/cover fixed;">
    <div class="d-none d-lg-block" id="particles-js"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-10">
          <h1><span class="wow fadeInDown " data-wow-duration=".6s" data-wow-delay=".2s">Dominy Tech</span> <span
              class="wow fadeInDown " data-wow-duration=".6s" data-wow-delay=".4s">Web <span
                class="ban_span wow fadeInDown" data-wow-duration=".6s" data-wow-delay=".6s">Technology</span></span>
            <span class="wow fadeInDown " data-wow-duration="1s" data-wow-delay=".8s">Company</span></h1>
          <p class="wow fadeInDown home_content" data-wow-duration=".6s" data-wow-delay="1s"></p>
          <a href="contact.html" class="wow fadeInDown scroll-link" data-wow-duration=".6s" data-wow-delay="1.2s">Hire Us</a>
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
        <div class="modal fade" style="margin-top: 130px;" id="serviceModal" tabindex="-1" aria-labelledby="serviceModal" aria-hidden="true">
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

  <!-- ===================== counter part start====================== -->
  <section id="counter">
    <div class="container">
      <div class="counter_main">
        <div class="row counter_row">
          
        </div>
      </div>
    </div>
  </section>
  <!-- ===================== counter part end====================== -->

  <!-- ===================== team part start====================== -->
  <section id="team">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 m-auto">
          <div class="common_header head_team text-center">
            <h3>Our <span>Team</span> <span class="cmn_span">Our Team</span></h3>
            <p>We promote sustained, inclusive, and sustainable economic growth, full and productive employment, and
              decent work for all.</p>
          </div>
        </div>
      </div>
      <div class="team_main">
        <div class="row team_row">
         
        </div>
      </div>
    </div>
  </section>
  <!-- ===================== team part end====================== -->

  <!-- ===================== gallery part start====================== -->
  <section id="portfolio">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 m-auto">
          <div class="common_header header_port text-center">
            <h3>Our <span>Gallery</span> <span class="cmn_span">Our Gallery</span></h3>
            <p>We are known for building stunning and captivating websites for both businesses and Individuals and also
              humbled by 100% client satisfaction!!</p>
          </div>
        </div>
      </div>

      <div class="port_row">
        <div class="port_list text-center">
          <button type="button" class="control" data-filter="all">All</button>
          <button type="button" class="control" data-filter=".uidesign">UI/UX Design</button>
          <button type="button" class="control" data-filter=".wordpress">Wordpress</button>
          <button type="button" class="control" data-filter=".webdesign">Web Design</button>
          <button type="button" class="control" data-filter=".webdevelopment">Web Development</button>
        </div>
        <div class="row port_mix justify-content-between">
          
        </div>
      </div>
    </div>
  </section>
  <!-- ===================== gallery part end====================== -->

  <!-- ===================== client part start====================== -->
  <section id="client">
    <div class="container">
      <div class="row client_row">

      </div>
    </div>
  </section>
  <!-- ===================== client part end====================== -->

  <!-- ===================== blog part start====================== -->
  <section id="blog">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 m-auto">
          <div class="common_header head_team blog_head text-center">
            <h3>Our <span>Blog</span> <span class="cmn_span">Our Blog</span></h3>
            <p>We promote sustained, inclusive, and sustainable economic growth, full and productive employment, and decent work for all.</p>
          </div>
        </div>
      </div>
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