@extends('clientside.Master.main')
@section('title',$job_detail->job_title)
@section('content')
    <style>
        .title_of_job_alert {
            font-size: 24px;
            margin-top: 28px;
            font-weight: 600;
        }

        .description_section_job p {
            font-size: 15px;
            text-align: justify;
        }

        .title_mocksection_job_alert {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            /* -webkit-line-clamp: 2; */
            /* -webkit-box-orient: vertical; */
            font-size: 13px;
            line-height: 16px;
            padding: 7px 8px 5px;
            margin-bottom: 0px;
            /* height: 40px; */
            font-weight: 500;
        }

        .gobalert_table tr td {
            padding: 8px 14px;
            font-size: 16px;
        }

        .gobalert_table td {
            border: 1px solid #cdd6c4;
        }

        .description_section_job h6 {
            font-size: 20px;
            font-weight: 600;
            color: #FF5722;
            margin-top: 30px;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="job_Alert_order">
                    <h2 class="title_of_job_alert">
                        {{$job_detail->job_title}}
                    </h2>
                    <div>
                        <img src="https://tpc.googlesyndication.com/daca_images/simgad/10664281014357787266" alt="">
                    </div>
                    <div class="description_section_job">
                        <p>
                        {!! $job_detail->description !!}
                        </p>
                        {{--<p class="">--}}
                        {{--New Malda District ASHA Recruitment 2020 Notification is released. And this new advertisement is for the 129 Accredited Social Health Activist (ASHA) Vacancies. Interested Candidates across West Bengal State after checking all the details can proceed to apply for it before the specified final date. Here through this post, we are providing all the details about the Malda District ASHA Vacancy 2020. Go ahead and check them all. Applications for the Latest Malda District ASHA Openings 2020 must be submitted in the Offline Mode. Down in this post along with the Official Malda District ASHA Recruitment 2020 Notification, we also shared the address.--}}
                        {{--</p>--}}
                        {{--<p class="">--}}
                        {{--And to that address, the applications for the Latest Malda District ASHA Vacancy 2020 must reach. Surely, this new Malda District ASHA Notification 2020 is a good chance for the Women who completed their Madhyamik and looking for Government Jobs. 19th March 2020 is the final date to apply for the Malda District ASHA Jobs 2020. Our Freshersnow.com team is providing all the details about the Latest Malda District ASHA Recruitment 2020 Notification. Go ahead and check them all before applying.--}}
                        {{--</p>--}}
                    </div>
                    {{----}}
                    {{--<h2 class="title_of_job_alert">--}}
                    {{--Malda District ASHA Recruitment 2020 – 129 Posts, Date, Application Form--}}
                    {{--</h2>--}}
                    {{--<table class="gobalert_table mb-5 w-100">--}}
                    {{--<tbody>--}}
                    {{--<tr>--}}
                    {{--<td style="text-align: center;" colspan="2"><strong>Latest Malda District ASHA Recruitment 2020 Notification</strong></td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                    {{--<td>Organization Name</td>--}}
                    {{--<td>Malda District</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                    {{--<td>Post Name</td>--}}
                    {{--<td>Accredited Social Health Activist (ASHA)</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                    {{--<td>Total Vacancies</td>--}}
                    {{--<td>129</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                    {{--<td>Starting Date</td>--}}
                    {{--<td>27th February 2020</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                    {{--<td>Closing Date</td>--}}
                    {{--<td>19th March 2020</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                    {{--<td>Application Mode</td>--}}
                    {{--<td>Offline</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                    {{--<td>Category</td>--}}
                    {{--<td><a href="https://www.freshersnow.com/government-jobs-india/"><strong>Government Jobs in India</strong></a></td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                    {{--<td>Selection Process</td>--}}
                    {{--<td>Written Test/ Interview</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                    {{--<td>Job Location</td>--}}
                    {{--<td>Malda District, West Bengal</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                    {{--<td>Official Site</td>--}}
                    {{--<td>malda.gov.in</td>--}}
                    {{--</tr>--}}
                    {{--</tbody>--}}
                    {{--</table>--}}
                    {{--<div class="description_section_job">--}}
                    {{--<h6>Educational Qualification</h6>--}}
                    {{--<p class="">--}}
                    {{--Candidates who are Married/ Divorced or Widowed Women who completed their Madhyamik from any Recognized Institute or Board in India.--}}
                    {{--</p>--}}
                    {{--<h6>Age Limit</h6>--}}
                    {{--<p class="">--}}
                    {{--Check Malda District ASHA Recruitment 2020 Notification for the details about the Age Limit and Age Relaxation.--}}
                    {{--</p>--}}
                    {{--<h6>Salary</h6>--}}
                    {{--<p class="">--}}
                    {{--According to the Norms of the Organization.--}}
                    {{--</p>--}}
                    {{--<h6>Application Fee</h6>--}}
                    {{--<p class="">--}}
                    {{--Check Malda District ASHA Recruitment 2020 Notification for the information about the Application Fee.</p>--}}
                    {{--<h6>Malda District ASHA Selection Process</h6>--}}
                    {{--<p class="">--}}
                    {{--Malda District Officials are going to select the candidates either through Written Test/ Interview or Merit.--}}
                    {{--</p>--}}
                    {{--</div>--}}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="advertisement_job">
                    <img src="https://tpc.googlesyndication.com/daca_images/simgad/1035177190379129718" alt=""
                         class="w-100"/>

                </div>
                <div class="heading_section">
                    <div class="headeing_section_side_bar">
                        <h4 class="text-light">Latest Posts</h4>
                    </div>
                    <div class="submenu">
                        <ul class="">
                            <li>
                                <a href="#">
                                    <div class="main_mock_test_secion_alert">

                                        <div class="title_mocksection_job_alert">
                                            North Central Railway Apprentice Result 2020 | RRC NCR Merit List, Selection
                                            List
                                        </div>

                                    </div>

                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="main_mock_test_secion_alert">

                                        <div class="title_mocksection_job_alert">
                                            North Central Railway Apprentice Result 2020 | RRC NCR Merit List, Selection
                                            List
                                        </div>

                                    </div>

                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="main_mock_test_secion_alert">

                                        <div class="title_mocksection_job_alert">
                                            North Central Railway Apprentice Result 2020 | RRC NCR Merit List, Selection
                                            List
                                        </div>

                                    </div>

                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="main_mock_test_secion_alert">

                                        <div class="title_mocksection_job_alert">
                                            North Central Railway Apprentice Result 2020 | RRC NCR Merit List, Selection
                                            List
                                        </div>

                                    </div>

                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="main_mock_test_secion_alert">

                                        <div class="title_mocksection_job_alert">
                                            North Central Railway Apprentice Result 2020 | RRC NCR Merit List, Selection
                                            List
                                        </div>

                                    </div>

                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="main_mock_test_secion_alert">

                                        <div class="title_mocksection_job_alert">
                                            North Central Railway Apprentice Result 2020 | RRC NCR Merit List, Selection
                                            List
                                        </div>

                                    </div>

                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="main_mock_test_secion_alert">

                                        <div class="title_mocksection_job_alert">
                                            North Central Railway Apprentice Result 2020 | RRC NCR Merit List, Selection
                                            List
                                        </div>

                                    </div>

                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="heading_section">
                    <div class="headeing_section_side_bar">
                        <h4 class="text-light">Latest Announcements
                        </h4>
                    </div>
                    <div class="submenu">
                        <ul class="">
                            <li>
                                <a href="#">
                                    <div class="main_mock_test_secion_alert">

                                        <div class="title_mocksection_job_alert">
                                            Admit Card
                                        </div>

                                    </div>

                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="main_mock_test_secion_alert">

                                        <div class="title_mocksection_job_alert">
                                            Exam Results
                                        </div>

                                    </div>

                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="main_mock_test_secion_alert">

                                        <div class="title_mocksection_job_alert">
                                            Exam Date
                                        </div>

                                    </div>

                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="main_mock_test_secion_alert">

                                        <div class="title_mocksection_job_alert">
                                            Vacancies
                                        </div>

                                    </div>

                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>

@stop
