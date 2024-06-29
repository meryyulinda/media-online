<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>NewsBit | Portal Berita Online</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
    <!-- theme meta -->
    <meta name="theme-name" content="newsbit" />

    <!--Favicon-->
    <link rel="shortcut icon" href="/template-frontend/theme/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/template-frontend/theme/images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="/template-frontend/theme/images/apple-touch-icon.png">
    
    <!-- THEME CSS
	================================================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="/template-frontend/theme/plugins/bootstrap/css/bootstrap.min.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="/template-frontend/theme/plugins/font-awesome/css/font-awesome.min.css">
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="/template-frontend/theme/plugins/slick-carousel/slick.css">
    <link rel="stylesheet" href="/template-frontend/theme/plugins/slick-carousel/slick-theme.css">
    <!-- manin stylesheet -->
    <link rel="stylesheet" href="/template-frontend/theme/css/style.css">
</head>
<body>

<div class="trending-bar-dark hidden-xs">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h3 class="trending-bar-title">Trending News</h3>
                <div class="trending-news-slider">
                    @foreach($trending as $trend)
                    <div class="item">
                        <div class="post-content">
                            <h2 class="post-title title-sm">
                                <a href="{{ route('frontend.berita', $trend->slug) }}">{{ $trend->judul }}</a>
                            </h2>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>


            <div class="col-md-12 col-sm-12 col-xs-12 top-nav-social-lists text-lg-right col-lg-4 ml-lg-auto">
                <ul class="list-unstyled mt-4 mt-lg-0">
                    <li>
                        <a href="#">
                            <span class="social-icon">
                                <i class="fa fa-facebook-f"></i>
                            </span>
                        </a>
                        <a href="#">
                            <span class="social-icon">
                                <i class="fa fa-twitter"></i>
                            </span>
                        </a>
                        <a href="#">
                            <span class="social-icon">
                                <i class="fa fa-google-plus"></i>
                            </span>
                        </a>
                        <a href="#">
                            <span class="social-icon">
                                <i class="fa fa-youtube"></i>
                            </span>
                        </a>
                        <a href="#">
                            <span class="social-icon">
                                <i class="fa fa-linkedin"></i>
                            </span>
                        </a>
                        <a href="#">
                            <span class="social-icon">
                                <i class="fa fa-pinterest-p"></i>
                            </span>
                        </a>
                        <a href="#">
                            <span class="social-icon">
                                <i class="fa fa-rss"></i>
                            </span>
                        </a>
                        <a href="#">
                            <span class="social-icon">
                                <i class="fa fa-github"></i>
                            </span>
                        </a>
                        <a href="#">
                            <span class="social-icon">
                                <i class="fa fa-reddit-alien"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</div>

<header class="header-navigation d-none d-lg-block">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xs-12 col-sm-3 col-md-3">
                <!-- Logo -->
                <div class="logo">
                    <a href="{{ route('frontend.home') }}">
                        <img src="/template-frontend/theme/images/logos/logo.png" alt=""> <!-- Replace Logo Here -->
                    </a>
                </div>
                <!-- End Logo -->
            </div>
            <div class="col-xs-12 col-sm-9 col-md-9">
                <div class="top-ad-banner float-right">
                    <a href="#">
                        <img src="/template-frontend/theme/images/news/ad-pro.png" class="img-fluid" alt="banner-ads">
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="main-navbar clearfix bg-dark ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg site-main-nav navigation">
                      <a class="navbar-brand d-lg-none" href="/">
                        <img src="/template-frontend/theme/images/logos/footer-logo.png" alt=""> 
                     </a>
  
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span>
                  </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">

                             <li class="nav-item">
                                <a class="nav-link" style='font-size:.7em;' href="{{ route('frontend.home') }}">Home</a>
                            </li>

                            @foreach($kategori as $katg)
                            <li class="nav-item">
                                <a class="nav-link" style='font-size:.7em;' href="{{ route('frontend.kategori', $katg['slug']) }}">{{ $katg['nama_kategori'] }}</a>
                            </li>
                            @endforeach

                            <li class="nav-item">
                                <a class="nav-link" style='font-size:.7em;' href="{{ route('frontend.indeks') }}">Indeks</a>
                            </li>

                            @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" style='font-size:.7em;' href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Halo, {{ auth()->user()->name }}
                                </a>
                                <div class="dropdown-menu">
                                    <form action="{{ route('logout') }}" method='post'>
                                        @csrf
                                        <button type='submit' class='dropdown-item' style='cursor: pointer;'>Log Out</button>
                                    </form>
                                </div>
                            </li>
                            @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" style='font-size:.7em;' href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Account
                                </a>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item" href="{{ route('login') }}">Log In</a>
                                  <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                                </div>
                            </li>
                            @endauth
                            

                        </ul>
                        <div class="nav-search ml-auto d-none d-lg-block">
                            <span id="search">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </nav>
                
            </div>
        </div>
    </div>
    <form class="site-search" action='/' method="get">
        <input type="text" id="searchInput" name="search" placeholder="Enter Keyword Here..." autofocus="" value="{{ old('search') }}">
        <div class="search-close">
            <span class="close-search">
                <i class="fa fa-times"></i>
            </span>
        </div>
    </form>
</div>

<div class="py-30"></div>



@yield('content')



<div class="py-40"></div>

<footer class="footer footer-main ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12 col-lg-6 text-center">
                <a href="/"><img src="/template-frontend/theme/images/logos/footer-logo.png" alt="" class="img-fluid"></a>
                <p class="mt-4">We perfectly balances the simplicity of a clean, eye-catching blog with the flexibility to create unique page layouts.</p>

                <ul class="list-inline footer-social">
                    <li class="li list-inline-item"><a href="https://www.facebook.com/themefisher"><i class="fa fa-facebook"></i></a></li>
                    <li class="li list-inline-item"><a href="https://twitter.com/themefisher"><i class="fa fa-twitter"></i></a></li>
                    <li class="li list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li class="li list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    <li class="li list-inline-item"><a href="#"><i class="fa fa-rss"></i></a></li>
                    <li class="li list-inline-item"><a href="#"><i class="fa fa-youtube"></i></a></li>
                </ul>

                <div class="copyright-text text-center">
                    <p class="mb-0">© All Copyright Reserved to - <a href="https://themefisher.com/" target="_blank">Themefisher</a></p>
                </div>
            </div>

            <div class="scroll-to-top">
                <button class="btn btn-primary" title="Back to Top">
                    <i class="fa fa-angle-up"></i>
                </button>
            </div>
        </div>
    </div>
</footer>


<!-- THEME JAVASCRIPT FILES
================================================== -->
<!-- initialize jQuery Library -->
<script src="/template-frontend/theme/plugins/jquery/jquery.js"></script>
<!-- Bootstrap jQuery -->
<script src="/template-frontend/theme/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- Slick Slider -->
<script src="/template-frontend/theme/plugins/slick-carousel/slick.min.js"></script>
<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
<script src="/template-frontend/theme/plugins/google-map/gmap.js"></script>
<!-- main js -->
<script src="/template-frontend/theme/js/custom.js"></script>

</body>
</html>
