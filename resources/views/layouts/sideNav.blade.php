<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dominytech Dashboard</title>
    <!-- core:css -->
    <link rel="stylesheet" href="{{asset('admin/vendors/core/core.css')}}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- end plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{asset('admin/fonts/feather-font/css/iconfont.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('admin/css/demo_1/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('admin/images/favicon.png')}}" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    @toastifyCss
    @toastifyJs
</head>

<body>
    <div class="main-wrapper">

        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar">
            <div class="sidebar-header">
                <a href="#" class="sidebar-brand">
                    Dominy<span>Tech</span>
                </a>
                <div class="sidebar-toggler not-active">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="sidebar-body">
                <ul class="nav">
                    <li class="nav-item nav-category">Main</li>
                    <li class="nav-item">
                        <a href="{{url('/home')}}" class="nav-link">
                            <i class="link-icon" data-feather="box"></i>
                            <span class="link-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item nav-category">admin</li>
                    <li class="nav-item">
                        <a href="{{url('/users')}}" class="nav-link">
                            <i class="link-icon" data-feather="users"></i>
                            <span class="link-title">User List</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/edit-web-contents')}}" class="nav-link">
                            <i class="link-icon" data-feather="airplay"></i>
                            <span class="link-title">Website Contents</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#website" role="button" aria-expanded="false"
                            aria-controls="website">
                            <i class="link-icon" data-feather="codepen"></i>
                            <span class="link-title">Sections</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="website">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="{{url('/service')}}" class="nav-link">Services</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/counter')}}" class="nav-link">Counter</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/team')}}" class="nav-link">Team Members</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/gallery')}}" class="nav-link">Gallery</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/client')}}" class="nav-link">Client</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/add-blog')}}" class="nav-link">Blogs</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/testimonial')}}" class="nav-link">Testimonial</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/portfolio-page')}}" class="nav-link">Our Work</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/add-seo')}}" class="nav-link">
                            <i class="link-icon" data-feather="award"></i>
                            <span class="link-title">SEO Pages</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/messages')}}" class="nav-link">
                            <i class="link-icon" data-feather="mail"></i>
                            <span class="link-title">Messages</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/quote')}}" class="nav-link">
                            <i class="link-icon" data-feather="bell"></i>
                            <span class="link-title">Quotation</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <nav class="settings-sidebar">
            <div class="sidebar-body">
                <a href="#" class="settings-sidebar-toggler">
                    <i data-feather="settings"></i>
                </a>
                <h6 class="text-muted">Sidebar:</h6>
                <div class="form-group border-bottom">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight"
                                value="sidebar-light" checked>
                            Light
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark"
                                value="sidebar-dark">
                            Dark
                        </label>
                    </div>
                </div>
                <div class="theme-wrapper">
                    <h6 class="text-muted mb-2">Light Theme:</h6>
                    <a class="theme-item active" href="../../../demo_1/dashboard-one.html">
                        <img src="../../../assets/images/screenshots/light.jpg" alt="light theme">
                    </a>
                    <h6 class="text-muted mb-2">Dark Theme:</h6>
                    <a class="theme-item" href="../../../demo_2/dashboard-one.html">
                        <img src="../../../assets/images/screenshots/dark.jpg" alt="light theme">
                    </a>
                </div>
            </div>
        </nav>
        <!-- partial -->

        <div class="page-wrapper">

            <!-- partial:../../partials/_navbar.html -->
            <nav class="navbar">
                <a href="#" class="sidebar-toggler">
                    <i data-feather="menu"></i>
                </a>
                <div class="navbar-content">
                    <form class="search-form">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i data-feather="search"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
                        </div>
                    </form>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="flag-icon flag-icon-us mt-1" title="us"></i> <span
                                    class="font-weight-medium ml-1 mr-1 d-none d-md-inline-block">English</span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="languageDropdown">
                                <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-us"
                                        title="us" id="us"></i> <span class="ml-1"> English </span></a>
                                <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-fr"
                                        title="fr" id="fr"></i> <span class="ml-1"> French </span></a>
                                <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-de"
                                        title="de" id="de"></i> <span class="ml-1"> German </span></a>
                                <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-pt"
                                        title="pt" id="pt"></i> <span class="ml-1"> Portuguese </span></a>
                                <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-es"
                                        title="es" id="es"></i> <span class="ml-1"> Spanish </span></a>
                            </div>
                        </li>
                        <li class="nav-item dropdown nav-messages">
                            <a class="nav-link dropdown-toggle position-relative" href="#" id="messageDropdown"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="mail"></i><span class="position-absolute bg-danger text-white msg_box"
                                    style="right: -5px;
                                    top: -12px;
                                    padding: 0px 4px;
                                    border-radius: 10px;">0</span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="messageDropdown">
                                <div class="dropdown-header d-flex align-items-center justify-content-between">
                                    <p class="mb-0 font-weight-medium msg_count"></p>
                                </div>
                                <div class="dropdown-body available_message">

                                </div>
                                <div class="dropdown-footer d-flex align-items-center justify-content-center">
                                    <a href="{{url('/messages')}}">View all</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown nav-messages">
                            <a class="nav-link dropdown-toggle position-relative" href="#" id="messageDropdown"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="bell"></i><span class="position-absolute bg-danger text-white qut_box"
                                    style="right: -5px;
                                    top: -12px;
                                    padding: 0px 4px;
                                    border-radius: 10px;">0</span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="messageDropdown">
                                <div class="dropdown-header d-flex align-items-center justify-content-between">
                                    <p class="mb-0 font-weight-medium qut_count"></p>
                                </div>
                                <div class="dropdown-body available_quote">

                                </div>
                                <div class="dropdown-footer d-flex align-items-center justify-content-center">
                                    <a href="{{url('/quote')}}">View all</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown nav-profile">
                            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if (Auth::user()->photo != null)
                                <img style="object-fit: cover;" src="{{asset('upload/user')}}/{{Auth::user()->photo}}"
                                    alt="profile">
                                @else
                                <img src="{{ Avatar::create(Auth::user()->name)->toBase64() }}" />
                                @endif
                            </a>
                            <div class="dropdown-menu" aria-labelledby="profileDropdown">
                                <div class="dropdown-header d-flex flex-column align-items-center">
                                    <div class="figure mb-3">
                                        @if (Auth::user()->photo != null)
                                        <img style="object-fit: cover;"
                                            src="{{asset('upload/user')}}/{{Auth::user()->photo}}" alt="profile">
                                        @else
                                        <img src="{{ Avatar::create(Auth::user()->name)->toBase64() }}" />
                                        @endif
                                    </div>
                                    <div class="info text-center">
                                        <p class="name font-weight-bold mb-0">{{Auth::user()->name}}</p>
                                        <p class="email text-muted mb-3">{{Auth::user()->email}}</p>
                                    </div>
                                </div>
                                <div class="dropdown-body">
                                    <ul class="profile-nav p-0 pt-3">
                                        <li class="nav-item">
                                            <a href="{{url('/profile')}}" class="nav-link">
                                                <i data-feather="user"></i>
                                                <span>Profile</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('/logout')}}" class="nav-link">
                                                <i data-feather="log-out"></i>
                                                <span>Log Out</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- partial -->

            <div class="page-content">
                @yield('content')
            </div>

            <!-- partial:../../partials/_footer.html -->
            <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">
                <p class="text-muted text-center text-md-left">Copyright © 2021 <a href="https://www.dominytech.com"
                        target="_blank">Dominytech</a>. All rights reserved</p>
                <p class="text-muted text-center text-md-left mb-0 d-none d-md-block">Handcrafted With <i
                        class="mb-1 text-primary ml-1 icon-small" data-feather="heart"></i></p>
            </footer>
            <!-- partial -->

        </div>
    </div>

    <!-- core:js -->
    <script src="{{asset('admin/vendors/core/core.js')}}"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <!-- end plugin js for this page -->
    <!-- inject:js -->

    <script src="{{asset('admin/vendors/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('admin/js/template.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net/jquery.dataTables.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>
    @yield('footer_script')

    <script>
        $(document).ready(function () {
            // get message
            function countMessage() {
                $.ajax({
                    url: "/get-message", // Route to fetch services
                    type: "GET",
                    success: function (res) {
                        let availableMessages = $('.available_message');
                        let newMessageCount = 0; // Counter for new messages
                        availableMessages.empty();

                        res.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));

                        $.each(res, function (index, message) {
                            if (message.sts === 0) {
                                newMessageCount++;
                            }

                            if (message.sts === 0) {
                                let messageItem = `
                                <a href="/message/${message.id}/reply" class="dropdown-item">
                                    <div class="content">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p>${message.name}</p>
                                            <p class="sub-text text-muted">${new Date(message.created_at).toLocaleTimeString()}</p>
                                        </div>
                                        <p class="sub-text text-muted">${message.desp.substring(0,30)}...</p>
                                    </div>
                                </a>
                            `;
                                availableMessages.append(messageItem);
                            }

                        })

                        $('.dropdown-header .msg_count').text(`${newMessageCount} New Messages`);
                        $('.msg_box').text(`${newMessageCount}`);
                    }
                });
            }

            // Call the function to load services when the page is ready
            countMessage();


            // get quote
            function countQuote() {
                $.ajax({
                    url: "/get-quote", // Route to fetch services
                    type: "GET",
                    success: function (res) {
                        let availableQuotes = $('.available_quote');
                        let newQuoteCount = 0; // Counter for new messages
                        availableQuotes.empty();

                        res.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));

                        $.each(res, function (index, quote) {
                            if (quote.sts === 0) {
                                newQuoteCount++;
                            }

                            if (quote.sts === 0) {
                                let quoteItem = `
                                <a href="/quote/${quote.id}/view" class="dropdown-item">
                                    <div class="content">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p>${quote.name}</p>
                                            <p class="sub-text text-muted">${new Date(quote.created_at).toLocaleTimeString()}</p>
                                        </div>
                                        <p class="sub-text text-muted">${quote.desp.substring(0,30)}...</p>
                                    </div>
                                </a>
                            `;
                                availableQuotes.append(quoteItem);
                            }

                        })

                        $('.dropdown-header .qut_count').text(`${newQuoteCount} New Messages`);
                        $('.qut_box').text(`${newQuoteCount}`);
                    }
                });
            }

            // Call the function to load services when the page is ready
            countQuote();
        })

    </script>
    <!-- endinject -->
    <!-- custom js for this page -->
    <!-- end custom js for this page -->
</body>

</html>
