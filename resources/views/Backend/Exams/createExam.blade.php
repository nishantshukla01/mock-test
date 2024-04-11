@extends('Backend.Master.main')
@section('title','Dashboard')
<style>
    .colon {
        position: relative;
        font-size: 35px;
        font-weight: 500;
        bottom: 10px;
    }

</style>
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Exam</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create exam</li>
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
                            <h3 class="card-title">List</h3>
                            <a href="javascript:void(0);" data-show="create" data-hide="list"
                               class="btn btn-outline-warning btn-sm float-right display_this"><i
                                        class="fas fa-plus mr-2"></i> Create new</a>
                        </div>
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Exam Name</th>
                                    <th>Total Mark</th>
                                    <th>Total Question</th>
                                    <th>Total Time</th>
                                    <th>Exam Cost</th>
                                    <th>Option</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($exams)>0)
                                    @foreach($exams as $index => $list)
                                        <tr>
                                            <td>{{$index+1}}</td>
                                            <td>{{$list->Categories->category}}</td>
                                            <td>{{$list->exam_name}}</td>
                                            <td>{{$list->total_mark}}</td>
                                            <td>{{str_pad($list->total_question,2,0,STR_PAD_LEFT)}}</td>
                                            <td>{{$list->total_time}}</td>
                                            <td>{{number_format($list->exam_cost,2)}}</td>
                                            <td><a href="javascript:void(0);" data-id="{{encrypt($list->id)}}"
                                                   class="text-info edit_it mx-2">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                <a href="javascript:void(0);" data-id="{{encrypt($list->id)}}"
                                                   class="text-danger delete_it">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                                <a href="javascript:void(0);" data-id="{{encrypt($list->id)}}"
                                                   class="text-success instruction mx-2">
                                                    <i class="fas fa-info-circle"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <th colspan="3">No Data</th>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-12 col-sm-12 d-none" id="create">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title" id="edit_title">Create New Exam </h3>
                            <a href="javascript:void(0);" data-show="list" data-hide="create"
                               class="btn btn-outline-danger btn-sm float-right display_this"><i
                                        class="fas fa-times mr-2"></i> Cancel</a>
                        </div>

                        <form role="form" method="post" action="{{route('exam.insert.update')}}"
                              id="quickForm">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-sm-3">
                                        <label for="category_id" class=" col-form-label">Category</label>
                                        <div class="col-sm-12">
                                            <select class="form-control select2bs4" id="category_id" name="category_id"
                                                    style="width: 100%;">
                                                @if(count($category)>0)
                                                    <option>Select</option>
                                                    @foreach($category as $cat_index =>$item)
                                                        <option value="{{$item->id}}">{{$item->category}}</option>
                                                    @endforeach
                                                @endif

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-9">
                                        <label for="exam_name" class=" col-form-label">Exam Name</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="exam_name" id="exam_name"
                                                   placeholder="Exam name">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="total_mark" class=" col-form-label">Total Mark</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="total_mark" id="total_mark"
                                                   placeholder="Total mark">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="total_question" class=" col-form-label">Total question</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="total_question"
                                                   id="total_question" placeholder="Total Question">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="total_time" class=" col-form-label">Total Time</label>
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="hours" id="hours"
                                                       placeholder="Hours">
                                            </div>
                                            <div class="col-sm-1">
                                                <span class="colon">:</span>
                                            </div>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="minutes" id="minutes"
                                                       placeholder="Minutes">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="exam_cost" class=" col-form-label">Exam Cost</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="exam_cost" id="exam_cost"
                                                   placeholder="Total cost">
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" id="id" value="">

                                </div>
                                <div class="form-group text-center ">
                                    <hr/>
                                    <button type="submit" class="btn btn-primary w-25" id="submit">Create</button>
                                </div>
                            </div>

                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-12 col-sm-12 d-none" id="instruction">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title" id="edit_instruction">Instruction</h3>
                            <a href="javascript:void(0);" data-show="list" data-hide="instruction"
                               class="btn btn-outline-danger btn-sm float-right display_this"><i
                                        class="fas fa-times mr-2"></i> Cancel</a>
                        </div>
                        <div id="instruction_div">

                        </div>

                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <script type="text/javascript">
        $(document).ready(function () {
            // $(`#submit`).click(function (e) {
            //     e.preventDefault();
            //     $(this).attr('disabled', true);
            //     $(`#quickForm`).submit();
            // });
            $(`.display_this`).click(function () {
                let show = $(this).data('show'),
                    hide = $(this).data('hide');
                $(`#${show}`).removeClass('d-none');
                $(`#${hide}`).addClass('d-none');
                $(`#category_id`).val('');
                $(`#exam_name`).val('');
                $(`#total_mark`).val('');
                $(`#total_question`).val('');
                $(`#hours`).val('');
                $(`#minutes`).val('');
                $(`#exam_cost`).val('');
                $(`#id`).val('');
                $(`#submit`).text('Save');
                $(`#edit_title`).text('Create New Exam');

            });

            $(`.edit_it`).click(function () {
                let id = $(this).attr('data-id');
                $.ajax({
                    url: '{{route('exam.edit')}}',
                    type: 'get',
                    data: {id},
                    beforeSend: function () {

                    },
                    success: function (response) {
                        if (response.success === true) {
                            $(`#list`).addClass('d-none');
                            $(`#create`).removeClass('d-none');
                            $(`#category_id`).val(response.data.category_id);
                            $(`#category_id option[value='2']`).attr('selected', 'selected');
                            $(`#exam_name`).val(response.data.exam_name);
                            $(`#total_mark`).val(response.data.total_mark);
                            $(`#total_question`).val(response.data.total_question);
                            $(`#hours`).val(response.hours);
                            $(`#minutes`).val(response.minutes);
                            $(`#exam_cost`).val(response.data.exam_cost);
                            $(`#id`).val(response.id);
                            $(`#submit`).text('Update');
                            $(`#edit_title`).text('Edit Exam');
                            // $(`.cancel_this`).fadeIn();

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
            $(`.delete_it`).click(function () {
                let id = $(this).attr('data-id'),
                    dis = $(this);
                $.confirm({
                    title: 'Confirm!',
                    content: 'Are you sure?',
                    buttons: {
                        confirm: function () {
                            $.ajax({
                                url: '{{route('exam.delete')}}',
                                type: 'post',
                                data: {id},
                                beforeSend: function () {

                                },
                                success: function (response) {
                                    if (response.success === true) {
                                        $(dis).closest("tr").remove();
                                        $.alert({
                                            icon: 'fa fa-check',
                                            title: 'Success!',
                                            content: response.message,
                                            type: 'green'
                                        });

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
                        },
                        cancel: function () {

                        },

                    }
                });

            });
            $(`.instruction`).click(function () {
                let id = $(this).data('id');
                $.ajax({
                    url: '{{route('exam.instruction.index')}}',
                    type: 'get',
                    data: {id},
                    beforeSend: function () {
                        $(this).attr('disabled', true);
                    },
                    success: function (response) {
                        $(this).attr('disabled', false);
                        if (response.success === true) {
                            $(`#list`).addClass('d-none');
                            $(`#instruction`).removeClass('d-none');
                            $(`#instruction_div`).html(response.view);
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
    </script>
@stop