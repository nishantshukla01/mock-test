@extends('clientside.Master.main')
@section('title','Mock Test')
@section('content')
    <div class="container-fluid my-5">
        <div class="row">
            <div class="col-sm-2 position-relative">
                <div class="side_bar_menu position-stkiy">
                    <div class="headeing_section_side_bar">
                        <h4 class="text-light">Mock Test</h4>
                    </div>
                    <div class="menu_section">
                        <ul>
                            <li id="li_0" class="active">
                                <a href="javascript:void(0);" class="thisAct text-dark "> All Test</a>
                            </li>
                            @if(count($all_category)>0)
                                @foreach($all_category as $cat_index =>$list)
                                    <li class="" id="li_{{$cat_index+1}}">
                                        <a href="javascript:void(0);" data-id="{{encrypt($list->id)}}"
                                           class="thisAct text-dark">{{$list->category}}</a>
                                    </li>
                                @endforeach
                            @endif

                        </ul>
                    </div>
                </div>

            </div>
            <div class="col-sm-10 px-0 product-height" id="filterDiv">
                <!-- <div class="section-title text-left mt-0 mb-2">
                    <h2>Live <span>Classes</span></h2>
                </div> -->

            </div>
        </div>
    </div>
    {{--<div class="top_modal modal fade" id="file_attechment_project" role="dialog" aria-labelledby="myModalLabel"--}}
         {{--aria-hidden="true">--}}

        {{--<div class="modal-dialog modal-fluid modal-top" role="document">--}}


            {{--<div class="modal-content ">--}}
                {{--<div class="modal-header">--}}
                    {{--<h4 class="modal-title w-100">Title of the project</h4>--}}
                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                        {{--<span aria-hidden="true">&times;</span>--}}
                    {{--</button>--}}
                {{--</div>--}}
                {{--<div class="modal-body">--}}
                    {{--<iframe src="https://www.w3docs.com/uploads/media/default/0001/01/540cb75550adf33f281f29132dddd14fded85bfc.pdf"--}}
                            {{--class="pdf_section">--}}
                    {{--</iframe>--}}
                {{--</div>--}}

            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <script type="text/javascript">
        $(document).ready(function () {
            filterTest($(`#li_0`), '{{encrypt(0)}}');
            $(`.thisAct`).click(function () {
                let id = $(this).data('id');
                filterTest(this, id);
            });
        });

        function filterTest(dis, id) {
            debugger;
            $.ajax({
                url: '{{route('client.mocktest.filter')}}',
                type: 'get',
                data: {id},
                beforeSend: function () {
                    $(`#filterDiv`).html(`<div class="text-center"><div class="loadingio-spinner-double-ring-dha81j8088"><div class="ldio-261da2114dki"><div></div><div></div><div><div></div></div><div><div></div></div></div></div></div>`)
                },
                success: function (response) {
                    if (response.success === true) {
                        $(`#filterDiv`).html(response.view);
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
