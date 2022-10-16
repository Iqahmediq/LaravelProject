<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en-us">

<head>
    <meta charset="utf-8">
    <title>Reader | Hugo Personal Blog Template</title>

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="This is meta description">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Hugo 0.74.3" />

    <!-- plugins -->

    <link rel="stylesheet" href="{{asset('plugins/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/themify-icons/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/slick/slick.css')}}">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}" media="screen">

    <!--Favicon-->
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">

    <meta property="og:title" content="Reader | Hugo Personal Blog Template" />
    <meta property="og:description" content="This is meta description" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="" />
    <meta property="og:updated_time" content="2020-03-15T15:40:24+06:00" />
</head>

<body>
    <!-- navigation -->
    {{-- <div  style="position: absolute; height:100px ;width:250px; bottom: 0px; right:0px;"> --}}


    <header class="navigation fixed-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-white">
                <a class="navbar-brand order-1" href="index.html">
                    <img class="img-fluid" width="100px" src="{{asset('images/logo.png')}}"
                        alt="Reader | Hugo Personal Blog Template">
                </a>
                <div class="collapse navbar-collapse text-center order-lg-2 order-3" id="navigation">
                    <ul class="navbar-nav mx-auto">
                        
                        <li class="nav-item">
                                <a class="nav-link" href="{{route('user.home')}}">Homepage</a>
                            
                            
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                About <i class="ti-angle-down ml-1"></i>
                            </a>
                            <div class="dropdown-menu">

                                <a class="dropdown-item" href="about-me.html">About Me</a>

                                <a class="dropdown-item" href="about-us.html">About Us</a>

                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">Pages <i class="ti-angle-down ml-1"></i>
                            </a>
                            <div class="dropdown-menu">

                                <a class="dropdown-item" href="author.html">Author</a>

                                <a class="dropdown-item" href="author-single.html">Author Single</a>

                                <a class="dropdown-item" href="advertise.html">Advertise</a>

                                <a class="dropdown-item" href="post-details.html">Post Details</a>

                                <a class="dropdown-item" href="post-elements.html">Post Elements</a>

                                <a class="dropdown-item" href="tags.html">Tags</a>

                                <a class="dropdown-item" href="search-result.html">Search Result</a>

                                <a class="dropdown-item" href="search-not-found.html">Search Not Found</a>

                                <a class="dropdown-item" href="privacy-policy.html">Privacy Policy</a>

                                <a class="dropdown-item" href="terms-conditions.html">Terms Conditions</a>

                                <a class="dropdown-item" href="404.html">404 Page</a>

                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('user.profile')}}">edit profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i data-acorn-icon="logout" class="me-2" data-acorn-size="17"></i>
                                <span class="align-middle">Logout</span>
                            </a>
                            <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>

                <div class="order-2 order-lg-3 d-flex align-items-center">
                    <select class="m-2 border-0 bg-transparent" id="select-language">
                        <option id="en" value="" selected>En</option>
                        <option id="fr" value="">Fr</option>
                    </select>

                    <!-- search -->
                    <form class="search-bar">
                        <input id="search-query" name="s" type="search" placeholder="Type &amp; Hit Enter...">
                    </form>

                    <button class="navbar-toggler border-0 order-1" type="button" data-toggle="collapse"
                        data-target="#navigation">
                        <i class="ti-menu"></i>
                    </button>
                </div>

            </nav>

        </div>
    </header>
    @yield('content')
