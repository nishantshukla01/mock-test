<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>@yield('title') - Study with Sandeep Sir</title>
    <link rel="stylesheet" id="tdb_front_style-css" href="{{url('css/mdb.css')}}" type="text/css" media="all">
    <link rel="stylesheet" id="tdb_front_style-css" href="{{url('css/userdashboard.css')}}" type="text/css" media="all">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>

    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <script src='https://code.jquery.com/jquery-3.4.1.min.js'></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        window.console = window.console || function (t) {
        };
    </script>
    <script>
        if (document.location.search.match(/type=embed/gi)) {
            window.parent.postMessage("resize", "*");
        }
    </script>
    <style>
        .nameHeader{
            white-space: nowrap;
            width: 148px;
            overflow: hidden;
            text-overflow: clip;
            ::-webkit-line-clamp: 2;
        }
        .nameHeader span{
            color: #000;
            font-size: 14px;
        }
    </style>
</head>

<body translate="no">
<aside class="side-nav z-depth-1" id="show-side-navigation1">
    <i class="fa fa-bars close-aside hidden-sm hidden-md hidden-lg" data-close="show-side-navigation1"></i>
    <div class="heading">
        <img src="{{url(\Illuminate\Support\Facades\Storage::url(\Illuminate\Support\Facades\Auth::user()->image)?\Illuminate\Support\Facades\Storage::url(\Illuminate\Support\Facades\Auth::user()->image):'img/default-image_600.png')}}"
             alt="">
        <div class="info">
            <h3 class="nameHeader">
                <span >{{isset(\Illuminate\Support\Facades\Auth::user()->name)?\Illuminate\Support\Facades\Auth::user()->name:\Illuminate\Support\Facades\Auth::user()->mobile}} </span>
            </h3>
            <p>{{isset(\Illuminate\Support\Facades\Auth::user()->email)?\Illuminate\Support\Facades\Auth::user()->email:'Not given'}}</p>
        </div>
    </div>


    <ul class="categories">

        <li><i class="fa fa-user fa-fw"></i><a
                    href="{{route('user.dashboard',\Illuminate\Support\Str::slug(isset(\Illuminate\Support\Facades\Auth::user()->name)?\Illuminate\Support\Facades\Auth::user()->name:\Illuminate\Support\Facades\Auth::user()->mobile,'-'))}}">
                Dashboard</a></li>
        <li><i class="fa fa-cog fa-fw"></i><a
                    href="{{route('user.profile',\Illuminate\Support\Str::slug(isset(\Illuminate\Support\Facades\Auth::user()->name)?\Illuminate\Support\Facades\Auth::user()->name:\Illuminate\Support\Facades\Auth::user()->mobile,'-'))}}">
                Profile</a></li>
        <li><i class="fa fa-book fa-fw"></i><a
                    href="{{route('user.package',\Illuminate\Support\Str::slug(isset(\Illuminate\Support\Facades\Auth::user()->name)?\Illuminate\Support\Facades\Auth::user()->name:\Illuminate\Support\Facades\Auth::user()->mobile,'-'))}}">
                Eaxm Purches list</a></li>
        {{--<li><i class="fa fa-book fa-fw"></i><a--}}
        {{--href="{{route('user.profile.old_test',\Illuminate\Support\Str::slug(isset(\Illuminate\Support\Facades\Auth::user()->name)?\Illuminate\Support\Facades\Auth::user()->name:\Illuminate\Support\Facades\Auth::user()->mobile,'-'))}}">Old--}}
        {{--Test</a></li>--}}
        <li><i class="fa fa-external-link  fa-fw"></i><a href="{{route('user.logout')}}"> Log Out</a></li>
    </ul>
</aside>
<section id="contents">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="menutopbar">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <i class="fa fa-align-right"></i>
                    </button>
                    <a class="navbar-brand" href="{{route('index')}}">Study with<span
                                class="main-color ml-2">Sandeep </span>sir</a>
                </div>
                <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav notificationsection">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="" data-toggle="dropdown" role="button" aria-haspopup="true"
                               aria-expanded="false">More <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                {{--<li><a href="#"><i class="fa fa-user-o fw"></i> My account</a></li>--}}
                                {{--<li><a href="#"><i class="fa fa-envelope-o fw"></i> My inbox</a></li>--}}
                                <li><a href="javascript:void(0);"><i class="fa fa-question-circle-o fw"></i> Help</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{route('user.logout')}}"><i class="fa fa-sign-out"></i> Log out</a></li>
                            </ul>
                        </li>

                        {{--<li><a href="#"><i class="fa fa-bell-o"></i><span>98</span></a></li>--}}
                        <li><a href="#"><i data-show="show-side-navigation1" class="fa fa-bars show-side-btn resultNav"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div>
        @yield('content')
    </div>

</section>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>

<script id="rendered-js">
    $(function () {

        'use strict';

        var aside = $('.side-nav'),
            showAsideBtn = $('.show-side-btn'),
            contents = $('#contents'),
            _window = $(window);

        showAsideBtn.on("click", function () {
            $("#" + $(this).data('show')).toggleClass('show-side-nav');
            contents.toggleClass('margin');
        });

        if (_window.width() <= 767) {
            aside.addClass('show-side-nav');
        }

        _window.on('resize', function () {
            if ($(window).width() > 767) {
                aside.removeClass('show-side-nav');
            }
        });

        // dropdown menu in the side nav
        var slideNavDropdown = $('.side-nav-dropdown');

        $('.side-nav .categories li').on('click', function () {

            var $this = $(this);

            $this.toggleClass('opend').siblings().removeClass('opend');

            if ($this.hasClass('opend')) {
                $this.find('.side-nav-dropdown').slideToggle('fast');
                $this.siblings().find('.side-nav-dropdown').slideUp('fast');
            } else {
                $this.find('.side-nav-dropdown').slideUp('fast');
            }
        });

        $('.side-nav .close-aside').on('click', function () {
            $('#' + $(this).data('close')).addClass('show-side-nav');
            contents.removeClass('margin');
        });


        // Start chart
        var chart = document.getElementById('myChart');
        Chart.defaults.global.animation.duration = 2000; // Animation duration
        Chart.defaults.global.title.display = false; // Remove title
        Chart.defaults.global.title.text = "Chart"; // Title
        Chart.defaults.global.title.position = 'bottom'; // Title position
        Chart.defaults.global.defaultFontColor = '#999'; // Font color
        Chart.defaults.global.defaultFontSize = 10; // Font size for every label

        // Chart.defaults.global.tooltips.backgroundColor = '#FFF'; // Tooltips background color
        Chart.defaults.global.tooltips.borderColor = 'white'; // Tooltips border color
        Chart.defaults.global.legend.labels.padding = 0;
        Chart.defaults.scale.ticks.beginAtZero = true;
        Chart.defaults.scale.gridLines.zeroLineColor = 'rgba(255, 255, 255, 0.1)';
        Chart.defaults.scale.gridLines.color = 'rgba(255, 255, 255, 0.02)';
        Chart.defaults.global.legend.display = false;

        var myChart = new Chart(chart, {
            type: 'bar',
            data: {
                labels: ["January", "February", "March", "April", "May", 'Jul'],
                datasets: [{
                    label: "Lost",
                    fill: false,
                    lineTension: 0,
                    data: [45, 25, 40, 20, 45, 20],
                    pointBorderColor: "#4bc0c0",
                    borderColor: '#4bc0c0',
                    borderWidth: 2,
                    showLine: true
                },
                    {
                        label: "Succes",
                        fill: false,
                        lineTension: 0,
                        startAngle: 2,
                        data: [20, 40, 20, 45, 25, 60],
                        // , '#ff6384', '#4bc0c0', '#ffcd56', '#457ba1'
                        backgroundColor: "transparent",
                        pointBorderColor: "#ff6384",
                        borderColor: '#ff6384',
                        borderWidth: 2,
                        showLine: true
                    }
                ]
            }
        });


        //  Chart ( 2 )
        var Chart2 = document.getElementById('myChart2').getContext('2d');
        var chart = new Chart(Chart2, {
            type: 'line',
            data: {
                labels: ["January", "February", "March", "April", 'test', 'test', 'test', 'test'],
                datasets: [{
                    label: "My First dataset",
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 79, 116)',
                    borderWidth: 2,
                    pointBorderColor: false,
                    data: [5, 10, 5, 8, 20, 30, 20, 10],
                    fill: false,
                    lineTension: .4
                },
                    {
                        label: "Month",
                        fill: false,
                        lineTension: .4,
                        startAngle: 2,
                        data: [20, 14, 20, 25, 10, 15, 25, 10],
                        // , '#ff6384', '#4bc0c0', '#ffcd56', '#457ba1'
                        backgroundColor: "transparent",
                        pointBorderColor: "#4bc0c0",
                        borderColor: '#4bc0c0',
                        borderWidth: 2,
                        showLine: true
                    },
                    {
                        label: "Month",
                        fill: false,
                        lineTension: .4,
                        startAngle: 2,
                        data: [40, 20, 5, 10, 30, 15, 15, 10],
                        // , '#ff6384', '#4bc0c0', '#ffcd56', '#457ba1'
                        backgroundColor: "transparent",
                        pointBorderColor: "#ffcd56",
                        borderColor: '#ffcd56',
                        borderWidth: 2,
                        showLine: true
                    }
                ]
            },


            // Configuration options
            options: {
                title: {
                    display: false
                }
            }
        });


        var chart = document.getElementById('chart3');
        var myChart = new Chart(chart, {
            type: 'line',
            data: {
                labels: ["One", "Two", "Three", "Four", "Five", 'Six', "Seven", "Eight"],
                datasets: [{
                    label: "Lost",
                    fill: false,
                    lineTension: .5,
                    pointBorderColor: "transparent",
                    pointColor: "white",
                    borderColor: '#d9534f',
                    borderWidth: 0,
                    showLine: true,
                    data: [0, 40, 10, 30, 10, 20, 15, 20],
                    pointBackgroundColor: 'transparent'
                },
                    {
                        label: "Lost",
                        fill: false,
                        lineTension: .5,
                        pointColor: "white",
                        borderColor: '#5cb85c',
                        borderWidth: 0,
                        showLine: true,
                        data: [40, 0, 20, 10, 25, 15, 30, 0],
                        pointBackgroundColor: 'transparent'
                    },

                    {
                        label: "Lost",
                        fill: false,
                        lineTension: .5,
                        pointColor: "white",
                        borderColor: '#f0ad4e',
                        borderWidth: 0,
                        showLine: true,
                        data: [10, 40, 20, 5, 35, 15, 35, 0],
                        pointBackgroundColor: 'transparent'
                    },

                    {
                        label: "Lost",
                        fill: false,
                        lineTension: .5,
                        pointColor: "white",
                        borderColor: '#337ab7',
                        borderWidth: 0,
                        showLine: true,
                        data: [0, 30, 10, 25, 10, 40, 20, 0],
                        pointBackgroundColor: 'transparent'
                    }
                ]
            }
        });


    });
    //# sourceURL=pen.js
</script>
</body>

</html>
