@extends('clientside.Master.main')
@section('title','Job Alerts')
@section('content')
    <div class="container-fluid my-5">
        <div class="row">
            <div class="col-sm-9">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Qualification</th>
                        <th scope="col">Syllabus</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">Last Date</th>
                        <th scope="col">Option</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($jobs)>0)
                        @foreach($jobs as $index =>$list)
                            <tr>
                                <th scope="row">{{$index+1}}</th>
                                <td>{{$list->job_title}}</td>
                                <td>{{$list->qualification}}</td>
                                <td>{{$list->syllabus}}</td>
                                <td>{{\Carbon\Carbon::parse($list->start_date)->format('M, d-Y')}}</td>
                                <td>{{\Carbon\Carbon::parse($list->end_date)->format('M, d-Y')}}</td>
                                <td><a href="{{route('client.jobalert.details',['slug'=>$list->slug])}}">View Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="7">No jobs details available</th>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="col-sm-3">
                <div class="advertisement_section">
                    <img src="https://s0.2mdn.net/9294460/LMS_APAC_TOFU_Static_IN_OTIS_MemberstatbyCountry_300x250.jpg"
                         alt="adevertisement"/>

                </div>

            </div>
        </div>

    </div>
@stop
