<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Chameleon Admin is a modern Bootstrap 4 webapp &amp; admin dashboard html template with a large number of components, elegant design, clean and organized code.">
    <meta name="keywords"
        content="admin template, Chameleon admin template, dashboard template, gradient admin template, responsive admin template, webapp, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title>Dashboard - Chameleon Admin - Modern Bootstrap 4 WebApp & Dashboard HTML Template + UI Kit</title>
    <link rel="apple-touch-icon" href="{{asset('DashAdmin/theme-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('DashAdmin/theme-assets/images/ico/favicon.ico')}}">
    <link
        href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700"
        rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('DashAdmin/theme-assets/css/vendors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('DashAdmin/theme-assets/vendors/css/charts/chartist.css')}}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN CHAMELEON  CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('DashAdmin/theme-assets/css/app-lite.css')}}">
    <!-- END CHAMELEON  CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{asset('DashAdmin/theme-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css"
        href="{{asset('DashAdmin/theme-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('DashAdmin/theme-assets/css/pages/dashboard-ecommerce.css')}}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <!-- END Custom CSS-->
</head>

<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click"
    data-menu="vertical-menu" data-color="bg-chartbg" data-col="2-columns">
    <nav
        class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="collapse navbar-collapse show" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-block d-md-none"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                                href="#"><i class="ft-menu"></i></a></li>
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i
                                    class="ficon ft-maximize"></i></a></li>
                        @yield('search')
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link"
                                id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false"><i class="flag-icon flag-icon-us"></i><span
                                    class="selected-language"></span></a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                                <div class="arrow_box"><a class="dropdown-item" href="#"><i
                                            class="flag-icon flag-icon-us"></i> English</a><a class="dropdown-item"
                                        href="#"><i class="flag-icon flag-icon-cn"></i> Chinese</a><a
                                        class="dropdown-item" href="#"><i class="flag-icon flag-icon-ru"></i>
                                        Russian</a><a class="dropdown-item" href="#"><i
                                            class="flag-icon flag-icon-fr"></i> French</a><a class="dropdown-item"
                                        href="#"><i class="flag-icon flag-icon-es"></i> Spanish</a></div>
                            </div>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#"
                                data-toggle="dropdown"><i class="ficon ft-mail"> </i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="arrow_box_right"><a class="dropdown-item" href="#"><i class="ft-book"></i>
                                        Read Mail</a><a class="dropdown-item" href="#"><i class="ft-bookmark"></i> Read
                                        Later</a><a class="dropdown-item" href="#"><i class="ft-check-square"></i> Mark
                                        all Read </a></div>
                            </div>
                        </li>
                        <li class="dropdown dropdown-user nav-item"><a
                                class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <span class="avatar avatar-online"><img
                                        src="{{asset('DashAdmin/theme-assets/images/portrait/small/avatar-s-19.png')}}"
                                        alt="avatar"><i></i></span></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="arrow_box_right"><a class="dropdown-item" href="{{route('admin.home')}}"><span
                                            class="avatar avatar-online"><img
                                                src="{{asset('DashAdmin/theme-assets/images/portrait/small/avatar-s-19.png')}}"
                                                alt="avatar"><span class="user-name text-bold-700 ml-1">
                                            </span>{{Auth::user()->name}}</span></a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="{{route('admin.profile')}}"><i
                                            class="ft-user"></i> Edit Profile</a><a class="dropdown-item" href="#"><i
                                            class="ft-mail"></i> My Inbox</a><a class="dropdown-item" href="#"><i
                                            class="ft-check-square"></i> Task</a><a class="dropdown-item" href="#"><i
                                            class="ft-message-square"></i> Chats</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="ft-power">Logout</i>
                                    </a>
                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true"
        data-img="theme-assets/images/backgrounds/02.jpg">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="#"><img class="brand-logo"
                            alt="Chameleon admin logo" src="{{asset('DashAdmin/theme-assets/images/logo/logo.png')}}" />
                        <h3 class="brand-text">Chameleon</h3>
                    </a></li>
                <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
            </ul>
        </div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="active"><a href="{{route('admin.home')}}"><i class="ft-home"></i><span
                            class="menu-title" data-i18n="">Dashboard</span></a>
                </li>
                <li class=" nav-item"><a href="{{route('admin.addCategory')}}"><i class="ft-pie-chart"></i><span class="menu-title"
                            data-i18n="">Gestion Categories</span></a>
                </li>
                <li class=" nav-item"><a href="{{route('admin.getform')}}"><i class="ft-droplet"></i><span class="menu-title"
                            data-i18n="">Add Product</span></a>
                </li>
                <li class=" nav-item"><a href="{{route('admin.ListProduct')}}"><i class="ft-layers"></i><span class="menu-title"
                            data-i18n="">List Product</span></a>
                </li>
            </ul>
        </div><a class="btn btn-danger btn-block btn-glow btn-upgrade-pro mx-1"
            href="https://themeselection.com/products/chameleon-admin-modern-bootstrap-webapp-dashboard-html-template-ui-kit/"
            target="_blank">Ahmed!</a>
        <div class="navigation-background"></div>
    </div>
    <div class="app-content content">
        @yield('content')
    </div>

    <footer class="footer footer-static footer-light navbar-border navbar-shadow">
        <div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span
                class="float-md-left d-block d-md-inline-block">2018 &copy; Copyright <a
                    class="text-bold-800 grey darken-2" href="https://themeselection.com"
                    target="_blank">ThemeSelection</a></span>
            <ul class="list-inline float-md-right d-block d-md-inline-blockd-none d-lg-block mb-0">
                <li class="list-inline-item"><a class="my-1" href="https://themeselection.com/" target="_blank"> More
                        themes</a></li>
                <li class="list-inline-item"><a class="my-1" href="https://themeselection.com/support" target="_blank">
                        Support</a></li>
                <li class="list-inline-item"><a class="my-1"
                        href="https://themeselection.com/products/chameleon-admin-modern-bootstrap-webapp-dashboard-html-template-ui-kit/"
                        target="_blank"> Purchase</a></li>
            </ul>
        </div>
    </footer>

    <!-- BEGIN VENDOR JS-->
    <script src="{{asset('DashAdmin/theme-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{asset('DashAdmin/theme-assets/vendors/js/charts/chartist.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN CHAMELEON  JS-->
    <script src="{{asset('DashAdmin/theme-assets/js/core/app-menu-lite.js')}}" type="text/javascript"></script>
    <script src="{{asset('DashAdmin/theme-assets/js/core/app-lite.js')}}" type="text/javascript"></script>
    <!-- END CHAMELEON  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{asset('DashAdmin/theme-assets/js/scripts/pages/dashboard-lite.js')}}" type="text/javascript">
    </script>
    <!-- END PAGE LEVEL JS-->
</body>

</html>
