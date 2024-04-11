@extends('clientside.userdashboard.masteruserdashboard')
<style>
    .resultNav{
        padding: 15px 0px !important;
    }
</style>
@section('title','Test Result')
<style>
    .table_purches_list tbody tr td p {
        margin-bottom: 0px;
    }

    .resultFont {
        font-size: 18px;
        font-weight: 600;
    }
    #header{
        padding: 8px 0px;
        background: #060935 !important;
    }
</style>
@section('content')
    <div class="main_container">
        <div class="z-depth-1">

            <section id="header" class="heder_section_dashboard">
                <div class="row text-center">
                    <div class=" col-sm-3">
                <span class="text-warning resultFont">Total Points : {{$result}}
                </span>
                    </div>
                    <div class=" col-sm-3">
                <span class="text-success resultFont">Correct Answer : {{str_pad(count($correct),2,0,STR_PAD_LEFT)}} <i
                            class="fa fa-check"></i> </span>
                    </div>
                    <div class="col-sm-3">
                <span class="text-danger resultFont">Wrong Answer : {{str_pad(count($wrong),2,0,STR_PAD_LEFT)}} <i
                            class="fa fa-times"></i> </span>
                    </div>
                    <div class="col-sm-3">
                <span
                        class="text-white resultFont">Not Given : {{str_pad(count($not_given),2,0,STR_PAD_LEFT)}}</span>
                    </div>
                </div>
            </section>
            <section id="table_update" class="table_main_part">
                <table class="table table-bordered table-hover table_purches_list">
                    <thead>
                    <tr>
                        <th width="4%">S.No.</th>
                        <th width="47%">Question</th>
                        <th width="22%">Right Answer</th>
                        <th width="22%">Your Answer</th>
                        <th width="5%" class="text-center">Mark</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($all) > 0)
                        @foreach($all as $index => $list)
                            <tr>
                                <th style="vertical-align:middle;" class="text-center">{{str_pad($index+1,2,0,STR_PAD_LEFT)}}</th>
                                <td style="vertical-align:middle;">{!!$list->ExamQuestionData->question!!}</td>
                                <td style="vertical-align:middle;"><span class="text-dark font-weight-bold">@if($list->ExamQuestionData->answer == 'opt_1')
                                            {{$list->ExamQuestionData->opt_1}}
                                        @elseif($list->ExamQuestionData->answer =='opt_2')
                                            {{$list->ExamQuestionData->opt_2}}
                                        @elseif($list->ExamQuestionData->answer =='opt_3')
                                            {{$list->ExamQuestionData->opt_3}}
                                        @elseif($list->ExamQuestionData->answer =='opt_4')
                                            {{$list->ExamQuestionData->opt_4}}
                                        @endif
                            </span>
                                </td>
                                {{--                        <td><span class="text-info">{{$list->ExamQuestionData->answer}}</span></td>--}}
                                <th  style="vertical-align: middle;">@if(isset($list->answer))
                                        @if($list->answer == $list->ExamQuestionData->answer)
                                            <span class="text-success">
                                        @if($list->answer == 'opt_1')
                                                    {{$list->ExamQuestionData->opt_1}}
                                                @elseif($list->answer =='opt_2')
                                                    {{$list->ExamQuestionData->opt_2}}
                                                @elseif($list->answer =='opt_3')
                                                    {{$list->ExamQuestionData->opt_3}}
                                                @elseif($list->answer =='opt_4')
                                                    {{$list->ExamQuestionData->opt_4}}
                                                @endif
                                                <i class="fa fa-check-circle"></i></span>
                                        @else
                                            <span class="text-danger">@if($list->answer == 'opt_1')
                                                    {{$list->ExamQuestionData->opt_1}}
                                                @elseif($list->answer =='opt_2')
                                                    {{$list->ExamQuestionData->opt_2}}
                                                @elseif($list->answer =='opt_3')
                                                    {{$list->ExamQuestionData->opt_3}}
                                                @elseif($list->answer =='opt_4')
                                                    {{$list->ExamQuestionData->opt_4}}
                                                @endif<i
                                                        class="fa fa-times-circle"></i></span>
                                        @endif
                                    @else
                                        <span class="text-secondary">Not given</span>
                                    @endif
                                </th>
                                <th class="text-center" style="vertical-align: middle;">
                                    @if(isset($list->answer))
                                        @if($list->answer==$list->ExamQuestionData->answer)
                                            <span class="text-success">{{$list->mark}}</span>
                                        @else
                                            <span class="text-danger">{{$list->minus}}</span>
                                        @endif
                                    @else
                                        <span class="text-secondary">0</span>
                                    @endif
                                </th>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </section>
        </div>
    </div>
@stop