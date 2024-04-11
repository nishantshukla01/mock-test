<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
use Illuminate\Support\Facades\Storage;

Route::get('/', 'PageController@index')->name('index');
Route::get('mocktest', 'MockTestController@index')->name('client.mocktest.index');
Route::get('mocktest/filter', 'MockTestController@filter')->name('client.mocktest.filter');
Route::get('mocktest/{slug}', 'MockTestController@attempt')->name('client.mocktest.attempt');
Route::get('mocktest/attempt/{slug}', 'MockTestController@attempt_by_user')->name('user.mocktest.attempt.init');
//Route::post('mocktest/attempt/start', 'MockTestController@start_mocktest')->name('start.mocktest');
Route::post('mocktest/attempt/start', 'MockTestController@start_mocktest2')->name('start.mocktest');
//Route::post('mocktest/attempt/store', 'MockTestController@storeMocktestAns')->name('client.mocktest.store.ans');
Route::post('mocktest/attempt/store', 'MockTestController@storeMocktestAns2')->name('client.mocktest.store.ans');
Route::post('mocktest/attempt/previous', 'MockTestController@previousQuestion')->name('client.mocktest.previous');
Route::post('mocktest/submit', 'MockTestController@submitMockTest')->name('client.mocktest.submit');
Route::get('mocktest/{slug}/result/{id}', 'MockTestController@mockTestResult')->name('client.mocktest.result');
Route::get('clearsession', 'MockTestController@clear_session');
Route::post('user/sendotp', 'UserController@sendOTP')->name('send.otp');
Route::post('user/verify', 'UserController@verify')->name('otp.verify');
Route::post('user/details', 'UserController@details')->name('user.detail');
Route::get('user/logout', 'UserController@logout')->name('user.logout');
Route::view('courses', 'clientside.courses')->name('courses');
Route::view('viewdetail', 'clientside.view_cources')->name('view_cources');
Route::view('addtocart', 'clientside.addtocart')->name('addtocart');
Route::view('placeorder', 'clientside.place_order')->name('place_order');
Route::view('youtube', 'clientside.youtube')->name('youtube');
Route::get('jobalert', 'JobAlertsController@client_jobalert_index')->name('client.jobalert.index');
Route::get('jobalert/detail/{slug}', 'JobAlertsController@client_jobalert_detail')->name('client.jobalert.details');
//Route::view('jobalert/viewdetail', 'clientside.jobalertviewdeatil')->name('jobalertviewdeatil');
Route::view('successstory', 'clientside.successstory')->name('successstory');
Route::view('contact', 'clientside.contact')->name('contact');
Route::view('about', 'clientside.about')->name('about');
Route::view('package', 'clientside.packagedetail')->name('packagedetail');
Route::get('user/{username}/dashboard', 'UserController@dashboard')->name('user.dashboard');
Route::get('user/{username}/profile', 'UserController@setting')->name('user.profile');
Route::get('user/{username}/package', 'UserController@package')->name('user.package');
Route::post('profile/update', 'UserController@profile_update')->name('user.profile.update');
Route::post('profile/image', 'UserController@profile_image')->name('user.profile.image');
Route::get('user/{username}/old-mocktest', 'UserController@old_mocktest')->name('user.profile.old_test');
Route::get('purchase/init/test-{id}', 'PaymentController@createOrder')->name('user.mocktest.purchase');
Route::get('logout', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect()->route('index');
});

//Todo: Admin(backend) routes
Route::prefix('admin')->group(function () {
    Route::group(['middleware' => 'auth.admin'], function () {
        Route::view('/', 'Backend.login')->name('admin.login');
        Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');
        /*Exam category route*/
        Route::get('category/exam', 'MasterController@exam_category_index')->name('category.exam.index');
        Route::post('category/exam/insert/update', 'MasterController@exam_category_insert')->name('category.exam.insert.update');
        Route::get('category/exam/edit', 'MasterController@exam_category_edit')->name('category.exam.edit');
        Route::post('category/exam/delete', 'MasterController@exam_category_delete')->name('category.exam.delete');
        /*Subject*/
        Route::get('category/subject', 'MasterController@subject_category_index')->name('category.subject.index');
        Route::post('category/subject/insert/update', 'MasterController@subject_category_insert')->name('category.subject.insert.update');
        Route::get('category/subject/edit', 'MasterController@subject_category_edit')->name('category.subject.edit');
        Route::post('category/subject/delete', 'MasterController@subject_category_delete')->name('category.subject.delete');
        /*Exam*/
        Route::get('exam', 'ExamController@exam_index')->name('exam.index');
        Route::post('exam/insertupdate', 'ExamController@exam_insert_update')->name('exam.insert.update');
        Route::get('exam/edit', 'ExamController@exam_edit')->name('exam.edit');
        Route::post('exam/delete', 'ExamController@exam_delete')->name('exam.delete');
        Route::get('exam/instruction', 'ExamController@exam_instruction_index')->name('exam.instruction.index');
        Route::post('exam/instruction', 'ExamController@exam_instruction')->name('exam.store.instruction');
        /*Exam Questions*/
        Route::get('exam/question', 'ExamController@exam_question_index')->name('exam.question.index');
        Route::get('exam/question/{id}/edit', 'ExamController@exam_question_edit')->name('exam.question.edit');
        Route::get('exam/question/list', 'ExamController@exam_question_list')->name('exam.question.list');
        Route::post('exam/question/delete', 'ExamController@exam_question_delete')->name('exam.question.delete');
        Route::post('exam/question/insertupdate', 'ExamController@exam_question_insertupdate')->name('exam.question.insert.update');
        Route::get('get/exam', 'GetDataController@get_exam')->name('get.exams');
        Route::get('get/exam/question', 'GetDataController@get_exam_question')->name('get.exams.question');
        Route::get('get/exam/details', 'GetDataController@get_exam_details')->name('get.exams.details');
        /*Job Alerts*/
        Route::get('jobalerts', 'JobAlertsController@jobalerts_index')->name('jobalerts.index');
        Route::get('jobalerts/list', 'JobAlertsController@jobalerts_get_list')->name('jobalerts.get.list');
        Route::get('jobalerts/create', 'JobAlertsController@jobalerts_create')->name('jobalerts.create');
        Route::post('jobalerts/store/update', 'JobAlertsController@jobalerts_store_update')->name('jobalerts.store.update');
        Route::get('jobalerts/edit', 'JobAlertsController@jobalerts_edit')->name('jobalerts.edit');
        Route::post('jobalerts/delete', 'JobAlertsController@jobalerts_delete')->name('jobalerts.delete');
    });
    Route::post('login/process', 'AdminController@login_admin')->name('admin.login.process');
    Route::get('logout/process', 'AdminController@logout_admin')->name('admin.logout');

});
Route::view('payment', 'Paytm.createOrder');
Route::get('purchase/initiate', 'PaymentController@createOrder')->name('payment.order.create');
Route::post('payment/callback', 'PaymentController@paymentCallback')->name('payment.callback');
//\Illuminate\Support\Facades\View::composer(['*'], function ($view) {
//    $auth_user = [];
//    if (\Illuminate\Support\Facades\Auth::check()) {
//        $auth_user = \Illuminate\Support\Facades\Auth::user();
//    }
//    $view->with(['authUser' => $auth_user]);
//});

Route::get('delete-file', function () {
    $user = \Illuminate\Support\Facades\Auth::user();
    return ['success' => true];
});
