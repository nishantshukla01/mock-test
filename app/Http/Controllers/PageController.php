<?php

namespace App\Http\Controllers;

use App\Exam;
use App\JobAlert;
use Illuminate\Http\Request;

class PageController extends Controller
{
    function index(Request $request)
    {
        $mockTest = Exam::orderBy('id', 'desc')->get();
        $jobs = JobAlert::orderBy('id', 'desc')->get();
        return view('clientside.index', ['mockTest' => $mockTest, 'jobs' => $jobs]);
    }
}
