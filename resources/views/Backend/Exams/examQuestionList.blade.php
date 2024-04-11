@extends('Backend.Master.main')
@section('title','Exam Question List')
<style type="text/css">
    .examDetailTxt {
        font-size: 20px;
        font-weight: 500;
    }
</style>
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Exam Questions List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Exam question list</li>
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
                            <h3 class="card-title">Question List</h3>
                            <a href="{{route('exam.question.index')}}" data-show="create" data-hide="list"
                               class="btn btn-outline-success btn-sm float-right display_this"><i
                                        class="fas fa-plus mr-2"></i> Create New</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-sm-2">
                                    <label for="category_id" class=" col-form-label">Category</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" id="category_id" name="category_id"
                                                style="width: 100%;">
                                            @if(count($category)>0)
                                                <option>Select</option>
                                                @foreach($category as $cat_index =>$item)
                                                    <option value="{{encrypt($item->id)}}">{{$item->category}}</option>
                                                @endforeach
                                            @endif

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-sm-2">
                                    <label for="exam_id" class=" col-form-label">Select Exam</label>
                                    <div class="col-sm-12">
                                        <select class="form-control select2bs4" id="exam_id" name="exam_id"
                                                style="width: 100%;">
                                            <option value="">Select category</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-sm-2">
                                    <label for="subject_id" class=" col-form-label">Subject</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" id="subject_id" name="subject_id"
                                                style="width: 100%;">
                                            @if(count($subjects)>0)
                                                <option value="{{encrypt("")}}">Select</option>
                                                @foreach($subjects as $subject_index =>$sub_item)
                                                    <option value="{{encrypt($sub_item->id)}}">{{$sub_item->subject_category}}</option>
                                                @endforeach
                                            @endif

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-sm-1">
                                    <div class="col-sm-12">
                                        <button type="button" class="btn btn-outline-primary w-100"
                                                style="margin-top: 37px;" id="searchData"><i
                                                    class="fas fa-search mr-1"> </i>Get
                                        </button>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div>
                                        <span class="examDetailTxt">Cost : </span><span id="exam_cost"
                                                                                        class="text-primary mx-2">0</span>
                                    </div>
                                    <div>
                                        <span class="examDetailTxt">Total Time : </span><span id="total_time"
                                                                                              class="text-primary mx-2">0</span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div>
                                        <span class="examDetailTxt">Total Question : </span><span id="question_total"
                                                                                                  class="text-primary mx-2">0</span>[<span
                                                id="question_created">0</span>]
                                    </div>
                                    <div>
                                        <span class="examDetailTxt">Total Mark : </span><span id="mark_total"
                                                                                              class="text-primary mx-2">0</span>[<span
                                                id="mark_created">0</span>]
                                    </div>
                                </div>
                                <div class="form-group col-sm-12" id="searchList">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        $(document).ready(function () {
            $(`#searchData`).click(function () {
                getSearchData(this);
            });
            $(`#exam_id`).change(function () {
                let exam_id = $(this).val();
                $.ajax({
                    url: '{{route('get.exams.details')}}',
                    type: 'get',
                    data: {exam_id},
                    beforeSend: function () {

                    },
                    success: function (response) {
                        if (response.success === true) {
                            $(`#exam_cost`).text(response.data.exam_cost);
                            $(`#question_total`).text(response.data.total_question);
                            $(`#mark_total`).text(response.data.total_mark);
                            $(`#total_time`).text(response.data.total_time);
                            let dis = $(`#searchData`);
                            getSearchData(dis);
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

        function getSearchData(dis) {
            let category_id = $(`#category_id`).val(),
                exam_id = $(`#exam_id`).val(),
                subject_id = $(`#subject_id`).val(),
                validation = true,
                message = '';
            if (!category_id) {
                validation = false;
                message = 'Select category';
            }
            if (!exam_id) {
                validation = false;
                message = 'Select exam'
            }
            if (validation) {
                $.ajax({
                    url: '{{route('get.exams.question')}}',
                    type: 'get',
                    data: {category_id, exam_id, subject_id},
                    beforeSend: function () {
                        $(dis).attr('disabled', true);
                        $(`#searchList`).html(`<div class="text-center"><div class="loadingio-spinner-double-ring-dha81j8088"><div class="ldio-261da2114dki"><div></div><div></div><div><div></div></div><div><div></div></div></div></div></div>`)
                    },
                    success: function (response) {
                        $(dis).attr('disabled', false);
                        if (response.success === true) {
                            $(`#searchList`).html();
                            $(`#question_created`).text(response.total_question);
                            $(`#mark_created`).text(response.mark_sum);
                            $(`#searchList`).html(response.view);

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

            }
            else {
                $.alert({
                    title: 'Required !',
                    type: 'orange',
                    content: message
                })
            }
        }

        function delete_question(dis, id) {
            $.confirm({
                title: 'Confirm!',
                content: 'Are you sure?',
                buttons: {
                    confirm: function () {
                        triggerDelete(id);
                    },
                    cancel: function () {
                    },

                }
            });
        }

        function triggerDelete(id) {
            $.ajax({
                url: '{{route('exam.question.delete')}}',
                type: 'post',
                data: {id},
                beforeSend: function () {

                },
                success: function (response) {
                    if (response.success === true) {
                        getSearchData(this);
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
        }
    </script>
@stop