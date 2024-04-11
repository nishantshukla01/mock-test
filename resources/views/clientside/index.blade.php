@extends('clientside.Master.main')
@section('title','')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2 mt-5">
                <div class="advertisement_section">
                    <img src="https://i.pinimg.com/originals/8f/83/8e/8f838e1f0a04a214ed3efdea1805e8c7.jpg"
                         alt="adevertisement"/>

                </div>
                <div class="z-depth-1 mt-3">
                    <div class="headeing_section_side_bar">
                        <h4 class="text-light">Job Alert</h4>
                    </div>
                    <div class="job_alert_submenu">
                        <ul>
                            @if(count($jobs)>0)
                                @foreach($jobs as $index => $list)
                                    <li>
                                        <a href="{{route('client.jobalert.details',['slug'=>$list->slug])}}">
                                            <div class="job_alert_noti">
                                                <img src="https://static.oliveboard.in/wp-content/uploads/2019/04/sbi-po-crash-course.png"/>
                                            </div>
                                            <div class="job_alert_noti_content">
                                                {{$list->job_title}}
                                            </div>

                                        </a>
                                    </li>
                                @endforeach
                            @endif
                            {{--<li>--}}
                                {{--<a href="#">--}}
                                    {{--<div class="job_alert_noti">--}}
                                        {{--<img src="https://static.oliveboard.in/wp-content/uploads/2019/04/sbi-po-crash-course.png"/>--}}
                                    {{--</div>--}}
                                    {{--<div class="job_alert_noti_content">--}}
                                        {{--IBPS PO 2020(3)--}}
                                    {{--</div>--}}

                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="#">--}}
                                    {{--<div class="job_alert_noti">--}}
                                        {{--<img src="https://static.oliveboard.in/wp-content/uploads/2019/04/sbi-po-crash-course.png"/>--}}
                                    {{--</div>--}}
                                    {{--<div class="job_alert_noti_content">--}}
                                        {{--IBPS PO 2020(3)--}}
                                    {{--</div>--}}

                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="#">--}}
                                    {{--<div class="job_alert_noti">--}}
                                        {{--<img src="https://static.oliveboard.in/wp-content/uploads/2019/04/sbi-po-crash-course.png"/>--}}
                                    {{--</div>--}}
                                    {{--<div class="job_alert_noti_content">--}}
                                        {{--IBPS PO 2020(3)--}}
                                    {{--</div>--}}

                                {{--</a>--}}
                            {{--</li>--}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="post_content_Section">
                    <section class="my-5">
                        <div class="row main_box_content-section mx-0">


                            <div class="col-lg-5 col-xl-5 px-0">

                                <!-- Featured image -->
                                <div class="view overlay   mb-lg-0 post_main_img">
                                    <img class="img-fluid"
                                         src="https://img.freepik.com/free-photo/smiling-students-with-backpacks_1098-1220.jpg?size=626&ext=jpg"
                                         alt="Sample image">
                                    <a>
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>

                            </div>

                            <div class="col-lg-7 col-xl-7">
                                <div class="post_main_pages">
                                    <!-- Post title -->
                                    <h3 class="font-weight-bold mb-3 title_post">SBIPO 2020 EXAM <span
                                                class="calender_recent_post"><i class="fa fa-calendar mr-3"
                                                                                aria-hidden="true"></i>08 Nov, 2019</span>
                                    </h3>

                                    <!-- Excerpt -->
                                    <p class="paraghaph_post">Nam libero tempore, cum soluta nobis est eligendi optio
                                        cumque nihil impedit
                                        quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est,
                                        omnis dolor repellendus
                                    </p>

                                    <!-- Post data -->
                                    <!-- <p>by <a class="font-weight-bold">Jessica Clark</a>, 19/04/2018</p> -->
                                    <!-- Read more button -->
                                    <!-- <a class="btn mainbutton btn-sm btn_red">Read more</a> -->
                                </div>
                            </div>


                        </div>
                        <div class="row main_box_content-section mx-0">


                            <div class="col-lg-5 col-xl-5 px-0">

                                <!-- Featured image -->
                                <div class="view overlay   mb-lg-0 post_main_img">
                                    <img class="img-fluid"
                                         src="https://img.freepik.com/free-photo/smiling-students-with-backpacks_1098-1220.jpg?size=626&ext=jpg"
                                         alt="Sample image">
                                    <a>
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>

                            </div>

                            <div class="col-lg-7 col-xl-7">
                                <div class="post_main_pages">
                                    <!-- Post title -->
                                    <h3 class="font-weight-bold mb-3 title_post">SBIPO 2020 EXAM <span
                                                class="calender_recent_post"><i class="fa fa-calendar mr-3"
                                                                                aria-hidden="true"></i>08 Nov, 2019</span>
                                    </h3>

                                    <!-- Excerpt -->
                                    <p class="paraghaph_post">Nam libero tempore, cum soluta nobis est eligendi optio
                                        cumque nihil impedit
                                        quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est,
                                        omnis dolor repellendus
                                    </p>

                                    <!-- Post data -->
                                    <!-- <p>by <a class="font-weight-bold">Jessica Clark</a>, 19/04/2018</p> -->
                                    <!-- Read more button -->
                                    <!-- <a class="btn mainbutton btn-sm btn_red">Read more</a> -->
                                </div>
                            </div>


                        </div>
                        <div class="row main_box_content-section mx-0">


                            <div class="col-lg-5 col-xl-5 px-0">

                                <!-- Featured image -->
                                <div class="view overlay   mb-lg-0 post_main_img">
                                    <img class="img-fluid"
                                         src="https://img.freepik.com/free-photo/smiling-students-with-backpacks_1098-1220.jpg?size=626&ext=jpg"
                                         alt="Sample image">
                                    <a>
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>

                            </div>

                            <div class="col-lg-7 col-xl-7">
                                <div class="post_main_pages">
                                    <!-- Post title -->
                                    <h3 class="font-weight-bold mb-3 title_post">SBIPO 2020 EXAM <span
                                                class="calender_recent_post"><i class="fa fa-calendar mr-3"
                                                                                aria-hidden="true"></i>08 Nov, 2019</span>
                                    </h3>

                                    <!-- Excerpt -->
                                    <p class="paraghaph_post">Nam libero tempore, cum soluta nobis est eligendi optio
                                        cumque nihil impedit
                                        quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est,
                                        omnis dolor repellendus
                                    </p>

                                    <!-- Post data -->
                                    <!-- <p>by <a class="font-weight-bold">Jessica Clark</a>, 19/04/2018</p> -->
                                    <!-- Read more button -->
                                    <!-- <a class="btn mainbutton btn-sm btn_red">Read more</a> -->
                                </div>
                            </div>


                        </div>
                        <div class="row main_box_content-section mx-0">


                            <div class="col-lg-5 col-xl-5 px-0">

                                <!-- Featured image -->
                                <div class="view overlay   mb-lg-0 post_main_img">
                                    <img class="img-fluid"
                                         src="https://img.freepik.com/free-photo/smiling-students-with-backpacks_1098-1220.jpg?size=626&ext=jpg"
                                         alt="Sample image">
                                    <a>
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>

                            </div>

                            <div class="col-lg-7 col-xl-7">
                                <div class="post_main_pages">
                                    <!-- Post title -->
                                    <h3 class="font-weight-bold mb-3 title_post">SBIPO 2020 EXAM <span
                                                class="calender_recent_post"><i class="fa fa-calendar mr-3"
                                                                                aria-hidden="true"></i>08 Nov, 2019</span>
                                    </h3>

                                    <!-- Excerpt -->
                                    <p class="paraghaph_post">Nam libero tempore, cum soluta nobis est eligendi optio
                                        cumque nihil impedit
                                        quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est,
                                        omnis dolor repellendus
                                    </p>

                                    <!-- Post data -->
                                    <!-- <p>by <a class="font-weight-bold">Jessica Clark</a>, 19/04/2018</p> -->
                                    <!-- Read more button -->
                                    <!-- <a class="btn mainbutton btn-sm btn_red">Read more</a> -->
                                </div>
                            </div>


                        </div>
                        <div class="row main_box_content-section mx-0">


                            <div class="col-lg-5 col-xl-5 px-0">

                                <!-- Featured image -->
                                <div class="view overlay   mb-lg-0 post_main_img">
                                    <img class="img-fluid"
                                         src="https://img.freepik.com/free-photo/smiling-students-with-backpacks_1098-1220.jpg?size=626&ext=jpg"
                                         alt="Sample image">
                                    <a>
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>

                            </div>

                            <div class="col-lg-7 col-xl-7">
                                <div class="post_main_pages">
                                    <!-- Post title -->
                                    <h3 class="font-weight-bold mb-3 title_post">SBIPO 2020 EXAM <span
                                                class="calender_recent_post"><i class="fa fa-calendar mr-3"
                                                                                aria-hidden="true"></i>08 Nov, 2019</span>
                                    </h3>

                                    <!-- Excerpt -->
                                    <p class="paraghaph_post">Nam libero tempore, cum soluta nobis est eligendi optio
                                        cumque nihil impedit
                                        quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est,
                                        omnis dolor repellendus
                                    </p>

                                    <!-- Post data -->
                                    <!-- <p>by <a class="font-weight-bold">Jessica Clark</a>, 19/04/2018</p> -->
                                    <!-- Read more button -->
                                    <!-- <a class="btn mainbutton btn-sm btn_red">Read more</a> -->
                                </div>
                            </div>


                        </div>
                    </section>
                </div>
                <!-- Section: Blog v.3 -->
            </div>
            <div class="col-sm-3 mt-5">
                <div class="heading_section">
                    <div class="headeing_section_side_bar">
                        <h4 class="text-light">Mock Test</h4>
                    </div>
                    <div class="submenu">
                        <ul class="scroll_mocktest">
                            @if(count($mockTest)>0)
                                @foreach($mockTest as $index =>$list)
                                    <li>
                                        <a @if(\Illuminate\Support\Facades\Auth::check()) href="{{route('client.mocktest.attempt',['slug'=>$list->slug])}}"
                                           @else href="javascript:void(0);" data-toggle="modal"
                                           data-target="#loginform" @endif>
                                            <div class="main_mock_test_secion_alert">
                                                <div class="mock_test_top">

                                                <span class="text-danger">Marks :<span
                                                            class="text-dark"> {{$list->total_mark}}</span></span>
                                                    <span class="float-right text-danger">Time :<span
                                                                class="text-dark"> {{$list->total_time}}
                                                            hr</span></span>
                                                </div>
                                                <div class="mock_test_bottom">
                                                    {{$list->exam_name}}
                                                </div>

                                            </div>

                                        </a>
                                    </li>
                                @endforeach
                            @else
                            @endif

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-100">
            <div class="section-title">
                <h2>Live <span>Classes</span></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <div class="row mb-5">
                <div class="col-sm-3">
                    <div class="main_video_section">
                        <div class="embed-responsive video_section embed-responsive-21by9">
                            <iframe class="w-100" src="https://www.youtube.com/embed/l127wt2c_Sc" frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                        </div>
                        <div class="title_section">
                            <p>
                                RRB NTPC Maha Pack (Video Courses, Live Classes, Test Series, eBooks)

                            </p>
                            <div class="">
                                <div class="row">
                                    <div class="col-sm-6 ">
                                    <span class="author">
                                        <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80"
                                             alt="image"><a href="#">O. White</a></span></div>
                                    <div class="col-sm-6">
                                        <span class="calender"><i class="fa fa-calendar mr-3" aria-hidden="true"></i>08 Nov, 2019</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-sm-3">
                    <div class="main_video_section">
                        <div class="embed-responsive video_section embed-responsive-21by9">
                            <iframe class="w-100" src="https://www.youtube.com/embed/AhXmIBdVup" frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                        </div>
                        <div class="title_section">
                            <p>
                                SSC (CGL/CHSL) || 2500 Ques. of History

                            </p>
                            <div class="row">
                                <div class="col-sm-6 ">
                                <span class="author">
                                    <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80"
                                         alt="image"><a href="#">O. White</a></span></div>
                                <div class="col-sm-6">
                                    <span class="calender"><i class="fa fa-calendar mr-3" aria-hidden="true"></i>08 Nov, 2019</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-sm-3">
                    <div class="main_video_section">
                        <div class="embed-responsive video_section embed-responsive-21by9">
                            <iframe class="w-100" src="https://www.youtube.com/embed/iD6iQuo2SFA" frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                        </div>
                        <div class="title_section">
                            <p>
                                Country, Capital & Currency GK Tricks

                            </p>
                            <div class="row">
                                <div class="col-sm-6 ">
                                <span class="author">
                                    <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80"
                                         alt="image"><a href="#">O. White</a></span></div>
                                <div class="col-sm-6">
                                    <span class="calender"><i class="fa fa-calendar mr-3" aria-hidden="true"></i>08 Nov, 2019</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-sm-3">
                    <div class="main_video_section">
                        <div class="embed-responsive video_section embed-responsive-21by9">
                            <iframe class="w-100" src="https://youtu.be/EX5XD9y7sBc" frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                        </div>
                        <div class="title_section">
                            <p>
                                MOCK TEST19 || SSC (CGL/CHSL) || 2500 Ques. of History

                            </p>
                            <div class="row">
                                <div class="col-sm-6 ">
                                <span class="author">
                                    <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80"
                                         alt="image"><a href="#">O. White</a></span></div>
                                <div class="col-sm-6">
                                    <span class="calender"><i class="fa fa-calendar mr-3" aria-hidden="true"></i>08 Nov, 2019</span>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <div class="mt-100">
            <div class="section-title">
                <h2>Paid <span>Test</span></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <div class="container-fluid">
                <div class="row mb-5">
                    <div class="product_block ml-3">
                        <a class="flex pointer flex-shrink-0 flex-column ba br2 b--very-light-gray
                    mr3 free-mock-card ph2 pv3 link start">
                            <div class="image_circle">
                                <img class="w2-5 h2-5 center lazyloaded"
                                     src="https://grdp.co/cdn-cgi/image/width=64,height=64,quality=80/https://gs-post-images.grdp.co/2016/8/img1470917301523-57-rs.png">
                            </div>

                            <p class="font_paraghaph">SSC CGL Tier I Free Mock </p>
                            <span class="free_text">free mock</span>
                            <ul class="list_inner">
                                <li class=" flex gray"><span class="mr-2">•</span><span>Questions</span><span
                                            class="ml-auto fw7">100</span></li>
                                <li class="flex gray f7"><span class="mr-2">•</span><span>Time (mins)</span><span
                                            class="ml-auto fw7">60</span></li>
                                <li class="flex gray f7"><span class="mr-2">•</span><span>Maximum Marks</span><span
                                            class="ml-auto fw7">200</span></li>
                            </ul>
                        </a><a href="http://127.0.0.1:8000/package" type="button" class="btn attempt-button py-1 m-0">attempt
                            now</a>

                    </div>
                    <div class="product_block">
                        <a class="flex pointer flex-shrink-0 flex-column ba br2 b--very-light-gray
                    mr3 free-mock-card ph2 pv3 link start">
                            <div class="image_circle">
                                <img class="w2-5 h2-5 center lazyloaded"
                                     src="https://grdp.co/cdn-cgi/image/width=64,height=64,quality=80/https://gs-post-images.grdp.co/2016/8/img1470917301523-57-rs.png">
                            </div>

                            <p class="font_paraghaph">SSC CGL Tier I Free Mock </p>
                            <span class="free_text">free mock</span>
                            <ul class="list_inner">
                                <li class=" flex gray"><span class="mr-2">•</span><span>Questions</span><span
                                            class="ml-auto fw7">100</span></li>
                                <li class="flex gray f7"><span class="mr-2">•</span><span>Time (mins)</span><span
                                            class="ml-auto fw7">60</span></li>
                                <li class="flex gray f7"><span class="mr-2">•</span><span>Maximum Marks</span><span
                                            class="ml-auto fw7">200</span></li>
                            </ul>
                        </a><a href="{{url('package')}}" type="button" class="btn attempt-button py-1 m-0">attempt
                            now</a>

                    </div>
                    <div class="product_block">
                        <a class="flex pointer flex-shrink-0 flex-column ba br2 b--very-light-gray
                    mr3 free-mock-card ph2 pv3 link start">
                            <div class="image_circle">
                                <img class="w2-5 h2-5 center lazyloaded"
                                     src="https://grdp.co/cdn-cgi/image/width=64,height=64,quality=80/https://gs-post-images.grdp.co/2016/8/img1470917301523-57-rs.png">
                            </div>

                            <p class="font_paraghaph">SSC CGL Tier I Free Mock </p>
                            <span class="free_text">free mock</span>
                            <ul class="list_inner">
                                <li class=" flex gray"><span class="mr-2">•</span><span>Questions</span><span
                                            class="ml-auto fw7">100</span></li>
                                <li class="flex gray f7"><span class="mr-2">•</span><span>Time (mins)</span><span
                                            class="ml-auto fw7">60</span></li>
                                <li class="flex gray f7"><span class="mr-2">•</span><span>Maximum Marks</span><span
                                            class="ml-auto fw7">200</span></li>
                            </ul>
                        </a><a href="{{url('package')}}" type="button" class="btn attempt-button py-1 m-0">attempt
                            now</a>

                    </div>
                    <div class="product_block">
                        <a class="flex pointer flex-shrink-0 flex-column ba br2 b--very-light-gray
                    mr3 free-mock-card ph2 pv3 link start">
                            <div class="image_circle">
                                <img class="w2-5 h2-5 center lazyloaded"
                                     src="https://grdp.co/cdn-cgi/image/width=64,height=64,quality=80/https://gs-post-images.grdp.co/2016/8/img1470917301523-57-rs.png">
                            </div>

                            <p class="font_paraghaph">SSC CGL Tier I Free Mock </p>
                            <span class="free_text">free mock</span>
                            <ul class="list_inner">
                                <li class=" flex gray"><span class="mr-2">•</span><span>Questions</span><span
                                            class="ml-auto fw7">100</span></li>
                                <li class="flex gray f7"><span class="mr-2">•</span><span>Time (mins)</span><span
                                            class="ml-auto fw7">60</span></li>
                                <li class="flex gray f7"><span class="mr-2">•</span><span>Maximum Marks</span><span
                                            class="ml-auto fw7">200</span></li>
                            </ul>
                        </a><a href="{{url('package')}}" type="button" class="btn attempt-button py-1 m-0">attempt
                            now</a>

                    </div>
                    <div class="product_block mr-0">
                        <a class="flex pointer flex-shrink-0 flex-column ba br2 b--very-light-gray
                    mr3 free-mock-card ph2 pv3 link start">
                            <div class="image_circle">
                                <img class="w2-5 h2-5 center lazyloaded"
                                     src="https://grdp.co/cdn-cgi/image/width=64,height=64,quality=80/https://gs-post-images.grdp.co/2016/8/img1470917301523-57-rs.png">
                            </div>

                            <p class="font_paraghaph">SSC CGL Tier I Free Mock </p>
                            <span class="free_text">free mock</span>
                            <ul class="list_inner">
                                <li class=" flex gray"><span class="mr-2">•</span><span>Questions</span><span
                                            class="ml-auto fw7">100</span></li>
                                <li class="flex gray f7"><span class="mr-2">•</span><span>Time (mins)</span><span
                                            class="ml-auto fw7">60</span></li>
                                <li class="flex gray f7"><span class="mr-2">•</span><span>Maximum Marks</span><span
                                            class="ml-auto fw7">200</span></li>
                            </ul>
                        </a><a href="{{url('package')}}" type="button" class="btn attempt-button py-1 m-0">attempt
                            now</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop






