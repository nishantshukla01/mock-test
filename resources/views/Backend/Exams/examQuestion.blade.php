@extends('Backend.Master.main')
@section('title','Exam Question')
<style>
    @keyframes click-wave {
        0% {
            height: 50px;
            width: 50px;
            opacity: 0.35;
            position: relative;
        }
        100% {
            height: 50px;
            width: 50px;
            margin-left: -10px;
            margin-top: -10px;
            opacity: 0;
        }
    }

    .option-input {
        -webkit-appearance: none;
        -moz-appearance: none;
        -ms-appearance: none;
        -o-appearance: none;
        appearance: none;
        position: relative;
        top: 0;
        right: 0;
        bottom: 0;
        left: 1px;
        height: 35px;
        width: 35px;
        transition: all 0.15s ease-out 0s;
        background: #cbd1d8;
        border: none;
        color: #fff;
        cursor: pointer;
        display: inline-block;
        margin-right: 1px;
        outline: none;
        z-index: 10;
    }

    .option-input:hover {
        background: #9faab7;
    }

    .option-input:checked {
        background: #51cbce;
    }

    .option-input:checked::before {
        height: 40px;
        width: 40px;
        position: absolute;
        content: '✔';
        display: inline-block;
        font-size: 25px;
        text-align: center;
        line-height: 36px;
    }

    .option-input:checked::after {
        -webkit-animation: click-wave 0.65s;
        -moz-animation: click-wave 0.65s;
        animation: click-wave 0.65s;
        background: #40e0d0;
        content: '';
        display: block;
        position: relative;
        z-index: 100;
    }

    .option-input.radio {
        border-radius: 3px;
    }

    .option-input.radio::after {
        border-radius: 3px;
    }
</style>
{{--<link rel="stylesheet" href="{!! asset('backend/plugins/summernote/summernote-bs4.css') !!}">--}}
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Exam Questions</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Insert Exam question</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-sm-12 col-sm-12" id="list">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">@if(isset($editQuestion))Edit Question @else Insert
                                Question @endif </h3>
                            <a href="{{route('exam.question.list')}}" data-show="create" data-hide="list"
                               class="btn btn-outline-warning btn-sm float-right display_this"><i
                                        class="fas fa-list-ul mr-2"></i> List</a>
                        </div>
                        <form role="form" method="post"
                              action="{{route('exam.question.insert.update')}}"
                              id="quickForm">
                            @csrf
                            {{--{{$editQuestion->QuestionExams->category_id}}--}}
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-sm-3">
                                        <label for="category_id" class=" col-form-label">Category</label>
                                        <div class="col-sm-12">
                                            <select class="form-control" id="category_id" name="category_id"
                                                    style="width: 100%;">
                                                @if(count($category)>0)

                                                    <option>Select</option>
                                                    @foreach($category as $cat_index =>$item)
                                                        <option value="{{encrypt($item->id)}}"
                                                                @if($item->id == isset($editQuestion)?$editQuestion->QuestionExams->category_id :'' ) selected @endif>{{$item->category}}</option>
                                                    @endforeach
                                                @endif

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="exam_id" class=" col-form-label">Select Exam</label>
                                        <div class="col-sm-12">
                                            <select class="form-control select2bs4" id="exam_id" name="exam_id"
                                                    style="width: 100%;">
                                                @if(isset($exams) && count($exams)>0)
                                                    <option value="">Select</option>
                                                    @foreach($exams as $index =>$list)
                                                        <option value="{{$list->id}}"
                                                                @if($list->id == $editQuestion->exam_id) selected @endif>{{$list->exam_name}}</option>
                                                    @endforeach
                                                @else
                                                    <option value="">Select category</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="subject_id" class=" col-form-label">Subject</label>
                                        <div class="col-sm-12">
                                            <select class="form-control" id="subject_id" name="subject_id"
                                                    style="width: 100%;">
                                                @if(count($subjects)>0)
                                                    <option>Select</option>
                                                    @foreach($subjects as $subject_index =>$sub_item)
                                                        <option value="{{encrypt($sub_item->id)}}"
                                                                @if($sub_item->id == isset($editQuestion)?$editQuestion->subject_id:'') selected @endif>{{$sub_item->subject_category}}</option>
                                                    @endforeach
                                                @endif

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="hindi">English</label>
                                        <div class="mb-3">
                                            <textarea class="textarea" name="question" id="question"
                                                      placeholder="Place some text here">{!! $editQuestion->question??'' !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="hindi">Hindi</label>
                                        <div class="mb-3">
                                            <textarea class="textarea" name="hindi" id="hindi"
                                                      placeholder="Place some text here">{!! $editQuestion->hindi??'' !!}</textarea>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 px-1">
                                        <div class="form-group">
                                            <label for="A">* Option A</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control required edit_time"
                                                       name="option_1" data-value="opt_1"
                                                       id="option_1"
                                                       placeholder="Option A"
                                                       value="{{isset($editQuestion)?$editQuestion->opt_1:''}}">
                                                <div class="input-group-append p-0">
                                                    <div class="input-group-text p-0">
                                                        <input type="radio" class="option-input radio"
                                                               @if(isset($editQuestion)?$editQuestion->answer == 'opt_1':'') checked
                                                               @endif id="A"
                                                               name="options"/>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 px-1">
                                        <div class="form-group">
                                            <label for="B">* Option B</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control required edit_time"
                                                       name="option_2" data-value="opt_2"
                                                       id="option_2"
                                                       placeholder="Option B"
                                                       value="{{isset($editQuestion)?$editQuestion->opt_2:''}}">
                                                <div class="input-group-append p-0">
                                                    <div class="input-group-text p-0">
                                                        <input type="radio" class="option-input radio"
                                                               @if(isset($editQuestion)?$editQuestion->answer == 'opt_2':'') checked
                                                               @endif id="B"
                                                               name="options"/>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 px-1">
                                        <div class="form-group">
                                            <label for="C">* Option C</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control required edit_time"
                                                       name="option_3" data-value="opt_3"
                                                       id="option_3"
                                                       placeholder="Option C"
                                                       value="{{isset($editQuestion)?$editQuestion->opt_3:''}}">
                                                <div class="input-group-append p-0">
                                                    <div class="input-group-text p-0">
                                                        <input type="radio" class="option-input radio"
                                                               @if(isset($editQuestion)?$editQuestion->answer == 'opt_3':'') checked
                                                               @endif id="C"
                                                               name="options"/>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 px-1">
                                        <div class="form-group">
                                            <label for="D">* Option D</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control required edit_time"
                                                       name="option_4" data-value="opt_4"
                                                       id="option_4"
                                                       placeholder="Option D"
                                                       value="{{isset($editQuestion)?$editQuestion->opt_4:''}}">
                                                <div class="input-group-append p-0">
                                                    <div class="input-group-text p-0">
                                                        <input type="radio" class="option-input radio"
                                                               @if(isset($editQuestion)?$editQuestion->answer == 'opt_4':'') checked
                                                               @endif id="D"
                                                               name="options"/>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 px-1">
                                        <div class="form-group">
                                            <label>* Answer</label>
                                            <input type="text" class="form-control" @if(isset($editQuestion))
                                            @if($editQuestion->answer == 'opt_1')
                                            data-value="opt_1"
                                                   @elseif($editQuestion->answer == 'opt_2')
                                                   data-value="opt_2"
                                                   @elseif($editQuestion->answer == 'opt_3')
                                                   data-value="opt_3"
                                                   @elseif($editQuestion->answer == 'opt_4')
                                                   data-value="opt_4"
                                                   @endif
                                                   @else
                                                   data-value=""
                                                   @endif readonly name="answer"
                                                   id="answer"
                                                   placeholder="Answer"
                                                   @if(isset($editQuestion))
                                                   @if($editQuestion->answer == 'opt_1')
                                                   value="{{$editQuestion->opt_1}}"
                                                   @elseif($editQuestion->answer == 'opt_2')
                                                   value="{{$editQuestion->opt_2}}"
                                                   @elseif($editQuestion->answer == 'opt_3')
                                                   value="{{$editQuestion->opt_3}}"
                                                   @elseif($editQuestion->answer == 'opt_4')
                                                   value="{{$editQuestion->opt_4}}"
                                                    @endif
                                                    @endif />
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-2 px-1">
                                        <div class="form-group">
                                            <label for="marks">* Mark</label>
                                            <input type="number" class="form-control required" name="marks"
                                                   id="marks"
                                                   placeholder="Mark"
                                                   value="{{isset($editQuestion)?$editQuestion->mark:1}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-2 px-1">
                                        <div class="form-group">
                                            <label for="minus">* Minus mark</label>
                                            <input type="number" class="form-control required" name="minus"
                                                   id="minus"
                                                   placeholder="Minus Mark"
                                                   value="{{isset($editQuestion)?$editQuestion->minus:'0.5'}}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center ">
                                    <hr/>
                                    <input type="hidden" value="{{$editQuestion->id ?? ''}}" name="id" id="id"/>
                                    <button type="submit" class="btn btn-primary w-25"
                                            id="submit">@if(isset($editQuestion)) Update @else Create @endif</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>--}}
    {{--<script src="{!! asset('backend/plugins/summernote/summernote-bs4.min.js') !!}"></script>--}}
    <script src="{!! asset('backend/plugins/ckeditor/ckeditor.js') !!}"></script>
    <script>
        $(document).ready(function () {
            $('#submit').click(function (e) {
                e.preventDefault();
                // var data = CKEDITOR.instances.question.getData();
                // console.log(data);
                // console.log($(`#question`).val());
                // console.log($(`#question`).html());

                if (validate.validation()) {
                    form_submit.insert_question(this);
                } else {
                    $(this).attr('disabled', false);
                    $.alert('Please fill all required field');
                }


            });
            $('.radio').change(function () {
                if ($(this).is(":checked")) {
                    let answer = $(this).parent().parent().parent().children(":text").val();
                    let data_value = $(this).parent().parent().parent().children(":text").data('value');
                    if (answer) {
                        $('#answer').val(answer);
                        $('#answer').data('value', data_value);
                    } else {
                        $(this).prop('checked', false);
                    }
                }
            });
            $(`#category_id`).change(function () {
                let category_id = $(this).val();
                $.ajax({
                    url: '{{route('get.exams')}}',
                    type: 'get',
                    data: {category_id},
                    beforeSend: function () {
                        $(`#exam_id`).attr('disabled', true);
                    },
                    success: function (response) {
                        $(`#exam_id`).attr('disabled', false);
                        if (response.success === true) {
                            let resData = response.data;
                            $(`#exam_id`).html('');
                            if (resData.length > 0) {
                                $(`#exam_id`).append(`<option value="">Select exam</option>`);
                                resData.map(function (arrVal) {
                                    $(`#exam_id`).append(`<option value="${arrVal.id}">${arrVal.exam_name}</option>`);
                                });
                            } else {
                                $(`#exam_id`).append(`<option value="">No exam available</option>`);
                            }
                        } else {
                            console.log(response);
                            $.alert({
                                icon: 'fa fa-warning',
                                title: 'Alert!',
                                content: 'Simple alert!',
                                type: 'red'
                            });
                        }
                    }
                });
            });
            $('.required').focusout(function () {
                let data = $(this).val();
                if (!data) {
                    $(this).focus();
                    let elm = ' <span class="text-danger required_alert"><i class="fa fa-info-circle" aria-hidden="true"></i> *Required</span>';
                    $(this).parent().children("label").children('.required_alert').remove();
                    $(this).parent().children("label").append(elm);
                }
            });
            CKEDITOR.replace('question');
            CKEDITOR.replace('hindi');
        });

        validate = {
            validation: function () {
                // debugger;
                let validation = true;
                let focus = false;
                let exam_id = $(`#exam_id`),
                    category_id = $(`#category_id`),
                    question = CKEDITOR.instances.question.getData(),
                    hindi = CKEDITOR.instances.hindi.getData(),
                    question_v = $(`#question`),
                    option_1 = $(`#option_1`),
                    option_2 = $(`#option_2`),
                    option_3 = $(`#option_3`),
                    option_4 = $(`#option_4`),
                    answer = $(`#answer`),
                    marks = $(`#marks`),
                    minus = $(`#minus`);
                if (!category_id) {
                    validation = false;
                    category_id.css('border', '1px solid #ff544a');
                } else category_id.css('border', '1px solid #ccc');
                if (!exam_id.val()) {
                    validation = false;
                    exam_id.css('border', '1px solid #ff544a');
                } else exam_id.css('border', '1px solid #ccc');
                if (!question) {
                    validation = false;
                    question_v.css('border', '1px solid #ff544a');
                    if (!focus) {
                        question_v.focus();
                        focus = true;
                    }
                } else question_v.css('border', '1px solid #ccc');
                if (!option_1.val()) {
                    validation = false;
                    option_1.css('border', '1px solid #ff544a');
                    if (!focus) {
                        option_1.focus();
                        focus = true;
                    }
                } else option_1.css('border', '1px solid #ccc');
                if (!option_2.val()) {
                    validation = false;
                    option_2.css('border', '1px solid #ff544a');
                    if (!focus) {
                        option_2.focus();
                        focus = true;
                    }
                } else option_2.css('border', '1px solid #ccc');
                if (!option_3.val()) {
                    validation = false;
                    option_3.css('border', '1px solid #ff544a');
                    if (!focus) {
                        option_3.focus();
                        focus = true;
                    }
                } else option_3.css('border', '1px solid #ccc');
                if (!option_4.val()) {
                    validation = false;
                    option_4.css('border', '1px solid #ff544a');
                    if (!focus) {
                        option_4.focus();
                        focus = true;
                    }
                } else option_4.css('border', '1px solid #ccc');
                if (!marks.val()) {
                    validation = false;
                    marks.css('border', '1px solid #ff544a');
                    if (!focus) {
                        marks.focus();
                        focus = true;
                    }
                } else marks.css('border', '1px solid #ccc');
                if (!minus.val()) {
                    validation = false;
                    minus.css('border', '1px solid #ff544a');
                    if (!focus) {
                        minus.focus();
                        focus = true;
                    }
                } else minus.css('border', '1px solid #ccc');
                if (!answer.val()) {
                    validation = false;
                    answer.css('border', '1px solid #ff544a');
                    if (!focus) {
                        answer.focus();
                    }
                } else answer.css('border', '1px solid #ccc');
                return validation;

            }
        };
        form_submit = {
            insert_question: function (dis) {
                debugger;
                let category_id = $(`#category_id`).val(),
                    exam_id = $(`#exam_id`).val(),
                    subject_id = $(`#subject_id`).val(),
                    question = CKEDITOR.instances.question.getData(),
                    hindi = CKEDITOR.instances.hindi.getData(),
                    option_1 = $(`#option_1`).val(),
                    option_2 = $(`#option_2`).val(),
                    option_3 = $(`#option_3`).val(),
                    option_4 = $(`#option_4`).val(),
                    answer = $(`#answer`).data('value'),
                    marks = $(`#marks`).val(),
                    minus = $(`#minus`).val(),
                    id = $(`#id`).val();

                $.ajax({
                    url: '{{route('exam.question.insert.update')}}',
                    type: 'post',
                    data: {
                        category_id,
                        exam_id,
                        subject_id,
                        question,
                        hindi,
                        option_1,
                        option_2,
                        option_3,
                        option_4,
                        answer,
                        marks,
                        minus,
                        id
                    },
                    beforeSend: function () {
                        $(dis).attr('disabled', true);
                    },
                    success: function (response) {
                        $(dis).attr('disabled', false);
                        if (response.success === true) {
                            if (response.submit_type === 'update') {
                                window.close();
                                {{--window.location.replace('{{route('exam.question.list')}}')--}}
                            } else {
                                CKEDITOR.instances.question.setData('');
                                CKEDITOR.instances.hindi.setData('');
                                $(`#option_1`).val('');
                                $(`#option_2`).val('');
                                $(`#option_3`).val('');
                                $(`#option_4`).val('');
                                $(`#answer`).val('');
                                $(`#answer`).data('value', '');
                                $(`.radio`).each(function () {
                                    $(this).prop('checked', false);
                                });
                            }

                        } else {
                            if (response.type === 'validation') {
                                $.alert('Validation error');
                                console.log(response.data);
                            } else {
                                console.log(response);
                            }

                        }
                    }
                });
            }
        }

    </script>
@stop