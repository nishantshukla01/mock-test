@extends('Backend.Master.main')
@section('title','Dashboard')
<style type="text/css">
    .exam-logo {
        width: 80px;
        height: 80px;
    }
    tr td{
        vertical-align: middle !important;
    }
</style>
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Exam Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Validation</li>
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
                        <div class="card-body table-responsive p-0" style="max-height: 600px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Logo</th>
                                    <th>Option</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($exam_category)>0)
                                    @foreach($exam_category as $index => $list)
                                        <tr>
                                            <td>{{$index+1}}</td>
                                            <td>{{$list->category}}</td>
                                            <td>
                                                <div class="exam-logo">
                                                    <img class="w-100 h-100"
                                                         src="{{url(\Illuminate\Support\Facades\Storage::url($list->logo))}}"/>

                                                </div>
                                            </td>
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
                            <h3 class="card-title" id="edit_title">Insert Exam category </h3>
                            <a href="javascript:void(0);" class="text-danger float-right cancel_this"
                               style="display: none;"><i class="fas fa-times"></i></a>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="post" action="{{route('category.exam.insert.update')}}"
                              id="quickForm" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-sm-7">
                                        <label for="category">Category</label>
                                        <input type="text" name="category" class="form-control" id="category"
                                               placeholder="Enter category">
                                    </div>
                                    <div class="form-group col-sm-5">
                                        <label for="logo">Upload logo</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="logo" name="logo">
                                                <label class="custom-file-label" for="exampleInputFile">Choose
                                                    file</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-8">
                                        <div class="exam-logo">
                                            <img class="w-100" id="logo_image"
                                                 src="{{asset('img/img1470917301523-57-rs.png')}}">
                                        </div>
                                    </div>
                                    <input type="hidden" id="id" name="id"/>
                                    <div class="form-group col-sm-4" style="margin-top: 31px;">
                                        <button type="submit" class="btn btn-primary w-100" id="submit">Save</button>
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
                    url: '{{route('category.exam.edit')}}',
                    type: 'get',
                    data: {id},
                    beforeSend: function () {

                    },
                    success: function (response) {
                        if (response.success === true) {
                            $(`#category`).val(response.data.category);
                            $(`#logo_image`).attr('src', response.src);
                            $(`#id`).val(response.data.id);
                            $(`#submit`).text('Update');
                            $(`#edit_title`).text('Edit Category');
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
                                url: '{{route('category.exam.delete')}}',
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
                $(`#category`).val('');
                $(`#id`).val('');
                $(`#submit`).text('Save');
                $(`#edit_title`).text('Insert Exam category');
                $(this).fadeOut();
            })
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();

                reader.onload = function (e) {
                    $('#logo_image').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#logo").change(function () {
            readURL(this);
        });
    </script>
@stop