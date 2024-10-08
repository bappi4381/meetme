<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Meetme-Admin</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/') }}admin/images/favicon.png">
    <link rel="stylesheet" href="{{ asset('/') }}admin/vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}admin/vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="{{ asset('/') }}admin/vendor/fullcalendar/css/fullcalendar.min.css" rel="stylesheet">
    <link href="{{ asset('/') }}admin/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="{{ asset('/') }}admin/css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="logo-abbr" src="{{ asset('/') }}admin/images/logo.png" alt="">
                <img class="logo-compact" src="{{ asset('/') }}admin/images/logo-text.png" alt="">
                <img class="brand-title" src="{{ asset('/') }}admin/images/logo-text.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                                <div class="dropdown-menu p-0 m-0">
                                    <form>
                                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!------notification -->
                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-bell"></i>
                                    <div class="pulse-css"></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="list-unstyled">
                                        <li class="media dropdown-item">
                                            <span class="success"><i class="ti-user"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Martin</strong> has added a <strong>customer</strong> Successfully
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                    </ul>
                                    <a class="all-notification" href="#">See all notifications <i
                                            class="ti-arrow-right"></i></a>
                                </div>
                            </li>
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
                                    <span class="ml-2"> {{ Auth::user()->name }}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="./app-profile.html" class="dropdown-item">
                                        <i class="icon-user"></i>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="./email-inbox.html" class="dropdown-item">
                                        <i class="icon-envelope-open"></i>
                                        <span class="ml-2">Inbox </span>
                                    </a>
                                    <a href="{{ route('logout') }}" class="dropdown-item"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="icon-key"></i>
                                        <span class="ml-2">Logout</span>
                                    </a>

                                    <!-- Form for logout -->
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                        
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <li><a href="{{ route('dashboard') }}" aria-expanded="false"><i class="icon icon-app-store"></i><span
                        class="nav-text">Dashboard</span></a>
                    </li>

                    <li class="nav-label">Apps</li>

                    <li><a href="{{ route('profile') }}" aria-expanded="false"><i class="icon icon-single-04"></i><span
                        class="nav-text">Profile</span></a>
                    </li>
                    <li><a href="{{ route('service.index') }}" aria-expanded="false"><i class="icon icon-globe-2"></i><span
                        class="nav-text">Service</span></a>
                    </li>
                    <li><a href="{{ route('education.index') }}" aria-expanded="false"><i class="icon icon-plug"></i><span
                        class="nav-text">Education</span></a>
                    </li>
                    <li><a href="{{ route('proficiency.index') }}" aria-expanded="false"><i class="ti-blackboard"></i><span
                        class="nav-text">Proficiency</span></a>
                    </li>
                    <li><a href="{{ route('protfolio.index') }}" aria-expanded="false"><i class="ti-notepad"></i><span
                        class="nav-text">Protfolio</span></a>
                    </li>
                    <li><a href="{{ route('blog.index') }}" aria-expanded="false"><i class="ti-pencil-alt"></i><span
                        class="nav-text">Blog</span></a>
                    </li>
                    <li><a href="{{ route('contact.index') }}" aria-expanded="false"><i class="ti-comments"></i><span
                        class="nav-text">Contact</span></a>
                    </li>
                </ul>
            </div>


        </div>
      
        @yield('content')

        
       
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Quixkit</a> 2019</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('/') }}admin/vendor/global/global.min.js"></script>
    <script src="{{ asset('/') }}admin/js/quixnav-init.js"></script>
    <script src="{{ asset('/') }}admin/js/custom.min.js"></script>


    <!-- Vectormap -->
    <script src="{{ asset('/') }}admin/vendor/raphael/raphael.min.js"></script>
    <script src="{{ asset('/') }}admin/vendor/morris/morris.min.js"></script>


    <script src="{{ asset('/') }}admin/js/plugins-init/fullcalendar-init.js"></script>
    <script src="{{ asset('/') }}admin/vendor/gaugeJS/dist/gauge.min.js"></script>

    <!-- Owl Carousel -->
    <script src="{{ asset('/') }}admin/vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <!-- Counter Up -->

    <script src="{{ asset('/') }}admin/vendor/jqueryui/js/jquery-ui.min.js"></script>
    <script src="{{ asset('/') }}admin/vendor/moment/moment.min.js"></script>

    <script src="{{ asset('/') }}admin/vendor/fullcalendar/js/fullcalendar.min.js"></script>
    <script src="{{ asset('/') }}admin/js/plugins-init/fullcalendar-init.js"></script>

    <script src="{{ asset('/') }}admin/js/dashboard/dashboard-1.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>

</body>

</html>