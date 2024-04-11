<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') |Admin Study with Sandeep sir</title>
    <link rel="stylesheet" href="{!! asset('backend/plugins/fontawesome-free/css/all.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('backend/css/adminlte.min.css') !!}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link rel="stylesheet" href="{!! asset('backend/plugins/select2/css/select2.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('backend/plugins/summernote/summernote-bs4.css') !!}">
    <!-- jQuery -->
    <script src="{!! asset('backend/plugins/jquery/jquery.min.js') !!}"></script>
    <script src="{!! asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
    <script src="{!! asset('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') !!}"></script>
    <script src="{!! asset('backend/js/adminlte.js') !!}"></script>
    <script src="{!! asset('backend/js/pages/dashboard2.js') !!}"></script>
    <script src="{!! asset('backend/plugins/select2/js/select2.full.min.js') !!}"></script>
    <script src="{!! asset('backend/plugins/summernote/summernote-bs4.min.js') !!}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <style type="text/css">
        @keyframes ldio-261da2114dki {
            0% {
                transform: rotate(0)
            }
            100% {
                transform: rotate(360deg)
            }
        }

        .ldio-261da2114dki div {
            box-sizing: border-box !important
        }

        .ldio-261da2114dki > div {
            position: absolute;
            width: 74.88px;
            height: 74.88px;
            top: 14.56px;
            left: 14.56px;
            border-radius: 50%;
            border: 8.32px solid #000;
            border-color: #0a0a0a transparent #0a0a0a transparent;
            animation: ldio-261da2114dki 1s linear infinite;
        }

        .ldio-261da2114dki > div:nth-child(2), .ldio-261da2114dki > div:nth-child(4) {
            width: 56.160000000000004px;
            height: 56.160000000000004px;
            top: 23.92px;
            left: 23.92px;
            animation: ldio-261da2114dki 1s linear infinite reverse;
        }

        .ldio-261da2114dki > div:nth-child(2) {
            border-color: transparent #28292f transparent #28292f
        }

        .ldio-261da2114dki > div:nth-child(3) {
            border-color: transparent
        }

        .ldio-261da2114dki > div:nth-child(3) div {
            position: absolute;
            width: 100%;
            height: 100%;
            transform: rotate(45deg);
        }

        .ldio-261da2114dki > div:nth-child(3) div:before, .ldio-261da2114dki > div:nth-child(3) div:after {
            content: "";
            display: block;
            position: absolute;
            width: 8.32px;
            height: 8.32px;
            top: -8.32px;
            left: 24.96px;
            background: #0a0a0a;
            border-radius: 50%;
            box-shadow: 0 66.56px 0 0 #0a0a0a;
        }

        .ldio-261da2114dki > div:nth-child(3) div:after {
            left: -8.32px;
            top: 24.96px;
            box-shadow: 66.56px 0 0 0 #0a0a0a;
        }

        .ldio-261da2114dki > div:nth-child(4) {
            border-color: transparent;
        }

        .ldio-261da2114dki > div:nth-child(4) div {
            position: absolute;
            width: 100%;
            height: 100%;
            transform: rotate(45deg);
        }

        .ldio-261da2114dki > div:nth-child(4) div:before, .ldio-261da2114dki > div:nth-child(4) div:after {
            content: "";
            display: block;
            position: absolute;
            width: 8.32px;
            height: 8.32px;
            top: -8.32px;
            left: 15.600000000000001px;
            background: #28292f;
            border-radius: 50%;
            box-shadow: 0 47.84px 0 0 #28292f;
        }

        .ldio-261da2114dki > div:nth-child(4) div:after {
            left: -8.32px;
            top: 15.600000000000001px;
            box-shadow: 47.84px 0 0 0 #28292f;
        }

        .loadingio-spinner-double-ring-dha81j8088 {
            width: 104px;
            height: 104px;
            display: inline-block;
            overflow: hidden;
            background: none;
        }

        .ldio-261da2114dki {
            width: 100%;
            height: 100%;
            position: relative;
            transform: translateZ(0) scale(1);
            backface-visibility: hidden;
            transform-origin: 0 0; /* see note above */
        }

        .ldio-261da2114dki div {
            box-sizing: content-box;
        }

        /* generated by https://loading.io/ */
    </style>

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="index3.html" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-comments"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="{{url('backend/img/user1-128x128.jpg')}}" alt="User Avatar"
                                 class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Brad Diesel
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">Call me whenever you can...</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="{{url('backend/img/user8-128x128.jpg')}}" alt="User Avatar"
                                 class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    John Pierce
                                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">I got your message bro</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="{{url('backend/img/user3-128x128.jpg')}}" alt="User Avatar"
                                 class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Nora Silvester
                                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">The subject goes here</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
                            class="fas fa-th-large"></i></a>
            </li>
        </ul>
    </nav>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="{{url('backend/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Study With Sandeep Sir</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{url('backend/img/user3-128x128.jpg')}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Study with sandeep sir</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview">
                        <a href="javascript:void(0);" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Master
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('category.exam.index')}}" class="nav-link">
                                    <i class="fas fa-list-ul nav-icon"></i>
                                    <p>Exam Category</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('category.subject.index')}}" class="nav-link">
                                    <i class="fas fa-book nav-icon"></i>
                                    <p>Subject</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="javascript:void(0);" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Exams master
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('exam.index')}}" class="nav-link">
                                    <i class="fas fa-graduation-cap nav-icon"></i>
                                    <p>Create Exams</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('exam.question.index')}}" class="nav-link">
                                    <i class="fas fa-question-circle nav-icon"></i>
                                    <p>Exam Questions</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="javascript:void(0);" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Job Alerts
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('jobalerts.index')}}" class="nav-link">
                                    <i class="fas fa-graduation-cap nav-icon"></i>
                                    <p>List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('jobalerts.create')}}" class="nav-link">
                                    <i class="fas fa-question-circle nav-icon"></i>
                                    <p>Create</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="pages/widgets.html" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Widgets
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- Main Footer -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2020 <a href="http://retinodes.com">Retinodes</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            {{--<b>Version</b> 3.0.2--}}
        </div>
    </footer>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });
        let old_active = sessionStorage.getItem("active_link");
        if (!old_active) {
            old_active = 'dashboard';
        }
        $(`.nav-link`).each(function () {
            if ($(this).attr('href') === old_active) {
                $(this).addClass('active');
                $(this).parent().parent().parent().children('a').addClass('active');
                $(this).parent().parent().parent().addClass('menu-open');
            }
        });
        $(`.nav-link`).click(function () {
            let link = $(this).attr('href');
            sessionStorage.setItem("active_link", link);
        });
    });
</script>
</body>
</html>
