<?php

namespace App\Http\Controllers;

use App\ExamCategory;
use App\SubjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class MasterController extends Controller
{
    function exam_category_index(Request $request)
    {
        try {
            $allCategory = ExamCategory::orderBy('category', 'asc')->get();
            return view('Backend.Exams.examCategory', ['exam_category' => $allCategory]);
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }

    function exam_category_insert(Request $request)
    {
        try {
//            return $request->all();
            $validate = Validator::make($request->all(), [
                'category' => ['required', Rule::unique('exam_categories', 'category')->ignore($request->id)],
                'logo' => [Rule::requiredIf(!$request->id), 'max:2048', 'image']
            ]);
            if ($validate->fails()) {
//                return ['success' => false, 'type' => 'validation', 'data' => $validate];
                return redirect()->back()->withInput()->withErrors($validate);
            } else {
                $id = $request->id;
                $category = $request->category;
                $message = '';
                if ($id) {
                    if ($request->file('logo')) {
                        $path = $request->file('logo')->store('examCategory/logo', 'public');
                        ExamCategory::find($id)->update(['category' => $category, 'logo' => $path]);
                    } else {
                        ExamCategory::find($id)->update(['category' => $category]);
                    }

                    $message = 'Updated successfully';
                } else {
                    $insertData = new ExamCategory();
                    $insertData->category = $category;
                    $path = $request->file('logo')->store('examCategory/logo', 'public');
                    $insertData->logo = $path;
                    $insertData->save();
                    $message = 'Category created';
                }
                return back()->with('success', $message);
            }
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }

    function exam_category_edit(Request $request)
    {
        try {
            $id = decrypt($request->id);
            $category = ExamCategory::find($id);
            $src = url(Storage::url($category->logo));
//            $view = view('Backend.Exams.examCategoryEdit', ['editData' => $category])->render();
            return ['success' => true, 'data' => $category, 'src' => $src];
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }

    function exam_category_delete(Request $request)
    {
        try {
            $id = decrypt($request->id);
            ExamCategory::find($id)->delete();
            return ['success' => true, 'message' => 'Successfully deleted'];
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }

    function subject_category_index(Request $request)
    {
        try {
            $allCategory = SubjectCategory::orderBy('subject_category', 'asc')->get();
            return view('Backend.Subject.subjectCategory', ['exam_subject' => $allCategory]);
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }

    function subject_category_insert(Request $request)
    {
        try {
            $validate = Validator::make($request->all(), [
                'subject_category' => ['required', Rule::unique('subject_categories', 'subject_category')->ignore($request->id)],
            ]);
            if ($validate->fails()) {
                return redirect()->back()->withInput()->withErrors($validate);
            } else {
                $id = $request->id;
                $subject_category = $request->subject_category;
                $message = '';
                if ($id) {
                    SubjectCategory::find($id)->update(['subject_category' => $subject_category]);
                    $message = 'Updated successfully';
                } else {
                    $insertData = new SubjectCategory();
                    $insertData->subject_category = $subject_category;
                    $insertData->save();
                    $message = 'Subject created';
                }
                return back()->with('success', $message);
            }
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
//            return redirect()->back()->with('error', 'Server error');
        }
    }

    function subject_category_edit(Request $request)
    {
        try {
            $id = decrypt($request->id);
            $category = SubjectCategory::find($id);
//            $view = view('Backend.Exams.examCategoryEdit', ['editData' => $category])->render();
            return ['success' => true, 'data' => $category];
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
//            return redirect()->back()->with('error', 'Server error');
        }
    }

    function subject_category_delete(Request $request)
    {
        try {
            $id = decrypt($request->id);
            SubjectCategory::find($id)->delete();
            return ['success' => true, 'message' => 'Successfully deleted'];
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
//            return redirect()->back()->with('error', 'Server error');
        }
    }
}
