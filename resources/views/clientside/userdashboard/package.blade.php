@extends('clientside.userdashboard.masteruserdashboard')
@section('title','dashboard')
@section('content')
    <div class="main_container">
        <div class="z-depth-1">

            <div class="heder_section_dashboard">
                <h3>Test Series</h3>
            </div>
            <div class="table_main_part">
                <table class="table table-bordered table_purches_list">
                    <thead>
                    <tr>
                        <th scope="col" width="5%">S.no</th>
                        <th scope="col" width="10%">Date</th>
                        <th scope="col">Test Name</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Order No</th>
                        <th scope="col" width="15%">Status</th>
                        <th scope="col" width="15%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($packages)>0)
                        @foreach($packages as $index => $list)
                            <?php
                            $testAttempt = \App\ExamResult::where(['user_id' => $list->user_id, 'exam_id' => $list->exam_id])->first();
                            ?>
                            <tr>
                                {{--<td>{{$testAttempt}}</td>--}}
                                <th scope="row">{{$index+1}}</th>
                                <td>{{\Carbon\Carbon::parse($list->created_at)->format('M, d-Y')}}</td>
                                <td>{{$list->PaymentExam->exam_name}}</td>
                                <td>{{$list->amount}}</td>
                                <td>{{$list->order_no}}</td>
                                <td class="text-center">
                                    @if($testAttempt)
                                        @if($testAttempt->status=="Ongoing")
                                            <span class="attempt">Not Completed</span>
                                        @elseif($testAttempt->status =="Completed")
                                            <span class="attempt">Attempted</span>
                                        @endif
                                    @else
                                        <span class="Notattempt">Not Attempt</span>
                                    @endif</td>
                                <td class="text-center">
                                    @if($testAttempt)
                                        @if($testAttempt->status=="Ongoing")
                                            <a href="{{route('user.mocktest.attempt.init',['slug'=>$testAttempt->ExamData->slug])}}"
                                               target="_blank">
                                                <span class="attempt_result">Continue</span></a>
                                        @elseif($testAttempt->status =="Completed")
                                            <a href="{{route('client.mocktest.result',['slug'=>$testAttempt->ExamData->slug,'id'=>$list->user_id])}}" target="_blank">
                                                <span class="Result">Result</span></a>
                                        @endif
                                    @else
                                        <a href="{{route('user.mocktest.attempt.init',['slug'=>$testAttempt->ExamData->slug])}}"
                                           target="_blank"><span
                                                    class="attempt_result">Attempt</span></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th class="text-center" colspan="7">No data available</th>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@stop
