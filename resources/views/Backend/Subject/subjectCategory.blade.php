@extends('Backend.Master.main')
@section('title','Dashboard')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Exam Subject</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Exam subject</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6" id="listRefresh">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">List</h3>
                        </div>
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Subject</th>
                                    <th>Option</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($exam_subject)>0)
                                    @foreach($exam_subject as $index => $list)
                                        <tr>
                                            <td>{{$index+1}}</td>
                                            <td>{{$list->subject_category}}</td>
                                            <td><a href="javascript:void(0);" data-id="{{encrypt($list->id)}}"
                                                   class="text-info edit_it mx-2">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                <a href="javascript:void(0);" data-id="{{encrypt($list->id)}}"
                                                   class="text-danger delete_it">
                                                    <i class="far fa-trash-alt"></i>
                                                </a></td>
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
                <div class="col-md-6">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title" id="edit_title">Insert Subject</h3>
                            <a href="javascript:void(0);" class="text-danger float-right cancel_this"
                               style="display: none;"><i class="fas fa-times"></i></a>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="post" action="{{route('category.subject.insert.update')}}"
                              id="quickForm">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-sm-8">
                                        <label for="category">Subject</label>
                                        <input type="text" name="subject_category" class="form-control" id="subject_category"
                                               placeholder="Enter subject">
                                    </div>
                                    <input type="hidden" name="id" id="id" value="">
                                    <div class="form-group col-sm-4" style="margin-top: 31px;">
                                        <button type="submit" class="btn btn-primary" id="submit">Save</button>
                                    </div>
                                </div>
                            </div>

                        </form>
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
            $(`.edit_it`).click(function () {
                let id = $(this).attr('data-id');
                $.ajax({
                    url: '{{route('category.subject.edit')}}',
                    type: 'get',
                    data: {id},
                    beforeSend: function () {

                    },
                    success: function (response) {
                        if (response.success === true) {
                            $(`#subject_category`).val(response.data.subject_category);
                            $(`#id`).val(response.data.id);
                            $(`#submit`).text('Update');
                            $(`#edit_title`).text('Edit Subject');
                            $(`.cancel_this`).fadeIn();

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
                                url: '{{route('category.subject.delete')}}',
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
            $(`.cancel_this`).click(function () {
                $(`#subject_category`).val('');
                $(`#id`).val('');
                $(`#submit`).text('Save');
                $(`#edit_title`).text('Insert Subject');
                $(this).fadeOut();
            })
        });
    </script>
@stop