<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Arina | Personal Resume and Portfolio HTML Template</title>
    <!-- Favicon-->
    <link rel="icon" type="{{ asset('/') }}assets/image/x-icon" href="images/favicon.ico">
    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;400;500;700&family=Roboto:wght@300;400;700&display=swap"
          rel="stylesheet">
    <!-- Bootstrap Styles -->
    <link href="{{ asset('/') }}assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/font-awesome.min.css">
    <!-- Site Styles -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/styles.css">
</head>
<body>
<div id="wrapper" class="wrapper">
    <div class="page-container">
        <div class="row">
            <div class="col-lg-4">
                <aside class="sidebar">
                    <div class="sidebar-inner">
                        <div class="profile-picture">
                            <img src="{{ $profile->image ? asset('storage/' . $profile->image) : asset('assets/images/profile-pic-xs.png') }}" alt="">
                        </div>
                        <div class="profile-info">
                            <h3>{{ $profile->name ?? 'Name Not Available' }}</h3>
                            <p>{{ $profile->position ?? 'Position Not Available' }}</p>
                        </div>
                        <div class="mobile-menu-trigger">
                            <button><span></span></button>
                        </div>
                        <div class="social-media">
                            <ul>
                                <li><a target="_blank" href="{{ $profile->li_link ?? '#' }}"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a target="_blank" href="{{ $profile->x_link ?? '#' }}"><i class="fab fa-twitter"></i></a></li>
                                <li><a target="_blank" href="{{ $profile->fa_link ?? '#' }}"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a target="_blank" href="{{ $profile->git_link ?? '#' }}"><i class="fab fa-github"></i></a></li>
                                <li><a target="_blank" href="{{ $profile->be_link ?? '#' }}"><i class="fab fa-behance"></i></a></li>
                                <li><a target="_blank" href="{{ $profile->dr_link ?? '#' }}"><i class="fab fa-dribbble"></i></a></li>
                            </ul>
                        </div>
                        <!--profile-intro-->
                        <div class="short-contact">
                            <ul class="contact-info">
                                <li>
                                    <span><i class="fa fa-phone-alt"></i></span>
                                    <span><strong>Phone</strong> <a href="tel:{{ $profile->phone }}">{{ $profile->phone ?? 'N/A' }}</a></span>
                                </li>
                                <li>
                                    <span><i class="fa fa-envelope-open"></i></span>
                                    <span><strong>Email</strong> <a href="mailto:{{ $profile->email }}">{{ $profile->email ?? 'N/A' }}</a></span>
                                </li>
                                <li>
                                    <span><i class="fa fa-location-arrow"></i></span>
                                    <span><strong>Location</strong> <a target="_blank" href="#">{{ $profile->location ?? 'N/A' }}</a></span>
                                </li>
                            </ul>
                        </div>
                        <div class="download-cv mb-4">
                            <a class="" target="_blank" href="#">
                                <i class="fa fa-download"></i> Download Resume
                            </a>
                        </div>
                    </div>
                    <!--sidebar-->
                </aside>
            </div>
            <div class="col-lg-8">
                <main class="page-content">
                    <nav class="main-navigation">
                        <div class="menu-area-inner">
                            <ul class="nav">
                                <li class="{{ Route::is('home') ? 'active' : '' }}">
                                    <a href="{{ route('home') }}">
                                        <i class="far fa-user"></i> Home
                                    </a>
                                </li>
                                <li class="{{ Route::is('resume') ? 'active' : '' }}">
                                    <a href="{{ route('resume') }}">
                                        <i class="far fa-file-word"></i> Resume
                                    </a>
                                </li>
                                <li class="{{ Route::is('portfolio') ? 'active' : '' }}">
                                    <a href="{{ route('portfolio') }}">
                                        <i class="fas fa-th-large"></i> Portfolio
                                    </a>
                                </li>
                                <li class="{{ Route::is('blog') ? 'active' : '' }}">
                                    <a href="{{ route('blog') }}">
                                        <i class="fas fa-blog"></i> Blog
                                    </a>
                                </li>
                                <li class="{{ Route::is('contact') ? 'active' : '' }}">
                                    <a href="{{ route('contact') }}">
                                        <i class="fa fa-address-book"></i> Contact
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </nav>
                   @yield('content')
                </main>
            </div>
        </div>
    </div>
</div>
<!--wrapper-->
<div class="project-popup">
    <div class="project-popup-inner">
        <div class="close-project-popup"><i class="fas fa-times"></i></div>
        <div class="project-popup-inner-scroll">
            <div class="project-popup-content">
            </div>
        </div>

    </div>
</div>
<!--project-popup-->
<!-- jQuery Library -->
<script src="{{ asset('/') }}assets/js/jquery.min.js"></script>
<!-- Masonry Library -->
<script src="{{ asset('/') }}assets/js/masonry.pkgd.min.js"></script>
<!-- Particles and Particles Config App Library -->
<script src="{{ asset('/') }}assets/js/particles.min.js"></script>
<script src="{{ asset('/') }}assets/js/particles.app.js"></script>
<!-- Theme Scripts -->
<script src="{{ asset('/') }}assets/js/theme.js"></script>
</body>
</html>