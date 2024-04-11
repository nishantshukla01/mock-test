<html lang="en-US" class=" td-md-is-chrome">

<head>
    <script type="text/javascript" id="www-widgetapi-script"
            src="https://s.ytimg.com/yts/jsbin/www-widgetapi-vflYl14TA/www-widgetapi.js" async=""></script>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield ('title') | Study with Sandeep sir</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="pingback" href="https://demo.tagdiv.com/newspaper_romania_news/xmlrpc.php"> -->

    <meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <link rel="canonical" href="">

<!-- <link rel="stylesheet" id="td-plugin-newsletter-css" href="{{url('css/home.css')}}" type="text/css" media="all"> -->
    <link rel="stylesheet" id="td-theme-css" href="{{url('css/home3.css')}}" type="text/css" media="all">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" id="td-legacy-framework-front-style-css" href="{{url('css/bootstrap.css')}}" type="text/css"
          media="all">
    <link rel="stylesheet" id="tdb_front_style-css" href="{{url('css/mdb.css')}}" type="text/css" media="all">
    <link rel="stylesheet" id="tdb_front_style-css" href="{{url('css/additional.css')}}" type="text/css" media="all">
<!-- <link rel="stylesheet" id="tdb_front_style-css" href="{{url('css/registration.css')}}" type="text/css" media="all"> -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Semi+Condensed&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Libre+Franklin&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
<!-- <link rel="stylesheet" id="tdb_front_style-css" href="{{url('css/additional.css')}}" type="text/css" media="all"> -->
    <link rel="stylesheet" id="tdb_front_style-css" href="{{url('css/main.css')}}" type="text/css" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{url('js/popper.min.js')}}"></script>
    <script src="{{url('js/bootstrap.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <style>
        .top-bar {
            background-color: #0d112f;
        }

        .top-menu li {
            display: inline-block;
            font-size: 11px;
        }

        .top-menu li:first-child a {
            padding-left: 0;
        }

        .top-menu a {
            display: block;
            padding: 0 10px;
            line-height: 32px;
            color: #fff;
        }

        .top-menu li:last-child a {
            padding-right: 0;
        }

        .top-menu a {
            display: block;
            padding: 0 10px;
            line-height: 32px;
            color: #fff;
        }

        .socials {
            overflow: hidden;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
        }

        .top-bar .social {
            color: #fff;
        }

        body {
            font-family: 'Poppins', sans-serif !important;
        }

        .socials--nobase a {
            width: 13px;
            height: auto;
            border: 0;
            line-height: 32px;
            margin-right: 28px;
            margin-bottom: 0;
            color: #ffffff;
            background-color: transparent;
            font-size: 12px;
        }

        .top_banner_wrap {
            background-color: #ffffff;
        }

        .header-logo {
            position: relative;
            margin: 15px 20px;
        }

        .header-logo img {
            max-height: 90px;
            margin: auto;
        }

        .header-banner {
            margin: 15px 0px;
        }

        .nav_bar {
            margin: 0 auto;
            max-width: 100%;
            box-shadow: 0 3px 15px rgba(0, 0, 0, .15);
            border-top: 2px solid #ff9800e3;
            border-bottom: 2px solid #ff9800e3;
        }

        .nav_bar::after {
            display: block;
            content: '';
            clear: both;
        }

        .nav_bar ul {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .nav_bar ul li {
            float: left;
            position: relative;
            margin-left: 0px;
        }

        .nav_bar ul li a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 10px 30px;
            /* border-top: 2px solid #ff9800e3; */
            /* border-bottom: 2px solid #ff9800e3; */
            transition: all .3s ease-in-out;
            font-size: 16px;
            font-weight: 400;
            text-transform: capitalize;
        }

        .nav_bar ul li a:hover,
        .nav_bar ul li a:focus {
            background: rgba(0, 0, 0, .15);
        }

        .nav_bar ul li a:focus {
            color: white;
        }

        .nav_bar ul li a:not(:only-child)::after {
            padding-left: 4px;
            content: ' ▾';
        }

        .dropdown_menu {
            display: none;
            position: absolute;
            background: #0d112fe8;
            width: 202px;
            left: -27px;
            z-index: 9;
            text-transform: uppercase;
            box-shadow: 0 4px 10px rgba(10, 20, 30, .4);
            -webkit-animation: dropdown_menu 0.6s ease;
        }

        .drop:hover .dropdown_menu {
            display: block;
        }

        ul.dropdown_menu li a {
            font-size: 13px;
            font-weight: 500;
            padding: 7px 23px;
        }

        .dropdown_menu li {
            width: 100%;
            border-bottom: 1px solid rgba(255, 255, 255, 0.22);
            margin: 0px;
        }

        .sticky {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 999;
            background-color: #0d112f !important;
        }

        .sub_header {
            background: #0d112f;
        }

        .cube-folding {
            width: 50px;
            height: 50px;
            display: inline-block;
            -moz-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
            font-size: 0;
            vertical-align: c;
            vertical-align: center;
            position: absolute;
            top: 50%;
        }

        .cube-folding span {
            position: relative;
            width: 25px;
            height: 25px;
            -moz-transform: scale(1.1);
            -ms-transform: scale(1.1);
            -webkit-transform: scale(1.1);
            transform: scale(1.1);
            display: inline-block;
        }

        .cube-folding span::before {
            content: "";
            background-color: white;
            position: absolute;
            left: 0;
            top: 0;
            display: block;
            width: 25px;
            height: 25px;
            -moz-transform-origin: 100% 100%;
            -ms-transform-origin: 100% 100%;
            -webkit-transform-origin: 100% 100%;
            transform-origin: 100% 100%;
            -moz-animation: folding 2.5s infinite linear both;
            -webkit-animation: folding 2.5s infinite linear both;
            animation: folding 2.5s infinite linear both;
        }

        .cube-folding .leaf2 {
            -moz-transform: rotateZ(90deg) scale(1.1);
            -ms-transform: rotateZ(90deg) scale(1.1);
            -webkit-transform: rotateZ(90deg) scale(1.1);
            transform: rotateZ(90deg) scale(1.1);
        }

        .cube-folding .leaf2::before {
            -moz-animation-delay: 0.3s;
            -webkit-animation-delay: 0.3s;
            animation-delay: 0.3s;
            background-color: #f2f2f2;
        }

        .cube-folding .leaf3 {
            -moz-transform: rotateZ(270deg) scale(1.1);
            -ms-transform: rotateZ(270deg) scale(1.1);
            -webkit-transform: rotateZ(270deg) scale(1.1);
            transform: rotateZ(270deg) scale(1.1);
        }

        .cube-folding .leaf3::before {
            -moz-animation-delay: 0.9s;
            -webkit-animation-delay: 0.9s;
            animation-delay: 0.9s;
            background-color: #f2f2f2;
        }

        .cube-folding .leaf4 {
            -moz-transform: rotateZ(180deg) scale(1.1);
            -ms-transform: rotateZ(180deg) scale(1.1);
            -webkit-transform: rotateZ(180deg) scale(1.1);
            transform: rotateZ(180deg) scale(1.1);
        }

        .cube-folding .leaf4::before {
            -moz-animation-delay: 0.6s;
            -webkit-animation-delay: 0.6s;
            animation-delay: 0.6s;
            background-color: #e6e6e6;
        }

        @-moz-keyframes folding {

            0%,
            10% {
                -moz-transform: perspective(140px) rotateX(-180deg);
                transform: perspective(140px) rotateX(-180deg);
                opacity: 0;
            }

            25%,
            75% {
                -moz-transform: perspective(140px) rotateX(0deg);
                transform: perspective(140px) rotateX(0deg);
                opacity: 1;
            }

            90%,
            100% {
                -moz-transform: perspective(140px) rotateY(180deg);
                transform: perspective(140px) rotateY(180deg);
                opacity: 0;
            }
        }

        @-webkit-keyframes folding {

            0%,
            10% {
                -webkit-transform: perspective(140px) rotateX(-180deg);
                transform: perspective(140px) rotateX(-180deg);
                opacity: 0;
            }

            25%,
            75% {
                -webkit-transform: perspective(140px) rotateX(0deg);
                transform: perspective(140px) rotateX(0deg);
                opacity: 1;
            }

            90%,
            100% {
                -webkit-transform: perspective(140px) rotateY(180deg);
                transform: perspective(140px) rotateY(180deg);
                opacity: 0;
            }
        }

        @keyframes folding {

            0%,
            10% {
                -moz-transform: perspective(140px) rotateX(-180deg);
                -ms-transform: perspective(140px) rotateX(-180deg);
                -webkit-transform: perspective(140px) rotateX(-180deg);
                transform: perspective(140px) rotateX(-180deg);
                opacity: 0;
            }

            25%,
            75% {
                -moz-transform: perspective(140px) rotateX(0deg);
                -ms-transform: perspective(140px) rotateX(0deg);
                -webkit-transform: perspective(140px) rotateX(0deg);
                transform: perspective(140px) rotateX(0deg);
                opacity: 1;
            }

            90%,
            100% {
                -moz-transform: perspective(140px) rotateY(180deg);
                -ms-transform: perspective(140px) rotateY(180deg);
                -webkit-transform: perspective(140px) rotateY(180deg);
                transform: perspective(140px) rotateY(180deg);
                opacity: 0;
            }
        }

        .cube-wrapper {
            position: fixed;
            /* left: 50%; */
            top: 0%;
            /* margin-top: -50px; */
            /* margin-left: -50px; */
            width: 100%;
            height: 100%;
            background-color: #0d112fcc;
            z-index: 9;
            text-align: center;
        }

        .cube-wrapper:after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            bottom: -20px;
            margin: auto;
            width: 90px;
            height: 6px;
            background-color: rgba(0, 0, 0, 0.1);
            -webkit-filter: blur(2px);
            filter: blur(2px);
            -moz-border-radius: 100%;
            -webkit-border-radius: 100%;
            border-radius: 100%;
            z-index: 1;
            -moz-animation: shadow 0.5s ease infinite alternate;
            -webkit-animation: shadow 0.5s ease infinite alternate;
            animation: shadow 0.5s ease infinite alternate;
        }

        .cube-wrapper .loading {
            font-size: 12px;
            letter-spacing: 0.1em;
            display: block;
            color: white;
            position: relative;
            top: 25px;
            z-index: 2;
            -moz-animation: text 0.5s ease infinite alternate;
            -webkit-animation: text 0.5s ease infinite alternate;
            animation: text 0.5s ease infinite alternate;
        }

        @-moz-keyframes text {
            100% {
                top: 35px;
            }
        }

        @-webkit-keyframes text {
            100% {
                top: 35px;
            }
        }

        @keyframes text {
            100% {
                top: 35px;
            }
        }

        @-moz-keyframes shadow {
            100% {
                bottom: -18px;
                width: 100px;
            }
        }

        @-webkit-keyframes shadow {
            100% {
                bottom: -18px;
                width: 100px;
            }
        }

        @keyframes shadow {
            100% {
                bottom: -18px;
                width: 100px;
            }
        }

        .sign_up_button {
            background: linear-gradient(40deg, #0d112f, #12194c) !important;
        }

        .login_signup_footer {
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 4px;
            color: black;
        }

        .wrap-contact100 {
            width: 500px;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            padding: 50px 55px 16px;
            box-shadow: 0 3px 20px 0 rgba(0, 0, 0, .1);
            -moz-box-shadow: 0 3px 20px 0 rgba(0, 0, 0, .1);
            -webkit-box-shadow: 0 3px 20px 0 rgba(0, 0, 0, .1);
            -o-box-shadow: 0 3px 20px 0 rgba(0, 0, 0, .1);
            -ms-box-shadow: 0 3px 20px 0 rgba(0, 0, 0, .1);
        }

        .contact100-form {
            width: 100%;
        }

        .contact100-form-title {
            display: block;
            /* font-family: JosefinSans-Bold; */
            font-size: 30px;
            color: #333;
            line-height: 1.2;
            text-align: left;
            padding-bottom: 30px;
        }

        .validate-input {
            position: relative;
        }

        .wrap-input100 {
            width: 100%;
            position: relative;
            background-color: #fff;
            border: 1px solid #e6e6e6;
            margin-bottom: 17px;
        }

        .input100 {
            display: block;
            width: 100%;
            background: 0 0;
            /* font-family: JosefinSans-Bold; */
            font-size: 15px;
            color: #1b3815;
            line-height: 1.2;
        }

        .input100 {
            display: block;
            width: 100%;
            background: 0 0;
            /* font-family: JosefinSans-Bold; */
            font-size: 15px;
            color: #1b3815;
            line-height: 1.2;
        }

        .focus-input100-1,
        .focus-input100-2 {
            display: block;
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
        }

        .focus-input100-1,
        .focus-input100-2 {
            display: block;
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
        }

        .validate-input {
            position: relative;
        }

        .wrap-input100 {
            width: 100%;
            position: relative;
            background-color: #fff;
            border: 1px solid #e6e6e6;
            margin-bottom: 17px;
        }

        .btn-ins {
            color: #fff;
            background-color: #2e5e86 !important;
        }

        .about_banner {
            background-image: url(http://corpthemes.com/html/coaching/images/parallax/bg1.jpg);
            padding: 82px 67px;
        }

        .aboutus {
            font-size: 44px;
            font-weight: 600;
            color: white;
        }

        .w-30-l {
            width: 30%;
        }

        .center {
            margin-right: auto;
            margin-left: auto;
        }

        .mt4 {
            margin-top: var(--spacing-large);
        }

        .pb2 {
            padding-bottom: var(--spacing-small);
        }

        .w2-5 {
            width: 3rem;
        }

        .h2-5 {
            height: 3rem;
        }

        .f5 {
            font-size: 1rem;
        }

        .tc {
            text-align: center;
        }

        .mv2 {
            margin-top: var(--spacing-small);
            margin-bottom: var(--spacing-small);
        }

        .ph3 {
            padding-left: var(--spacing-medium);
            padding-right: var(--spacing-medium);
        }

        .f6 {
            font-size: .875rem;
        }

        .tc {
            text-align: center;
        }

        .h2 {
            height: 2rem;
        }

        @keyframes dropdown_menu {
            0% {
                top: 0%;
            }

            100% {
                top: 100%;;
            }
        }

        #otpNo {
            display: none;
        }

        .dropbtn_top {
            background-color: #4CAF50;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        .dropdown_menu_top {
            position: relative;
            display: inline-block;
        }

        .dropdown-content_menu {
            display: none;
            position: absolute;
            background-color: rgba(13, 17, 47, 0.85);
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content_menu a {
            /* color: black; */
            padding: 2px 16px;
            text-decoration: none;
            display: block;
            font-weight: 600;
            color: white;
            border-bottom: 1px solid #cccccc61;
        }

        .dropdown-content_menu a:hover {
            background-color: rgba(255, 152, 0, 0.73);
        }

        .dropdown_menu_top:hover .dropdown-content_menu {
            display: block;
        }

        .inputSt {
            margin-left: 35px !important;
        }

        .iconPre {
            top: 15px !important;
            font-size: 24px !important;
            left: 10px !important;
        }

    </style>

</head>

<body>
<header>
    <div class="top_nav">
        <div class="top-bar d-none d-lg-block">
            <div class="container">
                <div class="row">

                    <!-- Top menu -->
                    <div class="col-lg-6">
                        <ul class="top-menu mb-0">
                            <li><a href="#">contact | +91 000000000</a></li>
                            @if(\Illuminate\Support\Facades\Auth::check())
                                <li class="dropdown_menu_top">
                                    <a class="dropbtn_menu_top"
                                       href="javascript:void(0);">{{\Illuminate\Support\Facades\Auth::user()->name?\Illuminate\Support\Facades\Auth::user()->name:\Illuminate\Support\Facades\Auth::user()->mobile}}
                                    </a>
                                    <div class="dropdown-content_menu">
                                        <a href="{{route('user.dashboard',\Illuminate\Support\Str::slug(isset(\Illuminate\Support\Facades\Auth::user()->name)?\Illuminate\Support\Facades\Auth::user()->name:\Illuminate\Support\Facades\Auth::user()->mobile, '-'))}}">My
                                            Profile</a>
                                        <a href="{{route('user.logout')}}">Log out</a>
                                        <!-- <a href="#">Link 3</a> -->
                                    </div>
                                </li>
                            @else
                                <li><a href="javascript:void(0);" data-toggle="modal" data-target="#loginform">Sign
                                        In</a></li>
                        @endif
                        <!-- <li><a href="#">Contact</a></li> -->
                        </ul>
                    </div>

                    <!-- Socials -->
                    <div class="col-lg-6">
                        <div class="socials nav__socials socials--nobase socials--white justify-content-end">
                            <a class="fa fa-facebook" href="#" target="_blank" aria-label="facebook">
                                <i class="ui-facebook"></i>
                            </a>
                            <a class="fa fa-twitter" href="#" target="_blank" aria-label="twitter">
                                <i class="ui-twitter"></i>
                            </a>
                            <a class="fa fa-google-plus" href="#" target="_blank" aria-label="google">
                                <i class="ui-google"></i>
                            </a>
                            <a class="fa fa-youtube" href="#" target="_blank" aria-label="youtube">
                                <i class="ui-youtube"></i>
                            </a>
                            <a class="fa fa-instagram" href="#" target="_blank" aria-label="instagram">
                                <i class="ui-instagram"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="top_banner_wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-4 col-sm-4">
                    <div class="header-logo">
                        <!-- logo -->
                        <a href="{{url('/')}}">
                            <img class="td-retina-data img-responsive" src="{{url('img/logo.png')}}"
                                 alt="Study With Sandeep Sir"/>
                        </a>
                    </div>
                </div>
                <div class="col-xs-8 col-md-8 col-sm-8 hidden-xs">
                    <div class="header-banner">
                        <a href="#"><img class="td-retina img-responsive"
                                         src="https://tpc.googlesyndication.com/simgad/2181481925112392305" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sub_header" id="myHeader">

        <nav class="nav_bar">
            <div class="container-fluid">

                <ul style="margin:0px auto;width:78%">
                    <li><a href="{{url('/')}}">Home</a>
                    <li><a href="{{url('about')}}">About</a>

                    <li>
                        {{--@if(\Illuminate\Support\Facades\Auth::user()->name==null)--}}
                        {{--<a class="text-light user_modal" href="javascript:void(0);">Paid test</a>--}}
                        {{--@else--}}
                        <a class="text-light" href="{{route('client.mocktest.index')}}">Paid test</a>

                        {{--@endif--}}
                        {{--<ul class="dropdown_menu">--}}
                        {{--<li><a href="{{url('mocktest')}}">Exam wise</a></li>--}}
                        {{--<li><a href="{{url('mocktest')}}">Yearly Package</a></li>--}}

                        {{--</ul>--}}
                    </li>
                    <li class="drop">
                        <a href="{{url('courses')}}">Course</a>
                    </li>
                    <li><a href="{{url('youtube')}}">Youtube</a>
                    </li>
                    <li><a href="{{url('successstory')}}">Success Story</a>
                    </li>
                    <li><a href="{{route('client.jobalert.index')}}">Job alert</a>
                    </li>
                    <li><a href="{{url('contact')}}">Contact</a>
                    </li>
                </ul>

            </div>
        </nav>
    </div>
</header>
<div class="cube-wrapper">
    <div class="cube-folding">
        <span class="leaf1"></span>
        <span class="leaf2"></span>
        <span class="leaf3"></span>
        <span class="leaf4"></span>
    </div>
    <!-- <span class="loading" data-name="Loading">Loading</span> -->
</div>

<!-- <script src="{{url('js/jquery-3.2.1.min.js')}}"></script> -->
<!-- <link rel="stylesheet" id="td-theme-css" href="" type="text/css" media="all"> -->
<script src="{{url('js/mdb.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        // debugger;
        $(".cube-wrapper").fadeOut(1000);
    });
    window.onscroll = function () {
        myFunction()
    };

    var header = document.getElementById("myHeader");
    var sticky = header.offsetTop;

    function myFunction() {

        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }
</script>
<!--Modal: Login / Register Form-->
<div class="modal fade" id="loginform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal modal-sm" role="document">
        <!--Content-->
        <div class="modal-content">

            <!--Modal cascading tabs-->
            <div class="modal-c-tabs">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs md-tabs tabs-2 sign_up_button py-1" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i
                                    class="fa fa-user mr-1"></i>
                            Login</a>
                    </li>

                </ul>

                <!-- Tab panels -->
                <div class="tab-content">
                    <!--Panel 7-->
                    <div class="tab-pane fade in show active" id="panel7" role="tabpanel">

                        <!--Body-->
                        <div class="modal-body mb-1">
                            <div class="row" id="mobileNo">
                                <div class="md-form my-0">
                                    <i class="fa fa-phone prefix iconPre"></i>
                                    <input type="text" id="mobile" class="form-control inputSt mb-1 validate">
                                    <label data-error="wrong" data-success="right"
                                           for="mobile">Mobile Number</label>
                                </div>
                                <div class="md-form w-100 text-center my-1">
                                    <button type="button" data-show="otpNo"
                                            class="btn btn-warning btn-sm otpSend w-75 mt-3 mb-0">Send OTP
                                    </button>
                                </div>
                            </div>
                            <div class="row" id="otpNo">
                                <div class="md-form my-0">
                                    <i class="fa fa-phone prefix iconPre"></i>
                                    <input type="text" id="otp" class="form-control inputSt mb-1  validate">
                                    <label data-error="wrong" data-success="right"
                                           for="otp">OTP</label>
                                </div>
                                <span id="otp_span"></span>
                                <div class="md-form w-100 text-center my-1">
                                    <button type="button" data-show="mobileNo"
                                            class=" btn btn-warning btn-sm  w-75 mt-3 mb-0 verifyOTP">Verify
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <!--/.Content-->
</div>
<!--Modal: Login / Register Form-->
<div class="modal fade" id="user_info" tabindex="-1" role="dialog" aria-labelledby="user_label" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <!--Content-->
        <div class="modal-content">

            <!--Modal cascading tabs-->
            <div class="modal-c-tabs">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs md-tabs tabs-2 sign_up_button" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#userModalTab" role="tab">Insert your
                            information below</a>
                    </li>

                </ul>

                <!-- Tab panels -->
                <div class="tab-content pt-2">
                    <!--Panel 7-->
                    <div class="tab-pane fade in show active" id="userModalTab" role="tabpanel">

                        <!--Body-->
                        <div class="modal-body mb-1">
                            <div class="row" id="">
                                <div class="md-form form-sm my-0 col-sm-12">
                                    <i class="fa fa-user prefix"></i>
                                    <input type="text" id="name" class="form-control  form-control-sm validate">
                                    <label data-error="wrong" data-success="right" style="margin-left: 48px"
                                           for="name">* Name</label>
                                </div>
                                <div class="md-form form-sm my-0 col-sm-12">
                                    <i class="fa fa-envelope-o prefix"></i>
                                    <input type="email" id="email" class=" form-control form-control-sm validate"/>
                                    <label data-error="wrong" data-success="right" style="margin-left: 48px"
                                           for="email">* Email</label>
                                </div>
                            </div>
                            <div class="md-form form-sm my-0 text-center col-sm-12">
                                <button type="button"
                                        class="w-50 btn btn-warning btn-sm userDetail">Save
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
<!--/.Content-->
</div>

<section id="main_section">
    @yield('content')
</section>
<!-- Footer -->
<footer class="page-footer font-small footer-color pt-4">

    <!-- Footer Elements -->
    <div class="container">

        <!-- Social buttons -->
        <ul class="list-unstyled list-inline text-center">
            <li class="list-inline-item">
                <a class="btn-floating btn-fb mx-1">
                    <i class="fa fa-facebook-f"> </i>
                </a>
            </li>
            <li class="list-inline-item">
                <a class="btn-floating btn-tw mx-1">
                    <i class="fa fa-twitter"> </i>
                </a>
            </li>
            <li class="list-inline-item">
                <a class="btn-floating btn-gplus mx-1">
                    <i class="fa fa-google-plus"> </i>
                </a>
            </li>
            <li class="list-inline-item">
                <a class="btn-floating btn-li mx-1">
                    <i class="fa fa-telegram"> </i>
                </a>
            </li>
            <li class="list-inline-item">
                <a class="btn-floating btn-ins mx-1">
                    <i class="fa fa-instagram"></i>
                </a>
            </li>
        </ul>
        <!-- Social buttons -->

    </div>
    <!-- Footer Elements -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
        <a href="#"> studywithsandeepsir.com</a>
    </div>
    <!-- Copyright -->

</footer>
<script type="text/javascript">
    $(document).ready(function () {
        $(`.otpSend`).click(function () {
            let show = $(this).data('show');
            let mobile = $(`#mobile`).val();
            if (mobile.length === 10) {
                $.ajax({
                    url: '{{route('send.otp')}}',
                    type: 'post',
                    data: {mobile},
                    beforeSend: function () {
                        $(this).attr('disabled', true);
                    },
                    success: function (response) {
                        $(this).attr('disabled', false);
                        if (response.success === true) {
                            $(`#mobileNo`).css('display', 'none');
                            $(`#otp_span`).text(response.data);
                            $(`#${show}`).css('display', 'block');
                            console.log(response);
                        } else {
                            console.log(response);
                            $.alert({
                                icon: 'fa fa-warning',
                                title: 'Alert!',
                                content: 'Simple alert!',
                                type: 'red'
                            });
                        }
                    }
                });

            } else {
                $.alert('Not a valid mobile number')
            }
        });
        $(`.verifyOTP`).click(function () {
            verify(this);
        });
        $(`.userDetail`).click(function () {
            saveUser(this);
        });
        $(`.user_modal`).click(function () {
            $(`#user_info`).modal({backdrop: 'static'});
        });
    });

    function verify(dis) {
        let mobile = $(`#mobile`).val(),
            otp = $(`#otp`).val();
        $.ajax({
            url: '{{route('otp.verify')}}',
            type: 'post',
            data: {mobile, otp},
            beforeSend: function () {
                $(dis).attr('disabled', true);
            },
            success: function (response) {
                $(dis).attr('disabled', false);
                if (response.success === true) {

                    if (response.data === 0) {
                        $(`#loginform`).modal('hide');
                        $(`#user_info`).modal({backdrop: "static"});
                    } else {
                        window.location.href = '{{route('index')}}'
                    }
                } else {
                    console.log(response);
                    $.alert({
                        icon: 'fa fa-warning',
                        title: 'Alert!',
                        content: 'Simple alert!',
                        type: 'red'
                    });
                }
            }
        });
    }

    function saveUser(dis) {
        let name = $(`#name`).val(),
            email = $(`#email`).val(),
            validation = true;
        if (!name) {
            validation = false;
        } else if (!email) {
            validation = false;
        }
        if (validation) {
            $.ajax({
                url: '{{route('user.detail')}}',
                type: 'post',
                data: {name, email},
                beforeSend: function () {
                    $(dis).attr('disabled', true);
                },
                success: function (response) {
                    $(dis).attr('disabled', false);
                    if (response.success === true) {
                        window.location.href = '{{route('index')}}';
                    } else {
                        console.log(response);
                        $.alert({
                            icon: 'fa fa-warning',
                            title: 'Alert!',
                            content: 'Simple alert!',
                            type: 'red'
                        });
                    }
                }
            });
        } else {
            alert('All field required')
        }
    }
</script>
</body>

</html>
