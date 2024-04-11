@if(count($question_data)>0)
    @foreach($question_data as $q_index => $subject)
        <?php
        $all_question = \App\ExamQuestion::where(['exam_id' => $exam_id, 'subject_id' => $subject->subject_id])->get();
        ?>
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">{{$subject->Subjects->subject_category}}</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                            data-toggle="tooltip"
                            title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body table-responsive p-0" @if(count($question_data)==1) style="max-height: 2000px;"
                 @else style="max-height: 1000px;" @endif>
                <table class="table table-hover table-font table-head-fixed text-nowrap">
                    <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="30%">Question</th>
                        <th width="11%">Option A</th>
                        <th width="11%">Option B</th>
                        <th width="11%">Option C</th>
                        <th width="11%">Option D</th>
                        <th width="11%">Answer</th>
                        <th width="5%">Marks</th>
                        {{--<th>Level</th>--}}
                        <th width="5%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($all_question)>0)
                        @foreach($all_question as $index =>$list)
                            <tr id="tr_{{$index+1}}">
                                <td>{{$index+1}}</td>
                                <td width="30%">{!! isset($list->question )?$list->question :''!!}
                                    {!! isset($list->hindi)?$list->hindi:'' !!}
                                </td>
                                <td style="vertical-align: middle">{{$list->opt_1}}</td>
                                <td style="vertical-align: middle">{{$list->opt_2}}</td>
                                <td style="vertical-align: middle">{{$list->opt_3}}</td>
                                <td style="vertical-align: middle">{{$list->opt_4}}</td>
                                <td style="vertical-align: middle">@if($list->answer == 'opt_1')
                                        {{$list->opt_1}}
                                    @elseif($list->answer =='opt_2')
                                        {{$list->opt_2}}
                                    @elseif($list->answer =='opt_3')
                                        {{$list->opt_3}}
                                    @elseif($list->answer =='opt_4')
                                        {{$list->opt_4}}
                                    @endif
                                </td>
                                <td style="vertical-align: middle">{{$list->mark}}</td>
                                <td>
                                    <a class="text-primary edit_this mx-1"
                                       href="{{route('exam.question.edit',$list->id)}}"
                                       id="{{--delete_btn--}}" target="_blank"
                                       {{--onclick="operation.edit_question(this,'{{encrypt($list->id)}}','{{$index+1}}')"--}}
                                       type="button"><i class="far fa-edit" aria-hidden="true"></i>
                                    </a>
                                    <a class="text-danger delete_this mx-1"
                                       id="{{--delete_btn--}}"
                                       onclick="delete_question(this,'{{encrypt($list->id)}}')"
                                       type="button"><i
                                                class="far fa-trash-alt" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="9" class="text-center">No records</th>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
@endif
