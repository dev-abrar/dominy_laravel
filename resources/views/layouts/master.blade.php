<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('header')
    <!-- css link -->
    <link rel="icon" href="{{asset('frontend/images/favicon.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/venobox.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">
    @toastifyCss
    @toastifyJs
</head>

<body>

    <!-- ===================== navbar part start ====================== -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{url('/')}}">
                <img id="logoImg" src="" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="fa-solid fa-bars show"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-xl-5 me-auto mb-2 mb-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{url('/about')}}">About Us</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{url('/website')}}">Website Packages</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{url('/works')}}">Our Works</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{url('/blog')}}">Our Blogs</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{url('/contact')}}">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav_quote" href="https://wa.me/8801312597073" target="_blank">Get a free Quote</a>
                    </li>
                </ul>
            </div>



        </div>
    </nav>

   
    <!-- ===================== navbar part end====================== -->

    @yield('content')

    <!-- ===================== footer part start====================== -->
    <footer id="footer">
        <div class="footer_top" style="background: url('{{asset('frontend/images/contanct.jpg')}}') no-repeat center/cover;">
            <div class="container">
                <div class="footer_content">
                    <div class="row">
                        <div class="col-lg-7">
                            <h3>subscribe us to get latest news in your inbox
                                from Dominy Tech community</h3>
                        </div>
                        <div class="col-lg-5">
                            <form>
                                <input type="email" placeholder="YOUR EMAIL">
                                <button type="submit">SUBSCRIBE</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-6 wow bounceInLeft" data-wow-duration="1s" data-wow-delay=".4s">
                        <div class="foot1">
                            <img id="footLogo" width="130" src="" alt="logo">
                            <p class="footer_left_desp"></p>
                            <a class="footer_fb" href=""><i class="fa-brands fa-facebook-f"></i></a>
                            <a class="footer_twet" href=""><i class="fa-brands fa-twitter"></i></a>
                            <a class="footer_link" href=""><i class="fa-brands fa-linkedin-in"></i></a>
                            <a class="footer_ins" href=""><i class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow bounceInLeft" data-wow-duration="1s" data-wow-delay=".4s">
                        <div class="foot2">
                            <h3>Contact us</h3>
                            <div class="foot21 text-left">
                                <a class="footer_number" href=""><i class="fas fa-phone-alt"></i><span></span></a>
                                <a class="footer_mail" href=""><i class="fas fa-envelope"></i><span></span></a>
                                <a class="footer_web" href="" target="_blank"><i class="fas fa-globe-asia"></i><span></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6 wow bounceInRight" data-wow-duration="1s" data-wow-delay=".4s">
                        <div class="foot3">
                            <h3>Important Links</h3>
                            <div class="foot_menu">
                                <ul>
                                    <li><a href="{{url('/')}}">Home</a></li>
                                    <li><a href="{{url('/about')}}">About us</a></li>
                                    <li><a href="{{url('/works')}}">Portfolio</a></li>
                                    <li><a href="{{url('/blog')}}">Blogs</a></li>
                                    <li><a href="{{url('/privacy-policy')}}">privacy & policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 wow bounceInRight" data-wow-duration="1s" data-wow-delay=".4s">
                        <div class="foot4">
                            <h3>Our Address</h3>
                            <p class="footer_address text-white">/p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bottom">
            <div class="row" style="--bs-gutter-x: 0;">
                <div class="col-lg-6 m-auto">
                    <div class="foot_bottom text-center">
                        <p>Copyright &copy; 2023. All rights reserved by <a href="{{url('/')}}">Dominy Tech</a></p>
                    </div>
                </div>
            </div>
        </div>


    </footer>
    <!-- =========== footer area end ================ -->
    <div class="row">
        <div class="col-lg-1 d-none d-lg-block">
            <div class="bt_top">
                <i class="fa-solid fa-angle-up"></i>
            </div>
        </div>
    </div>





    <!-- js link -->
    <script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('frontend/js/slick.min.js')}}"></script>
    <script src="{{asset('frontend/js/waypoints.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('frontend/js/mixitup.min.js')}}"></script>
    <script src="{{asset('frontend/js/particles.min.js')}}"></script>
    <script src="{{asset('frontend/js/app.js')}}"></script>
    <script src="{{asset('frontend/js/venobox.min.js')}}"></script>
    <script src="{{asset('frontend/js/wow.min.js')}}"></script>
    <script src="{{asset('frontend/js/script.js')}}"></script>
    
    @yield('footer_script')
    <script>
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
   
    <script src="{{asset('frontend/js/frontend.js')}}"></script>
</body>

</html>
