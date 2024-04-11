<?php

namespace App\Http\Controllers;

use App\Exam;
use App\ExamCategory;
use App\ExamInstruction;
use App\ExamQuestion;
use App\SubjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;


class ExamController extends Controller
{
    //todo: index
    function exam_index(Request $request)
    {
        try {
            $category = ExamCategory::orderBy('category', 'asc')->get();
            $data = Exam::orderBy('created_at', 'desc')->get();
            return view('Backend.Exams.createExam', ['exams' => $data, 'category' => $category]);
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }

    //todo: insert update
    function exam_insert_update(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'category_id' => ['required'],
            'exam_name' => ['required'],
            'total_mark' => ['required', ''],
            'total_question' => ['required'],
//            'total_time' => ['required'],
            'hours' => ['required'],
            'minutes' => ['required'],
            'exam_cost' => ['required'],
        ]);
        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
        } else {
//            return $request;
            $category_id = $request->category_id;
            $exam_name = $request->exam_name;
            $total_mark = $request->total_mark;
            $total_question = $request->total_question;
            $hours = str_pad($request->hours, 2, 0, STR_PAD_LEFT);
            $minutes = str_pad($request->minutes, 2, 0, STR_PAD_LEFT);
            $exam_cost = $request->exam_cost;
            $id = $request->id;
            $total_time = str_pad($hours, 2, 0, STR_PAD_LEFT) . ':' . str_pad($minutes, 2, 0, STR_PAD_LEFT) . ':' . '00';
            $message = '';
            $slug = Str::slug($exam_name, '-');
            if ($id) {
                Exam::find($id)->update([
                    'category_id' => $category_id,
                    'exam_name' => $exam_name,
                    'total_mark' => $total_mark,
                    'total_question' => $total_question,
                    'total_time' => $total_time,
                    'exam_cost' => $exam_cost,
                    'slug' => $slug
                ]);
                $message = 'Exam Updated Successfully';
            } else {
                $find_slug = Exam::where('slug', $slug)->first();
                if ($find_slug) {
                    return back()->withInput()->with('error', 'Exam Already created');
                } else {
                    $create = new Exam();
                    $create->category_id = $category_id;
                    $create->exam_name = $exam_name;
                    $create->total_mark = $total_mark;
                    $create->total_question = $total_question;
                    $create->total_time = $total_time;
                    $create->exam_cost = $exam_cost;
                    $create->slug = $slug;
                    $create->save();
                    $message = 'Exam Created Successfully';
                }


            }
            return back()->with('success', $message);
        }
    }

    function exam_edit(Request $request)
    {
        try {
            $id = decrypt($request->id);
            $data = Exam::find($id);
            if ($data) {
                $hours = explode(':', $data->total_time)[0];
                $minutes = explode(':', $data->total_time)[1];
                return ['success' => true, 'data' => $data, 'hours' => $hours, 'minutes' => $minutes, 'id' => $data->id];
            }

        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }

    function exam_delete(Request $request)
    {
        try {
            $id = decrypt($request->id);
            Exam::find($id)->delete();
            return ['success' => true, 'message' => 'Successfully deleted'];
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }

    function exam_question_index(Request $request)
    {
        try {
            $category = ExamCategory::orderBy('category', 'asc')->get();
            $subjects = SubjectCategory::orderBy('subject_category', 'asc')->get();
            return view('Backend.Exams.examQuestion', ['category' => $category, 'subjects' => $subjects]);

        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }

    function exam_question_edit(Request $request, $id)
    {
        try {
            $category = ExamCategory::orderBy('category', 'asc')->get();
            $subjects = SubjectCategory::orderBy('subject_category', 'asc')->get();
            $question = ExamQuestion::find($id);
            $exams = Exam::where(['category_id' => $question->QuestionExams->category_id])->get();
            return view('Backend.Exams.examQuestion', ['category' => $category, 'subjects' => $subjects, 'editQuestion' => $question, 'exams' => $exams]);
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }

    function exam_question_insertupdate(Request $request)
    {
        try {

            $validate = Validator::make($request->all(), [
                'category_id' => ['required'],
                'exam_id' => ['required'],
                'subject_id' => ['required'],
                'question' => [Rule::requiredIf($request->hindi == '')],
                'hindi' => [Rule::requiredIf($request->question == '')],
                'option_1' => ['required'],
                'option_2' => ['required'],
                'option_3' => ['required'],
                'option_4' => ['required'],
                'answer' => ['required'],
                'marks' => ['required'],
                'minus' => ['required'],
            ]);
            if ($validate->fails()) {
                return ['success' => false, 'type' => 'validation', 'data' => $validate];
            } else {
//                $category_id = decrypt($request->category_id);
                $exam_id = $request->exam_id;
                $subject_id = decrypt($request->subject_id);
                $question = $request->question;
                $hindi = $request->hindi;
                $option_1 = $request->option_1;
                $option_2 = $request->option_2;
                $option_3 = $request->option_3;
                $option_4 = $request->option_4;
                $answer = $request->answer;
                $marks = $request->marks;
                $minus = $request->minus;
                if ($request->id) {
                    $newQuestion = ExamQuestion::find($request->id);
//                $newQuestion->category_id = $category_id;
                    $newQuestion->exam_id = $exam_id;
                    $newQuestion->subject_id = $subject_id;
                    $newQuestion->question = $question;
                    $newQuestion->hindi = $hindi;
                    $newQuestion->opt_1 = $option_1;
                    $newQuestion->opt_2 = $option_2;
                    $newQuestion->opt_3 = $option_3;
                    $newQuestion->opt_4 = $option_4;
                    $newQuestion->answer = $answer;
                    $newQuestion->mark = $marks;
                    $newQuestion->minus = $minus;
                    $newQuestion->save();
                    return ['success' => true, 'submit_type' => 'update', 'message' => 'Question Updated'];
                } else {
                    $getExam = Exam::find($exam_id);
                    $countQuestion = ExamQuestion::where('exam_id', $exam_id)->count();
                    if ($getExam->total_question < $countQuestion) {
                        $newQuestion = new ExamQuestion();
//                $newQuestion->category_id = $category_id;
                        $newQuestion->exam_id = $exam_id;
                        $newQuestion->subject_id = $subject_id;
                        $newQuestion->question = $question;
                        $newQuestion->hindi = $hindi;
                        $newQuestion->opt_1 = $option_1;
                        $newQuestion->opt_2 = $option_2;
                        $newQuestion->opt_3 = $option_3;
                        $newQuestion->opt_4 = $option_4;
                        $newQuestion->answer = $answer;
                        $newQuestion->mark = $marks;
                        $newQuestion->minus = $minus;
                        $newQuestion->save();
                        return ['success' => true, 'submit_type' => 'insert', 'message' => 'Question inserted successfully'];
                    } else {
                        return ['success' => false, 'submit_type' => 'insert', 'message' => 'Questions no exceeded from assign total question in this exam'];
                    }
                }

            }
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }

    function exam_question_list(Request $request)
    {
        try {
            $category = ExamCategory::orderBy('category', 'asc')->get();
            $subjects = SubjectCategory::orderBy('subject_category', 'asc')->get();
            return view('Backend.Exams.examQuestionList', ['category' => $category, 'subjects' => $subjects]);
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }

    function exam_instruction_index(Request $request)
    {
        try {
            $id = decrypt($request->id);
            $instruction = ExamInstruction::where('exam_id', $id)->first();
            $view = view('Backend.Exams.instructionDiv', ['instruction' => $instruction, 'id' => $id])->render();
            return ['success' => true, 'view' => $view];
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }

    function exam_instruction(Request $request)
    {
        try {
            $validate = Validator::make($request->all(), [
                'instruction' => 'required',
                'id' => 'required'
            ]);
            if ($validate->fails()) {
                return back()->withInput()->withErrors($validate);
            } else {
                $instruction = $request->instruction;
                $exam_id = decrypt($request->id);
                $up_id = $request->up_id;
                if ($up_id) {
                    $store = ExamInstruction::find($up_id);
                    $store->instruction = $instruction;
                    $store->exam_id = $exam_id;
                    $store->save();
                    return back()->with('success', 'Instruction saved');
                } else {
                    $store = new ExamInstruction();
                    $store->instruction = $instruction;
                    $store->exam_id = $exam_id;
                    $store->save();
                    return back()->with('success', 'Instruction saved');
                }
            }
            return ['success' => true, 'message' => 'successfully', 'data' => $data];
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
//            return redirect()->back()->with('error', 'Server error');
        }
    }

    function exam_question_delete(Request $request)
    {
        try {
            $id = decrypt($request->id);
            ExamQuestion::find($id)->delete();
            return ['success' => true, 'message' => 'Question deleted'];
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }
}
