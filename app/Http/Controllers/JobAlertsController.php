<?php

namespace App\Http\Controllers;

use App\ExamCategory;
use App\JobAlert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class JobAlertsController extends Controller
{
    //todo: Index list
    function jobalerts_index(Request $request)
    {
        try {
            $category = ExamCategory::orderBy('category', 'asc')->get();
            return view('Backend.JobAlerts.index', ['category' => $category]);
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }

    function jobalerts_get_list(Request $request)
    {
        try {
            $category = decrypt($request->category_id);
            $list = JobAlert::where('category_id', $category)->orderBy('id', 'desc')->get();
            $view = view('Backend.JobAlerts.list', ['jobs' => $list])->render();
            return ['success' => true, 'view' => $view];
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }

    function jobalerts_create(Request $request)
    {
        try {
            $category = ExamCategory::orderBy('category', 'asc')->get();
            return view('Backend.JobAlerts.create', ['category' => $category]);
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }

    function jobalerts_store_update(Request $request)
    {
//        return $request->all();
        try {
            $validate = Validator::make($request->all(), [
                'category_id' => ['required'],
                'job_title' => ['required'],
                'qualification' => ['required'],
                'syllabus' => ['required'],
                'start_date' => ['required', 'date'],
                'end_date' => ['required', 'date'],
//                'apply_link' => ['required'],
                'description' => ['required'],
            ]);
            if ($validate->fails()) {
                return back()->withInput()->withErrors($validate);
            } else {
                $category_id = $request->category_id;
                $job_title = $request->job_title;
                $qualification = $request->qualification;
                $syllabus = $request->syllabus;
                $start_date = $request->start_date;
                $end_date = $request->end_date;
                $apply_link = $request->apply_link;
                $description = $request->description;
                $id = decrypt($request->id);
                $slug = Str::slug($job_title, '-');
                if ($id) {
                    $findOld = JobAlert::find($id);
                    $findOld->category_id = $category_id;
                    $findOld->job_title = $job_title;
                    $findOld->slug = $slug;
                    $findOld->qualification = $qualification;
                    $findOld->syllabus = $syllabus;
                    $findOld->start_date = $start_date;
                    $findOld->end_date = $end_date;
                    $findOld->apply_link = $apply_link;
                    $findOld->description = $description;
                    $findOld->save();
                    return redirect()->route('jobalerts.index')->with('success', 'Job alert updated');
                } else {
                    $findSlug = JobAlert::whereNull('deleted_at')->where('slug', $slug)->first();
                    if ($findSlug) {
                        return back()->with('error', 'Title is already exist')->withInput();
                    } else {
                        $newJob = new JobAlert();
                        $newJob->category_id = $category_id;
                        $newJob->job_title = $job_title;
                        $newJob->slug = $slug;
                        $newJob->qualification = $qualification;
                        $newJob->syllabus = $syllabus;
                        $newJob->start_date = $start_date;
                        $newJob->end_date = $end_date;
                        $newJob->apply_link = $apply_link;
                        $newJob->description = $description;
                        $newJob->save();
                        return back()->with('success', 'Job alert created');
                    }

                }
            }
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }

    function jobalerts_edit(Request $request)
    {
        $id = $request->id;
        $data = JobAlert::find(decrypt($id));
        $category = ExamCategory::orderBy('category', 'asc')->get();
        return view('Backend.JobAlerts.create', ['jobs' => $data, 'category' => $category]);
    }

    function jobalerts_delete(Request $request)
    {
        try {
            $id = decrypt($request->id);
            JobAlert::find($id)->delete();
            return ['success' => true, 'message' => 'Deleted'];
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }

    function client_jobalert_index(Request $request)
    {
        try {
            $jobs = JobAlert::orderBy('id', 'desc')->paginate(15);
            return view('clientside.jobalert', ['jobs' => $jobs]);
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }

    function client_jobalert_detail(Request $request,$slug)
    {
        try {
//            $id = $request->id;
            $job_detail = JobAlert::where('slug',$slug)->first();
            return view('clientside.jobalertviewdeatil', ['job_detail' => $job_detail]);
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }
}
