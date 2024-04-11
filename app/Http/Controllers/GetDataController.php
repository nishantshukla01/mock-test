<?php

namespace App\Http\Controllers;

use App\Exam;
use App\ExamQuestion;
use Illuminate\Http\Request;

class GetDataController extends Controller
{
    //todo: Get exam
    function get_exam(Request $request)
    {
        try {
            $category_id = decrypt($request->category_id);
            $data = Exam::where('category_id', $category_id)->get();
            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }

    function get_exam_question(Request $request)
    {
        try {
            $category_id = decrypt($request->category_id);
            $exam_id = $request->exam_id;
            $subject_id = decrypt($request->subject_id);
            $mark_sum = ExamQuestion::where('exam_id', $exam_id)->sum('mark');
            $total_question = ExamQuestion::where('exam_id', $exam_id)->count('id');
            $data = ExamQuestion::where(['exam_id' => $exam_id])
                ->when($subject_id, function ($query, $subject_id) {
                    return $query->where('subject_id', $subject_id);
                })->groupBy('subject_id')->get('subject_id');
            $view = view('Backend.Exams.examQuestionListDiv', ['question_data' => $data, 'exam_id' => $exam_id])->render();
            return ['success' => true, 'view' => $view, 'mark_sum' => $mark_sum, 'total_question' => $total_question];
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }

    function get_exam_details(Request $request)
    {
        try {
            $exam_id = $request->exam_id;
            $data = Exam::find($exam_id);
            return ['success' => true, 'data' => $data];
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }
}
