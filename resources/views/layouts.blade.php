<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Cars</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>

    <!-- External CSS libraries -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-submenu.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/flaticon/font/flaticon.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('fonts/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/linearicons/style.css') }}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('css/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('css/dropzone.css') }}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('css/lightbox.min.css') }}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('css/jnoty.css') }}">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="{{ asset('css/skins/red.css') }}">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon" >

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPlayfair+Display:400,700%7CRoboto:100,300,400,400i,500,700">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/ie10-viewport-bug-workaround.css') }}">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script  src="{{ asset('js/ie8-responsive-file-warning.js') }}"></script><![endif]-->
    <script  src="{{ asset('js/ie-emulation-modes-warning.js') }}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script  src="{{ asset('js/html5shiv.min.js') }}"></script>
    <script  src="{{ asset('js/respond.min.js') }}"></script>
    <![endif]-->
</head>
<body class="comon-index">

<div class="page_loader"></div>

<!-- Top header 3 start -->
<div class="top-header-3" id="top-header-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-3">
                <div class="top-logo">
                    <a href="/"><img src="{{asset('img/logos/black-logo.png')}}" alt="logo"></a>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <div class="top-header-inner">
                    <div class="top-contact-item tci2">
                        <i class="bi bi-telephone-inbound"></i>
                        <div class="content">
                            <p>Contact ME</p>
                            <a href="tel:+359887079256">+359887079256</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Top header 3 end -->

<!-- Main header start -->
<header class="main-header main-header-5 sticky-header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand logos mr-auto" href="index.html">
                <img src="{{asset('img/logos/logo.png')}}" alt="logo" class="logo-photo">
            </a>
            <button class="navbar-toggler" id="drawer" type="button">
                <span class="fa fa-bars"></span>
            </button>
            <div class="navbar-collapse collapse w-100" id="navbar">
                <ul class="navbar-nav w-100 justify-content-start">
                    @auth
                    @if(auth()->user()->isAdmin)
                    <li class="nav-item dropdown active">
                        <a class="nav-link" href="/admin/home" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Home
                        </a>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link" href="/admin/photos" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Photos
                        </a>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link" href="/admin/users" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Users
                        </a>
                    </li>
                    @else
                    <li class="nav-item dropdown active">
                        <a class="nav-link" href="/" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Home
                        </a>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link" href="/photos" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Photos
                        </a>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link" href="/users" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Users
                        </a>
                    </li>
                    @endif
                    @endauth
                    @guest
                    <li class="nav-item dropdown active">
                        <a class="nav-link" href="/" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Home
                        </a>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link" href="/photos" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Photos
                        </a>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link" href="/users" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Users
                        </a>
                    </li>
                        <li class="nav-item dropdown active">
                            <a class="nav-link" href="/contacts" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Contacts
                            </a>
                        </li>
                    @endguest
                    @auth
                    @unless(auth()->user()->isAdmin)
                    <li class="nav-item dropdown active">
                        <a class="nav-link" href="/contacts" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Contacts
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="/profile" id="navbarDropdownMenuLink6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Profile
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="/profile/pic">Upload Picture</a></li>
                            <li><a class="dropdown-item" href="/profile/edit">Edit Profile</a></li>
                        </ul>
                    </li>
                        @endunless
                    @endauth
                </ul>
                @auth
                <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
                    <li class="nav-item">
                        <form class="inline-search-area" method="POST" action="/logout">
                            @csrf
                            <button type="submit" class="btn btn-lg btn-4 btn-primary">
                                <i class="fa-solid fa-door-closed"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
                @endauth
            </div>
        </nav>
    </div>
</header>
<!-- Main header end -->

<!-- Sidenav start -->
<nav id="sidebar" class="nav-sidebar">
    <!-- Close btn-->
    <div id="dismiss">
        <i class="fa fa-close"></i>
    </div>
    <div class="sidebar-inner">
        <div class="sidebar-logo">
            <img src="{{asset('img/logos/black-logo.png')}}" alt="logo">
        </div>
        <div class="sidebar-navigation">
            <h3 class="heading">Pages</h3>
            <ul class="menu-list">
                @auth
                @if(auth()->user()->isAdmin)
                    <li><a href="/admin/home" class="active pt0">Home</a></li>
                    <li><a href="/admin/photos" class="active pt0">Photos</a></li>
                    <li><a href="/admin/users" class="active pt0">Users</a></li>
                    @else
                        <li><a href="/" class="active pt0">Home</a></li>
                        <li><a href="/photos" class="active pt0">Photos</a></li>
                        <li><a href="/users" class="active pt0">Users</a></li>
                    @endif
                @endauth
                @guest
                    <li><a href="/" class="active pt0">Home</a></li>
                    <li><a href="/photos" class="active pt0">Photos</a></li>
                    <li><a href="/users" class="active pt0">Users</a></li>
                    <li><a href="/contacts" class="active pt0">Contact</a></li>
                @endguest
                @auth
                @unless(auth()->user()->isAdmin)
                <li><a href="/contacts" class="active pt0">Contact</a></li>

                <li><a href="/profile">Profile <em class="fa fa-chevron-down"></em></a>
                    <ul>
                        <li><a href="/profile/pic">Upload Image</a></li>
                        <li><a href="/profile/edit">Edit Profile</a></li>
                    </ul>
                </li>
                    @endunless
                <li>
                    <a href="/logout">
                        <form class="inline-search-area" method="POST" action="/logout">
                            @csrf
                            <button type="submit" class="btn btn-lg btn-4 btn-primary">
                                <i class="fa-solid fa-door-closed"></i> Logout
                            </button>
                        </form>
                    </a>
                </li>
                @endauth
            </ul>
        </div>

        <div class="get-social">
            <h3 class="heading">Get Social</h3>
            <a href="/" class="facebook-bg">
                <i class="fa fa-facebook"></i>
            </a>
            <a href="/" class="twitter-bg">
                <i class="fa fa-twitter"></i>
            </a>
            <a href="/" class="google-bg">
                <i class="fa fa-google"></i>
            </a>
            <a href="/" class="linkedin-bg">
                <i class="fa fa-linkedin"></i>
            </a>
        </div>
    </div>
</nav>
<!-- Sidenav end -->


@yield('content')


<!-- Footer start -->
<footer class="footer">
    <div class="container footer-inner">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="footer-item clearfix">
                    <h4>
                        Contact Info
                    </h4>
                    <ul class="contact-info">
                        <li>
                            <i class="flaticon-pin"></i>Sofia, Bulgaria
                        </li>
                        <li>
                            <i class="flaticon-mail"></i><a href="mailto:darina.franktrax@gmail.com">darina.franktrax@gmail.com</a>
                        </li>
                        <li>
                            <i class="flaticon-phone"></i><a href="tel:+359887079256">+359887079256</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <p class="copy">© 2024 Made by Darina</p>
                </div>
                <div class="col-lg-4">
                    <div class="social-list-2">
                        <ul>
                            <li><a href="/" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="/" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="/" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="/" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer end -->


<!-- Include jQuery from CDN -->
<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>

<!-- Include other JavaScript files from the public/js directory -->
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-submenu.js') }}"></script>
<script src="{{ asset('js/rangeslider.js') }}"></script>
<script src="{{ asset('js/jquery.mb.YTPlayer.js') }}"></script>
<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('js/jquery.scrollUp.js') }}"></script>
<script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('js/dropzone.js') }}"></script>
<script src="{{ asset('js/slick.min.js') }}"></script>
<script src="{{ asset('js/jquery.filterizr.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/jquery.countdown.js') }}"></script>
<script src="{{ asset('js/jquery.mousewheel.min.js') }}"></script>
<script src="{{ asset('js/lightgallery-all.js') }}"></script>
<script src="{{ asset('js/jnoty.js') }}"></script>
<script src="{{ asset('js/sidebar.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="{{ asset('js/ie10-viewport-bug-workaround.js') }}"></script>
<!-- Custom javascript -->
<script src="{{ asset('js/ie10-viewport-bug-workaround.js') }}"></script>


</body>
</html>
