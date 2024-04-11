@extends('clientside.Master.main')
@section('title','Mock Test')
@section('content')
<style>
    .map-container-section {
        overflow: hidden;
        padding-bottom: 56.25%;
        position: relative;
        height: 0;
    }

    .map-container-section iframe {
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        position: absolute;
    }

    .contact_box {
        background-image: url(http://11stitch.co/images/google_map.jpg);
        margin-top: 0px;

        z-index: 0;
    }

    .contact_inner_box {

        background-color: #00000066;
        padding-top: 60px;

    }
    .conact_box
    {
        padding-bottom: 6px;
    font-size: 13px;
    line-height: 21px;
    font-weight: 600;
    }
</style>
<div class="contact_box">
    <div class="contact_inner_box">
        <div class="container">
            <section class="pb-5">
                <div class="row">
                    <div class="col-lg-5 mb-lg-0 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <!-- Header -->
                                <div class="form-header sign_up_button">
                                    <h3 class="mt-2">
                                        <i class="fa fa-envelope mr-4"></i> Write to us:</h3>
                                </div>

                                <div class="md-form">
                                    <!-- <i class="fa fa-user prefix grey-text"></i> -->
                                    <input type="text" id="form-name" class="form-control">
                                    <label for="form-name">Your name</label>
                                </div>
                                <div class="md-form">
                                    <!-- <i class="fa fa-envelope prefix grey-text"></i> -->
                                    <input type="text" id="form-email" class="form-control">
                                    <label for="form-email">Your email</label>
                                </div>
                                <div class="md-form">
                                    <!-- <i class="fa fa-tag prefix grey-text"></i> -->
                                    <input type="text" id="form-Subject" class="form-control">
                                    <label for="form-Subject">Subject</label>
                                </div>
                                <div class="md-form">
                                    <!-- <i class="fa fa-pencil-alt prefix grey-text"></i> -->
                                    <textarea id="form-text" class="form-control md-textarea" rows="3"></textarea>
                                    <label for="form-text">Send message</label>
                                </div>
                                <div class="text-center">
                                    <button class="btn sign_up_button">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7">

                        <!--Google map-->
                        <div id="map-container-section" class="z-depth-1-half map-container-section mb-4" style="height: 400px">
                            <iframe class="w-100 h-100" src="https://maps.google.com/maps?q=Manhatan&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                        <!-- Buttons-->
                        <div class="row text-center">
                            <div class="col-md-4">
                                <div class="white conact_box">
                                <a class="btn-floating sign_up_button">
                                    <i class="fa fa-map-marker fx-2"></i>
                                </a>
                                <p class="mb-md-0">New York, 94126</p>
                                <p >United States</p>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="white conact_box">
                                <a class="btn-floating sign_up_button">
                                    <i class="fa fa-phone"></i>
                                </a>
                                <p class="mb-md-0">+ 01 234 567 89</p>
                                <p class="">Mon - Fri, 8:00-22:00</p>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="white conact_box">
                                <a class="btn-floating sign_up_button">
                                    <i class="fa fa-envelope"></i>
                                </a>
                                <p class="mb-md-0">info@gmail.com</p>
                                <p class="">sale@gmail.com</p>
                            </div>
                            </div>
                        </div>

                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row -->

            </section>
        </div>
    </div>
</div>
@stop
