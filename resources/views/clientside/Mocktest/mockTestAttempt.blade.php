@extends('clientside.Master.main')
@section('title',$mockDetail->exam_name)
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="background_for_test pt-3">
                    <div class="page_heading">
                        <h3>{{$mockDetail->exam_name}}</h3>
                        <p>Attempt this test only for just <i class="fa fa-inr mx-1"
                                                              aria-hidden="true"></i> {{number_format($mockDetail->exam_cost,2)}}
                        </p>
                        <div class="list_section">
                            <ul>
                                <li>
                                    <i class="fa fa-check icons_check"></i>
                                    25 Tier I, 20 Tier II Mock Tests, 36 Prev. Papers
                                </li>
                                <li>
                                    <i class="fa fa-check icons_check"></i>
                                    Available in Hindi & English
                                </li>
                            </ul>
                            <div class="row">
                                <div class="col-sm-3">
                                    <?php
                                    $alreadyPurchase = \App\Payment::where(['user_id' => \Illuminate\Support\Facades\Auth::id(), 'exam_id' => $mockDetail->id, 'status' => 'completed'])->first();
                                    $ifCompleted = \App\ExamResult::where(['user_id' => \Illuminate\Support\Facades\Auth::id(), 'exam_id' => $mockDetail->id, 'status' => 'Completed'])->first();
                                    ?>
                                    @if(isset($alreadyPurchase))
                                        @if($ifCompleted)
                                            <a type="button"
                                               href="{{route('client.mocktest.result',['slug'=>$mockDetail->slug,'id'=>\Illuminate\Support\Facades\Auth::id()])}}"
                                               class="attempt-button py-2" target="_blank"> Get
                                                result</a>
                                        @else
                                            <a type="button"
                                               href="{{route('user.mocktest.attempt.init',['slug'=>$mockDetail->slug])}}"
                                               class="attempt-button py-2" target="_blank">Attempt</a>
                                        @endif

                                    @else
                                        <a type="button"
                                           href="{{route('user.mocktest.purchase',['id'=>encrypt($mockDetail->id)])}}"
                                           class="attempt-button py-2">Purchase</a>

                                        {{--<button type="button" class="attempt-button py-2">Buy now</button>--}}
                                    @endif
                                </div>
                                {{--<div class="col-sm-3">--}}
                                {{--<a href="https://drive.google.com/drive/u/0/folders/1nkG6YJLa1Yz_Ps9GrDDKRl4rfMiykror"--}}
                                {{--type="button" class="btn btn-outline-danger waves-effect py-2 m-0">Sample pdf</a>--}}
                                {{--</div>--}}
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm-4 py-5">
                <div class="advertisement_section z-depth-1">
                    <img src="https://s0.2mdn.net/9294460/LMS_APAC_TOFU_Static_IN_OTIS_MemberstatbyCountry_300x250.jpg"
                         alt="adevertisement">

                </div>
            </div>
        </div>
        <div class="row">
            <div class="">
                <h4 class="heading_recom">RELATED {{$mockDetail->Categories->category}} : MOCK TESTS</h4>
                <p>View Test Series of {{$mockDetail->Categories->category}} Exams</p>
            </div>
            <div class="w-100">
                @if(count($category_test)>0)
                    @foreach($category_test as $filter_ind => $item)
                        <div class="product_block">
                            <a class="flex pointer flex-shrink-0 flex-column ba br2 b--very-light-gray
                    mr3 free-mock-card ph2 pv3 link start">
                                <div class="image_circle">
                                    <img class="w2-5 h2-5 center lazyloaded"
                                         src="{{url(\Illuminate\Support\Facades\Storage::url($item->Categories->logo))}}">
                                </div>

                                <p class="font_paraghaph">{{$item->exam_name}}</p>
                                <span class="free_text"><i class="fa fa-inr mr-2"
                                                           aria-hidden="true"></i>{{number_format($item->exam_cost,2)}}</span>
                                <ul class="list_inner">
                                    <li class=" flex gray"><span class="mr-2">•</span><span
                                                class="mr-2">Questions</span><span
                                                class="ml-auto fw7">{{$item->total_question}}</span></li>
                                    <li class="flex gray f7"><span class="mr-2">•</span><span
                                                class="mr-2">Time</span><span
                                                class="ml-auto fw7">{{$item->total_time}}</span></li>
                                    <li class="flex gray f7"><span class="mr-2">•</span><span
                                                class="mr-2">Maximum Marks</span><span
                                                class="ml-auto fw7">{{$item->total_mark}}</span></li>
                                </ul>
                                @if(\Illuminate\Support\Facades\Auth::check())
                                    {{--@if(isset($completed))--}}
                                    {{--<a href="{{route('client.mocktest.result',['id'=>encrypt($completed->id)])}}" type="button"--}}
                                    {{--class="btn attempt-button py-1 m-0" target="_blank">Get result</a>--}}
                                    {{--@else--}}
                                    <a href="{{route('client.mocktest.attempt',['slug'=>$item->slug])}}" type="button"
                                       class="btn attempt-button py-1 m-0">Attempt
                                        now</a>
                                    {{--@endif--}}
                                @else
                                    <a href="javascript:void(0);" class="btn attempt-button py-1 m-0" type="button"
                                       data-toggle="modal" data-target="#loginform">Attempt now</a>
                                @endif

                            </a>
                        </div>
                    @endforeach
                @else
                    <h3>No more test available with this category</h3>
                @endif
                {{--<div class="product_block">--}}
                    {{--<a class="flex pointer flex-shrink-0 flex-column ba br2 b--very-light-gray--}}
                    {{--mr3 free-mock-card ph2 pv3 link start">--}}
                        {{--<div class="image_circle">--}}
                            {{--<img class="w2-5 h2-5 center lazyloaded"--}}
                                 {{--src="https://grdp.co/cdn-cgi/image/width=64,height=64,quality=80/https://gs-post-images.grdp.co/2016/8/img1470917301523-57-rs.png">--}}
                        {{--</div>--}}

                        {{--<p class="font_paraghaph">SSC CGL Tier I Free Mock </p>--}}
                        {{--<span class="free_text">free mock</span>--}}
                        {{--<ul class="list_inner">--}}
                            {{--<li class=" flex gray"><span class="mr-2">•</span><span>Questions</span><span--}}
                                        {{--class="ml-auto fw7">100</span></li>--}}
                            {{--<li class="flex gray f7"><span class="mr-2">•</span><span>Time (mins)</span><span--}}
                                        {{--class="ml-auto fw7">60</span></li>--}}
                            {{--<li class="flex gray f7"><span class="mr-2">•</span><span>Maximum Marks</span><span--}}
                                        {{--class="ml-auto fw7">200</span></li>--}}
                        {{--</ul>--}}
                        {{--<button type="button" class="attempt-button">attempt now</button>--}}
                    {{--</a>--}}
                {{--</div>--}}

            </div>
        </div>
    </div>

@stop
