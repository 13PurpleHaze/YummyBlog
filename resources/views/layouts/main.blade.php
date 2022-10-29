<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Yummy Blog - Food Blog Template</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/img/core-img/favicon.ico') }}">

    <!-- Core Stylesheet -->
    <link href="{{ asset('assets/style.css') }}" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="{{ asset('assets/css/responsive/responsive.css') }}" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body>
<div id="app">
    <!-- Preloader Start -->
    <div id="preloader">
        <div class="yummy-load"></div>
    </div>

    <!-- ****** Top Header Area Start ****** -->
    <div class="top_header_area">
        <div class="container">
            <div class="row">
                <div class="col-5 col-sm-6">
                    <!--  Top Social bar start -->
                    <div class="top_social_bar">
                        @foreach($socials as $social)
                            <a href="{{$social->link}}"><i class="fa fa-{{$social->title}}" aria-hidden="true"></i></a>
                        @endforeach
                    </div>
                </div>
                <!--  Login Register Area -->
                <div class="col-7 col-sm-6">
                    <div class="signup-search-area d-flex align-items-center justify-content-end">
                        <div class="login_register_area d-flex">
                            @guest()
                                <div class="login">
                                    <a href="{{ route('login') }}">Sing in</a>
                                </div>
                                <div class="register">
                                    <a href="{{ route('register') }}">Sing up</a>
                                </div>
                            @endguest
                        </div>
                        @auth()
                            <div class="d-flex justify-content-end align-items-center h-100 p-1" style="width: 40px">
                                <img src="{{ auth()->user()->photo ? asset('storage/' . auth()->user()->photo) : ''}}"
                                     alt="" class="img-fluid h-100" style="border-radius: 50%">
                                <a href="{{ route('personal.main.index') }}" class="ml-2">{{ auth()->user()->name }}</a>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ****** Top Header Area End ****** -->

    <!-- ****** Header Area Start ****** -->
    <header class="header_area">
        <div class="container">
            <div class="row">
                <!-- Logo Area Start -->
                <div class="col-12">
                    <div class="logo_area text-center">
                        <a href="{{ route('main.index') }}" class="yummy-logo">Yummy Blog</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#yummyfood-nav"
                                aria-controls="yummyfood-nav" aria-expanded="false" aria-label="Toggle navigation"><i
                                class="fa fa-bars" aria-hidden="true"></i> Menu
                        </button>
                        <!-- Menu Area Start -->
                        <div class="collapse navbar-collapse justify-content-center" id="yummyfood-nav">
                            <ul class="navbar-nav" id="yummy-nav">
                                <li class="nav-item">
                                    <router-link to="/posts" class="nav-link">Home</router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link :to="{name: 'category.index'}" class="nav-link">Categories</router-link>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('tag.index') }}">Tags</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    {{--@yield('content');--}}
    <router-view></router-view>

    <!-- ****** Footer Menu Area Start ****** -->
    <footer class="footer_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Copywrite Text -->
                    <div class="copy_right_text text-center">
                        <p>Copyright @2018 All rights reserved | This template is made with <i class="fa fa-heart-o"
                                                                                               aria-hidden="true"></i>
                            by <a
                                href="https://colorlib.com" target="_blank">Colorlib</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- ****** Footer Menu Area End ****** -->

    <!-- Jquery-2.2.4 js -->
    <script src="{{ asset('assets/js/jquery/jquery-2.2.4.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('assets/js/bootstrap/popper.min.js') }}"></script>
    <!-- Bootstrap-4 js -->
    <script src="{{ asset('assets/js/bootstrap/bootstrap.min.js') }}"></script>
    <!-- All Plugins JS -->
    <script src="{{ asset('assets/js/others/plugins.js') }}"></script>
    <!-- Active JS -->
    <script src="{{ asset('assets/js/active.js') }}"></script>
</div>
</body>
