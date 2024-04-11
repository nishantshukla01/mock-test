@extends('Backend.Master.main')
@section('title','Create | Job Alerts')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Job Alerts</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create new</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title" id="edit_title">@if($jobs)Edit @else Create @endif</h3>
                    <a href="{{route('jobalerts.index')}}" data-show="list" data-hide="create"
                       class="btn btn-outline-warning btn-sm float-right display_this"><i
                                class="fas fa-list-ul mr-2"></i> List</a>
                </div>
                <form role="form" method="post" action="{{route('jobalerts.store.update')}}"
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
                                                <option value="{{$item->id}}"
                                                        @if(old('category_id') == $item->id || isset($jobs)?$jobs->category_id ==$item->id:'') selected @endif>{{$item->category}}</option>
                                            @endforeach
                                        @endif

                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-9">
                                <label for="job_title" class=" col-form-label">Title</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="job_title" id="job_title"
                                           @if(isset($jobs->job_title)) value="{{$jobs->job_title}}"
                                           @else value="{{old('job_title')}}" @endif
                                           placeholder="Job Title">
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="qualification" class=" col-form-label">Qualification</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" rows="2" name="qualification"
                                              id="qualification"
                                              placeholder="Qualification">@if(isset($jobs->qualification)){{$jobs->qualification}}@else{{old('qualification')}}@endif</textarea>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="syllabus" class=" col-form-label">Syllabus</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="syllabus"
                                              id="syllabus"
                                              placeholder="Syllabus">@if(isset($jobs->syllabus)){{$jobs->syllabus}}@else{{old('syllabus')}}@endif</textarea>
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="start_date" class=" col-form-label">Start Date</label>
                                <div class="col-sm-12">
                                    <input type="date" class="form-control" name="start_date" id="start_date"
                                           @if(isset($jobs->start_date)) value="{{$jobs->start_date}}"
                                           @else value="{{old('start_date')}}"
                                           @endif
                                           placeholder="Start Date">
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="end_date" class=" col-form-label">End Date</label>
                                <div class="col-sm-12">
                                    <input type="date" class="form-control" name="end_date" id="end_date"
                                           @if(isset($jobs->end_date)) value="{{$jobs->end_date}}"
                                           @else value="{{old('end_date')}}" @endif
                                           placeholder="End Date">
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="apply_link" class=" col-form-label">Apply link</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="apply_link" id="apply_link"
                                           @if(isset($jobs->apply_link)) value="{{$jobs->apply_link}}"
                                           @else value="{{old('apply_link')}}"
                                           @endif
                                           placeholder="Apply Link">
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="description" class=" col-form-label">Description</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control textarea" name="description"
                                              id="description"
                                              placeholder="Qualification">{!!isset($jobs->description)?$jobs->description:''!!}</textarea>
                                </div>
                            </div>
                            <input type="hidden" name="id" id="id"
                                   value="{{isset($jobs->id)?encrypt($jobs->id):encrypt('')}}">

                        </div>
                        <div class="form-group text-center ">
                            <hr/>
                            <button type="submit" class="btn btn-primary w-25" id="submit">@if($jobs) Update @else Create @endif</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        $(document).ready(function () {
            $(function () {
                // Summernote
                $('.textarea').summernote()
            })
        })
    </script>
@stop