<div class="timer">
    <p class="resend-otp">00:00:00
    </p>
</div>
<div id="{{$data->question_no}}" class="">
    <div class="headding_title">Question {{$data->question_no}} to {{$count}}</div>

    <form id="form" class="answer" action=""
          name="form" data-qid="{{$data->question_no}}" data-id="{{encrypt($data->id)}}">
        <div class="questionForm">
            <div class="row q_div scrollStyle">
                <div class="col-sm-6 enQ">
                    <b>Q {{str_pad($data->question_no,2,0,STR_PAD_LEFT)}}
                        . </b>{!!isset($data->ExamQuestionData->question)?$data->ExamQuestionData->question:'Not Available'!!}
                </div>
                <div class="col-sm-6 hnQ">
                    <b>Q {{str_pad($data->question_no,2,0,STR_PAD_LEFT)}}
                        . </b>{!!isset($data->ExamQuestionData->hindi)?$data->ExamQuestionData->hindi:'Not Available'!!}
                </div>
            </div>
            <div class="optDiv scrollStyle">
                <div class="radio">
                    <?php
                    $opt_1 = explode('``', $data->ExamQuestionData->opt_1);
                    ?>
                    <input id="{{$data->id}}_0" type="radio" name="radio"
                           value="opt_1" @if($data->answer == "opt_1") checked @endif/><label
                            class="radio-label radio_button"
                            for="{{$data->id}}_0">@if(count($opt_1)>1){{$opt_1[0]}}
                        <p class="hnopt">{{$opt_1[1]}} </p>@else {{$data->ExamQuestionData->opt_1}} @endif</label>
                </div>
                <div class="radio">
                    <?php
                    $opt_2 = explode('``', $data->ExamQuestionData->opt_2);
                    ?>
                    <input id="{{$data->id}}_1" type="radio" name="radio"
                           value="opt_2" @if($data->answer == "opt_2") checked @endif/>
                    <label class="radio-label radio_button"
                           for="{{$data->id}}_1">@if(count($opt_2)>1){{$opt_2[0]}}
                        <p class="hnopt">{{$opt_2[1]}} </p> @else {{$data->ExamQuestionData->opt_2}} @endif</label>
                </div>
                <div class="radio">
                    <?php
                    $opt_3 = explode('``', $data->ExamQuestionData->opt_3);
                    ?>
                    <input id="{{$data->id}}_2" type="radio" name="radio"
                           value="opt_3" @if($data->answer == "opt_3") checked @endif/><label
                            class="radio-label radio_button"
                            for="{{$data->id}}_2">@if(count($opt_3)>1){{$opt_3[0]}}
                        <p class="hnopt">{{$opt_3[1]}} </p> @else {{$data->ExamQuestionData->opt_3}} @endif</label>
                </div>
                <div class="radio">
                    <?php
                    $opt_4 = explode('``', $data->ExamQuestionData->opt_4);
                    ?>
                    <input id="{{$data->id}}_3" type="radio" name="radio"
                           value="opt_4" @if($data->answer == "opt_4") checked @endif/><label
                            class="radio-label radio_button"
                            for="{{$data->id}}_3">@if(count($opt_4)>1){{$opt_4[0]}}
                        <p class="hnopt">{{$opt_4[1]}} </p> @else  {{$data->ExamQuestionData->opt_4}} @endif</label>
                </div>
            </div>
        </div>
    </form>
</div>

