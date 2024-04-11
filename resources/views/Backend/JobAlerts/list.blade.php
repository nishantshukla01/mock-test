<table class="table table-hover table-font table-head-fixed text-nowrap">
    <thead>
    <tr>
        <th width="5%">#</th>
        <th width="30%">Title</th>
        <th width="20%">Qualification</th>
        <th width="21%">Syllabus</th>
        <th width="8%">Start Date C</th>
        <th width="8%">End Date</th>
        <th width="8%">Option</th>
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
                <td>
                    <a class="text-primary edit_this mx-1"
                       href="{{route('jobalerts.edit',['id'=>encrypt($list->id)])}}"
                       type="button"><i class="far fa-edit" aria-hidden="true"></i>
                    </a>
                    <a class="text-danger delete_this mx-1"
                       id="{{--delete_btn--}}"
                       onclick="delete_jobs(this,'{{encrypt($list->id)}}')"
                       type="button"><i
                                class="far fa-trash-alt" aria-hidden="true"></i>
                    </a>
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