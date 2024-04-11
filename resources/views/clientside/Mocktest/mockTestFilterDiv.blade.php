@if(count($filter)>0)
    <div class="row mx-0">
        @foreach($filter as $filter_ind => $item)
            <?php
            $completed = \App\ExamResult::where(['user_id' => \Illuminate\Support\Facades\Auth::id(), 'exam_id' => $item->id, 'status' => 'Completed'])->first();
            ?>
            <div class="product_block">
                <a class="flex pointer flex-shrink-0 flex-column ba br2 b--very-light-gray
                    mr3 free-mock-card ph2 pv3 link start">
                    <div class="image_circle">
                        <img class="w2-5 h2-5 center lazyloaded"
                             src="{{url(\Illuminate\Support\Facades\Storage::url($item->Categories->logo))}}">
                    </div>

                    <p class="font_paraghaph">{{$item->exam_name}}</p>
                    <span class="free_text"><i class="fa fa-inr mr-2"
                                               aria-hidden="true"></i>{{number_format($item->exam_cost,2)}}</span>
                    <ul class="list_inner">
                        <li class=" flex gray"><span class="mr-2">•</span><span class="mr-2">Questions</span><span
                                    class="ml-auto fw7">{{$item->total_question}}</span></li>
                        <li class="flex gray f7"><span class="mr-2">•</span><span class="mr-2">Time</span><span
                                    class="ml-auto fw7">{{$item->total_time}}</span></li>
                        <li class="flex gray f7"><span class="mr-2">•</span><span class="mr-2">Maximum Marks</span><span
                                    class="ml-auto fw7">{{$item->total_mark}}</span></li>
                    </ul>
                    @if(\Illuminate\Support\Facades\Auth::check())
                        {{--@if(isset($completed))--}}
                            {{--<a href="{{route('client.mocktest.result',['id'=>encrypt($completed->id)])}}" type="button"--}}
                               {{--class="btn attempt-button py-1 m-0" target="_blank">Get result</a>--}}
                        {{--@else--}}
                            <a href="{{route('client.mocktest.attempt',['slug'=>$item->slug])}}" type="button"
                               class="btn attempt-button py-1 m-0">Attempt
                                now</a>
                        {{--@endif--}}
                    @else
                        <a href="javascript:void(0);" class="btn attempt-button py-1 m-0" type="button" data-toggle="modal" data-target="#loginform">Attempt now</a>
                    @endif

                </a>
            </div>
        @endforeach
    </div>
@else
    <div class="text-center">
        <h3>No Test Available</h3>
    </div>
@endif