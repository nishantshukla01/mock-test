@extends('clientside.userdashboard.masteruserdashboard')
@section('title','Old tests | '.\Illuminate\Support\Facades\Auth::user()->name)
@section('content')
    <div class="main_container">
        <div class="z-depth-1">
            <div class="page__container">
                <div class="heder_section_dashboard">
                    <h3>Old Test</h3>
                </div>
                <div class="card-form">
                    <div class="row mx-0">
                        <div class="col-lg-6 card-body">
                            <p><strong class="headings-color">Here you can get information about your old mock
                                    test that you have attempted.</strong></p>
                            {{--<p class="text-muted mb-0"></p>--}}
                        </div>
                    </div>
                    <div>
                        <table class="table table-hover">
                            <tr>
                                <th>Sl.</th>
                                <th>Test</th>
                                <th>Mark</th>
                                <th>Total Q.</th>
                                <th>Time</th>
                                <th>Attempt Dt.</th>
                                <th>Option</th>
                            </tr>
                            @if(count($oldTest)>0)
                                @foreach($oldTest as $index => $list)
                                    <tr>
                                        <th>{{$index+1}}</th>
                                        <th>{{$list->ExamData->exam_name}}</th>
                                        <th>{{$list->ExamData->total_mark}}</th>
                                        <th>{{$list->ExamData->total_question}}</th>
                                        <th>{{$list->ExamData->total_time}}</th>
                                        <th>{{\Carbon\Carbon::parse($list->updated_at)->format('M, d-Y')}}</th>
                                        <th><a type="button"
                                               href="{{route('client.mocktest.result',['slug'=>$list->ExamData->slug,'id'=>\Illuminate\Support\Facades\Auth::id()])}}"
                                               class="attempt-button py-2" target="_blank">Result</a></th>
                                    </tr>
                                @endforeach
                            @else
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop