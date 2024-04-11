<?php

namespace App\Http\Controllers;

use App\ExamResult;
use App\Payment;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //todo: sendOTP
    function sendOTP(Request $request)
    {
        try {
            $mobile = $request->mobile;
            $otp = rand(1000, 9999);
            $ifexist = User::where('mobile', $mobile)->first();
            if ($ifexist) {
                $ifexist->update(['otp' => $otp]);
            } else {
                $newUser = new User();
                $newUser->mobile = $mobile;
                $newUser->otp = $otp;
                $newUser->save();
            }
            return ['success' => true, 'message' => 'OTP send successfully', 'data' => $otp];
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }

    function verify(Request $request)
    {
        try {
            $mobile = $request->mobile;
            $otp = $request->otp;
            $old_info = 1;
            $check = User::where(['mobile' => $mobile, 'otp' => $otp])->first();
            if ($check) {
                $check->update(['last_login' => Carbon::now(), 'otp' => null]);
                $name = $check->name;
                if ($name == null) {
                    $old_info = 0;
                }
                Auth::loginUsingId($check->id, 1);
                return ['success' => true, 'message' => 'You are successfully login', 'data' => $old_info];
            } else {
                return ['success' => false, 'message' => 'Verification fail try again'];
            }
//            return ['success' => true, 'message' => 'successfully', 'data' => $data];
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }

    function details(Request $request)
    {
        try {
            $validate = Validator::make($request->all(), [
                'name' => ['required'],
                'email' => ['required', 'email', Rule::unique('users', 'email')]
            ]);
            if ($validate->fails()) {
                return ['success' => false, 'validation' => $validate];
            } else {
                $id = Auth::id();
                User::find($id)->update(['name' => $request->name, 'email' => $request->email]);
                return ['success' => true, 'message' => 'Information successfully saved'];
            }

        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }

    function logout(Request $request)
    {
        try {
            Auth::logout();
            return redirect()->route('index');
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }

    function dashboard(Request $request)
    {
        try {
            return view('clientside.userdashboard.dashboard');
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }

    function setting(Request $request)
    {
        try {
//            if (Auth::user()->name) {
//                $explodeName = explode(' ', Auth::user()->name);
//                if (count($explodeName) == 3) {
//                    $fname = $explodeName[0] . ' ' . $explodeName[1];
//                    $lname = $explodeName[3];
//                } else {
//                }
//            }
            return view('clientside.userdashboard.userprofile');
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }

    function profile_update(Request $request)
    {
        try {
//            return $request->all();
            $validate = Validator::make($request->all(), [
                'name' => ['required'],
                'email' => ['required', 'email', Rule::unique('users', 'email')->ignore(Auth::id())],
            ]);
            if ($validate->fails()) {
                return $validate;
                return back()->withInput()->withErrors($validate);
            } else {
                $id = Auth::id();
                User::find($id)->update(['name' => $request->name, 'email' => $request->email, 'address' => $request->address]);
                return back()->with('success', 'Profile Updated');
            }
//                return ['success' => true, 'message' => 'successfully', 'data' => $data];
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }

    function profile_image(Request $request)
    {
        try {
            $validate = Validator::make($request->all(), [
                'image' => ['required', 'image', 'max:2000']
            ]);
            if ($validate->fails()) {
                return ['success' => false, 'message' => 'Image should be a valid image and not more than 2000kb'];
            } else {
                if ($request->file('image')) {
                    $user = Auth::user();
                    Storage::disk('public')->delete($user->image);
                    $path = $request->file('image')->store('user-image/' . $user->id, 'public');
                    User::find($user->id)->update(['image' => $path]);
                    return ['success' => true, 'message' => 'Image uploaded'];
                }
            }
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }

    function package(Request $request)
    {
        try {
            $packages = Payment::where(['user_id' => Auth::id(), 'status' => 'completed'])->orderBy('id', 'desc')->get();
            return view('clientside.userdashboard.package',['packages'=>$packages]);
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }

    function old_mocktest(Request $request)
    {
        try {
            $oldTest = ExamResult::where(['user_id' => Auth::id(), 'status' => 'Completed'])->orderBy('id', 'desc')->get();
            return view('clientside.userdashboard.oldTest', ['oldTest' => $oldTest]);
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error ', 'exception' => $exception->getMessage()];
            //            return redirect()->back()->with('error', 'Server error');
        }
    }

}
