<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    function dashboard(Request $request)
    {
        try {
            return view('Backend.dashboard');
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }
    function login_admin(Request $request)
    {
        try {
            $credentials = $request->only('username', 'password');
            if (Auth::guard('admin')->attempt($credentials, 1)) {

                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->back()->with('error', 'Wrong Username or Password');
            }
        } catch (\Exception $exception) {
            return ['success' => false, 'exception' => $exception->getMessage()];
        }
    }

//    function dashboard(Request $request)
//    {
//        try {
//            return view('AdminPanel.dashboard');
//        } catch (\Exception $exception) {
//            return ['success' => false, 'exception' => $exception->getMessage()];
//        }
//    }

    function logout_admin(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    function encrypt_This(Request $request, $value)
    {
        try {
            if ($value) {
                $hash = Hash::make($value);
                return ['success' => true, 'data' => $hash];
            }
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
        }
    }
}
