<?php

namespace App\Http\Controllers;

use App\Exam;
use App\ExamCategory;
use App\ExamQuestion;
use App\ExamResult;
use App\ExamResultDetail;
use App\User;
use Carbon\Carbon;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MockTestController extends Controller
{
    //todo: Index
    function index(Request $request)
    {
        try {
            $all_category = ExamCategory::orderBy('category', 'asc')->get();
            return view('clientside.Mocktest.mockTestIndex', ['all_category' => $all_category]);
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }

    function filter(Request $request)
    {
        try {
            $id = decrypt($request->id);
            if ($id == 0) {
                $filter = Exam::orderBy('id', 'desc')->get();
            } else {
                $filter = Exam::where('category_id', $id)->orderBy('id', 'desc')->get();
            }
            $view = view('clientside.Mocktest.mockTestFilterDiv', ['filter' => $filter])->render();
            return ['success' => true, 'view' => $view];
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }

    function attempt(Request $request, $slug)
    {
        try {
//            $id = decrypt($request->id);

            $detail = Exam::where('slug', $slug)->first();
            $category_test = Exam::where('category_id', $detail->category_id)->where('id', '!=', $detail->id)->limit(5)->orderBy('id', 'desc')->get();
            return view('clientside.Mocktest.mockTestAttempt', ['mockDetail' => $detail, 'category_test' => $category_test]);
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }

    function attempt_by_user(Request $request, $slug)
    {
        DB::beginTransaction();
        try {
            $user_id = Auth::id();
//            $id = decrypt($request->id);
            $exam = Exam::where('slug', $slug)->first();
            $old_data = ExamResult::where(['user_id' => $user_id, 'exam_id' => $exam->id])->first();
            if (isset($old_data)) {
                $question_master = $old_data;
                $questions = ExamResultDetail::where('exam_result_id', $old_data->id)->orderBy('question_no', 'asc')->get();
                $answered = ExamResultDetail::where(['exam_result_id' => $old_data->id])->whereNotNull('answer')->orderBy('question_no', 'asc')->count();
                $not_answered = ExamResultDetail::where(['exam_result_id' => $old_data->id, 'result' => 'skip'])->count();
                $visited = ExamResultDetail::where(['exam_result_id' => $old_data->id, 'visited' => 1])->count();
                $not_visited = ExamResultDetail::where(['exam_result_id' => $old_data->id, 'visited' => 0])->count();
                return view('clientside.Mocktest.AttemptTest.initiate', ['question_master' => $question_master, 'questions' => $questions, 'answered' => $answered, 'not_answered' => $not_answered, 'not_visited' => $not_visited, 'visited' => $visited, 'slug' => $slug]);
            } else {
                $exam_master = $exam;
                $exam_details = ExamQuestion::where('exam_id', $exam->id)->orderBy('subject_id', 'asc')->get();
                $exam_result = new ExamResult();
                $exam_result->user_id = $user_id;
                $exam_result->exam_id = $exam_master->id;
                $exam_result->total_time = $exam_master->total_time;
                $exam_result->save();
                if (count($exam_details) > 0)
                    foreach ($exam_details as $index => $item) {
                        $exam_result_detail = new ExamResultDetail();
                        $exam_result_detail->user_id = $user_id;
                        $exam_result_detail->exam_result_id = $exam_result->id;
                        $exam_result_detail->exam_id = $exam_master->id;
                        $exam_result_detail->question_id = $item->id;
                        $exam_result_detail->mark = $item->mark;
                        $exam_result_detail->minus = $item->minus;
                        $exam_result_detail->question_no = $index + 1;
                        $exam_result_detail->save();
                    }
                DB::commit();
                $answered = 0;
                $not_answered = 0;
                $not_visited = 0;
                $visited = 0;
                $question_master = ExamResult::find($exam_result->id);
                $questions = ExamResultDetail::where('exam_result_id', $exam_result->id)->orderBy('question_no', 'asc')->get();

                return view('clientside.Mocktest.AttemptTest.initiate', ['question_master' => $question_master, 'questions' => $questions, 'answered' => $answered, 'not_answered' => $not_answered, 'not_visited' => $not_visited, 'visited' => $visited, 'slug' => $slug]);
            }

//            return ['success' => true, 'message' => 'successfully', 'data' => $data];
        } catch (\Exception $exception) {
            DB::rollBack();
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }

    function start_mocktest(Request $request)
    {
        try {
            $id = decrypt($request->id);
            $q_no = decrypt($request->q_no);
//            $questions = ExamResultDetail::where('exam_result_id', $id)->orderBy('question_no', 'asc')->get();
            $questions = ExamResultDetail::where(['exam_result_id' => $id, 'question_no' => $q_no])->orderBy('question_no', 'asc')->first();
            $count = ExamResultDetail::where('exam_result_id', $id)->orderBy('question_no', 'asc')->count();
            $mast = ExamResult::find($id);
            if (session()->has('timer')) {
                $sessionData = session()->get('timer');
                $initial_time = $sessionData['initial_time'];
                $end_time = $sessionData['end_time'];
                $current_time = Carbon::now('Asia/Kolkata')->format('H:i:s');
                $totalDuration = Carbon::parse($end_time)->diffInSeconds(Carbon::parse($current_time));
                $remain_time = gmdate('H:i:s', $totalDuration);
                $timer = [
                    "initial_time" => $initial_time,
                    "current_time" => $current_time,
                    "end_time" => $end_time,
                ];
                $hr = explode(':', $remain_time)[0];
                $min = explode(':', $remain_time)[1];
                $sec = explode(':', $remain_time)[2];
                session()->put('timer', $timer);
                $mast->update(['total_time' => $remain_time]);
            } else {
                $hr = explode(':', $mast->total_time)[0];
                $min = explode(':', $mast->total_time)[1];
                $sec = explode(':', $mast->total_time)[2];
                $initial_time = Carbon::now('Asia/Kolkata')->format('H:i:s');
                $current_time = $initial_time;
                $ending = strtotime("+" . $hr . " hour +" . $min . " minutes +" . $sec . " seconds ", strtotime($initial_time));
                $end_time = gmdate('h:i:s', $ending);
                $timer = [
                    "initial_time" => $initial_time,
                    "current_time" => $current_time,
                    "end_time" => $end_time,
                ];
                session()->put('timer', $timer);
            }

            $view = view('clientside.Mocktest.AttemptTest.questionDiv', ['data' => $questions, 'count' => $count])->render();
            return ['success' => true, 'index' => $q_no, 'view' => $view, 'hr' => $hr, 'min' => $min, 'sec' => $sec];
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }

    function storeMocktestAns(Request $request)
    {
        DB::beginTransaction();
        try {

            $sessionData = session()->get('timer');
            $initial_time = $sessionData['initial_time'];
            $end_time = $sessionData['end_time'];
            $last_current_time = Carbon::parse($sessionData['current_time']);
            $current_time = Carbon::now('Asia/Kolkata')->format('H:i:s');
            $spent_time = gmdate('H:i:s', Carbon::parse($current_time)->diffInSeconds(Carbon::parse($last_current_time)));
            $totalDuration = Carbon::parse($end_time)->diffInSeconds(Carbon::parse($current_time));
            $remain_time = gmdate('H:i:s', $totalDuration);
            $timer = [
                "initial_time" => $initial_time,
                "current_time" => $current_time,
                "end_time" => $end_time,
            ];
            session()->put('timer', $timer);
            $id = decrypt($request->id);
            $ans = $request->ans;
            $answer = ExamResultDetail::find($id);
            if ($ans != null || $ans != '') {
                if ($answer->ExamQuestionData->answer == $ans) {
                    $result = 'true';
                } else {
                    $result = 'false';
                }
            } else {
                $result = 'skip';
            }
            $answer->update(['visited' => 1, 'time_spent' => $spent_time, 'answer' => $ans, 'result' => $result]);
            $count = $answer->ExamResultMast->ExamResults->count();
            $total_attempt = ExamResultDetail::where(['exam_result_id' => $answer->exam_result_id, 'visited' => 1])->count();
            $answer->ExamResultMast->update(['total_time' => $remain_time, 'total_attempt' => $total_attempt, 'current_question' => $answer->question_no + 1]);
            DB::commit();
            $hr = explode(':', $remain_time)[0];
            $min = explode(':', $remain_time)[1];
            $sec = explode(':', $remain_time)[2];
            $question = ExamResultDetail::where(['exam_result_id' => $answer->exam_result_id, 'question_no' => $answer->question_no + 1])->orderBy('question_no', 'asc')->first();
            if ($question) {
                $view = view('clientside.Mocktest.AttemptTest.questionDiv', ['data' => $question, 'count' => $count])->render();
                return ['success' => true, 'index' => $answer->question_no + 1, 'view' => $view, 'hr' => $hr, 'min' => $min, 'sec' => $sec];
            } else {
                return ['success' => true, 'index' => $answer->question_no + 1, 'finish' => true, 'hr' => $hr, 'min' => $min, 'sec' => $sec];
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }

    function previousQuestion(Request $request)
    {
        try {
            $id = decrypt($request->qId);
            $qno = $request->qNo;
            $remain_time = $request->hr_store . ':' . $request->min_store . ':' . $request->sec_store;
            $question_no = ExamResultDetail::find($id);
            $p_question_no = $qno - 1;
            $question = ExamResultDetail::where(['exam_result_id' => $question_no->exam_result_id, 'question_no' => $p_question_no])->first();
            $question->ExamResultMast->update(['current_question' => $p_question_no, 'total_time' => $remain_time]);
            $count = ExamResultDetail::where('exam_result_id', $question_no->exam_result_id)->count();
            $view = view('clientside.Mocktest.AttemptTest.questionDiv', ['data' => $question, 'count' => $count])->render();
            $hr = 0;
            $min = 0;
            $sec = 0;
            return ['success' => true, 'index' => $p_question_no, 'view' => $view, 'hr' => $hr, 'min' => $min, 'sec' => $sec];

        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }

    function mockTestResult(Request $request, $slug, $id)
    {
        try {
//            $id = decrypt($request->id);
//            return $slug;
            $exam_id = Exam::where('slug', $slug)->first();
            $user = User::find($id);
            $mock_test_id = ExamResult::where(['user_id' => $id, 'exam_id' => $exam_id->id])->first();
            $correct = ExamResultDetail::where(['exam_result_id' => $mock_test_id->id, 'result' => 'true'])->orderBy('question_no', 'asc')->get();
            $wrong = ExamResultDetail::where(['exam_result_id' => $mock_test_id->id, 'result' => 'false'])->orderBy('question_no', 'asc')->get();
            $not_given = ExamResultDetail::where(['exam_result_id' => $mock_test_id->id, 'result' => 'skip'])->orderBy('question_no', 'asc')->get();
            $all = ExamResultDetail::where(['exam_result_id' => $mock_test_id->id])->orderBy('question_no', 'asc')->get();
            $result = (float)0;
            foreach ($all as $list) {
                if ($list->result === 'true') {
                    $result = $result + ((float)$list->mark);
                } elseif ($list->result === 'false') {
                    $result = $result - ((float)$list->minus);
                } else {
                    $result = $result + (float)0;
                }
            }
            return view('clientside.userdashboard.mockResult', ['all' => $all, 'user' => $user, 'correct' => $correct, 'wrong' => $wrong, 'not_given' => $not_given, 'result' => $result]);
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server Error', 'exception' => $exception->getMessage()];
        }
    }

    function clear_session()
    {
        session()->forget('timer');
        return ['success' => true];
    }


    //new
    function start_mocktest2(Request $request)
    {
        try {
            $id = decrypt($request->id);
            $q_no = decrypt($request->q_no);
//            $questions = ExamResultDetail::where('exam_result_id', $id)->orderBy('question_no', 'asc')->get();
            $questions = ExamResultDetail::where(['exam_result_id' => $id, 'question_no' => $q_no])->orderBy('question_no', 'asc')->first();
            $count = ExamResultDetail::where('exam_result_id', $id)->orderBy('question_no', 'asc')->count();
            $mast = ExamResult::find($id);
            $hr = explode(':', $mast->total_time)[0];
            $min = explode(':', $mast->total_time)[1];
            $sec = explode(':', $mast->total_time)[2];
            $view = view('clientside.Mocktest.AttemptTest.questionDiv', ['data' => $questions, 'count' => $count])->render();
            return ['success' => true, 'index' => $q_no, 'view' => $view, 'hr' => $hr, 'min' => $min, 'sec' => $sec];
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }

    function storeMocktestAns2(Request $request)
    {
        DB::beginTransaction();
        try {
            $id = decrypt($request->id);
            $ans = $request->ans;
            $remain_time = $request->hr_store . ':' . $request->min_store . ':' . $request->sec_store;
            $answer = ExamResultDetail::find($id);
            if ($ans != null || $ans != '') {
                if ($answer->ExamQuestionData->answer == $ans) {
                    $result = 'true';
                } else {
                    $result = 'false';
                }
            } else {
                $result = 'skip';
            }
            $answer->update(['visited' => 1, 'answer' => $ans, 'result' => $result]);
            $count = $answer->ExamResultMast->ExamResults->count();
            $total_attempt = ExamResultDetail::where(['exam_result_id' => $answer->exam_result_id, 'visited' => 1])->count();
            $current_question = $answer->question_no + 1;
            if ($current_question > $count) {
                $current_question = $count;
            }
            $answer->ExamResultMast->update(['total_time' => $remain_time, 'total_attempt' => $total_attempt, 'current_question' => $current_question]);
            DB::commit();
            $question = ExamResultDetail::where(['exam_result_id' => $answer->exam_result_id, 'question_no' => $answer->question_no + 1])->orderBy('question_no', 'asc')->first();
            if ($question) {
                $view = view('clientside.Mocktest.AttemptTest.questionDiv', ['data' => $question, 'count' => $count])->render();
                return ['success' => true, 'index' => $answer->question_no + 1, 'view' => $view, 'hr' => $request->hr_store, 'min' => $request->min_store, 'sec' => $request->sec_store];
            } else {
                return ['success' => true, 'index' => $answer->question_no + 1, 'finish' => true, 'hr' => $request->hr_store, 'min' => $request->min_store, 'sec' => $request->sec_store];
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }

    function submitMockTest(Request $request)
    {
        try {
            $id = decrypt($request->id);
            ExamResult::find($id)->update(['status' => 'Completed', 'is_active' => 1]);
            return ['success' => true, 'message' => 'Submitted'];
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }
}
