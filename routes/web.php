<?php
use App\Programme;
use App\CenterFaculty;
use App\Company;
use App\MentorRegistration;
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

Route::get('/', function () {
    return view('welcome2');
});
Route::get('/test', 'ProgrammeController@func');

/**
 * Route for CBIEV Staff with prefix 'staff'
 * Add route tied to staff prefix into this route group
 */
Route::prefix('staff')->group(function(){

    /**
     * Route for staff dashboard/home  
     */
    Route::get('/', 'CBIEVStaffController@showStaffHome')->name('staff.home');
    Route::get('/home', 'CBIEVStaffController@showStaffHome')->name('staff.home.2');
    Route::get('/home2', 'HomeController@index2')->name('staff.home.2');

    /**
     * Route for staff login 
     */
    Route::get('/login', 'Auth\CBIEVStaff\LoginController@showLoginForm')->name('staff.login');
    Route::post('/login', 'Auth\CBIEVStaff\LoginController@login')->name('staff.login.submit');

    /**
     * Route for staff logout
     */
    Route::get('/logout', 'Auth\CBIEVStaff\LoginController@logout')->name('staff.logout');

    /**
     * Route for staff request reset password 
     */
    Route::post('password/email','Auth\CBIEVStaff\ForgotPasswordController@sendResetLinkEmail')->name('staff.password.email');
    Route::get('password/email','Auth\CBIEVStaff\ForgotPasswordController@showLinkRequestForm')->name('staff.password.request');

    /**
     * Route for staff reset password 
     */
    Route::post('password/reset','Auth\CBIEVStaff\ResetPasswordController@reset')->name('staff.password.update');
    Route::get('password/reset/{token}','Auth\CBIEVStaff\ResetPasswordController@showResetForm')->name('staff.password.reset');

    Route::prefix('registration')->group(function(){
        Route::prefix('project')->group(function(){
            Route::get('/', 'Registration\StaffProjectRegistrationController@showProjectRegistrationList')->name('project.registration.list');
            Route::get('{id}', 'Registration\StaffProjectRegistrationController@showProjectRegistrationDetail')->name('project.registration.detail');
            Route::post('start/approval/{id}/{stage}','ProjectRegistrationStatusTrackingController@startApprovalProcess')->name('project.regisration.approval.start');
        });
        Route::prefix('mentor')->group(function(){
            Route::get('/', 'Registration\StaffMentorRegistrationController@showMentorRegistrationList')->name('mentor.registration.list');
            Route::get('{id}', 'Registration\StaffMentorRegistrationController@showMentorRegistrationDetail')->name('mentor.registration.detail');
            Route::post('start/approval/{id}/{stage}','MentorRegistrationStatusTrackingController@startApprovalProcess')->name('mentor.regisration.approval.start');
        });
        Route::prefix('investor')->group(function(){
            Route::get('/', 'Registration\StaffInvestorRegistrationController@showInvestorRegistrationList')->name('investor.registration.list');
            Route::get('{id}', 'Registration\StaffInvestorRegistrationController@showInvestorRegistrationDetail')->name('investor.registration.detail');
            Route::post('start/approval/{id}/{stage}','InvestorRegistrationStatusTrackingController@startApprovalProcess')->name('investor.regisration.approval.start');
        });
    });
});

Route::prefix('registration')->group(function(){
    Route::prefix('isparkproject')->group(function(){
        Route::get('', 'ProjectRegistrationController@showRegistrationPage')->name('project.registration.show');
        Route::post('', 'ProjectRegistrationController@submitRegistration')->name('project.registration.submit');

        Route::get('login', 'Auth\ProjectRegistration\LoginController@showLoginForm')->name('project.registration.login');
        Route::post('login', 'Auth\ProjectRegistration\LoginController@login')->name('project.registration.login.submit');
        Route::get('logout', 'Auth\ProjectRegistration\LoginController@logout')->name('pr.temp.logout');
        Route::get('home', 'PRTempAccountController@home')->name('pr.temp.home');
        Route::post('home', 'PRTempAccountController@update')->name('pr.temp.registration.update');
        Route::get('updateComplete', 'PRTempAccountController@updateComplete')->name('pr.temp.update.complete');
    });
   

Route::prefix('isparkmentor')->group(function(){   
        Route::get('', 'MentorRegistrationController@showRegistrationForm')->name('mentor.registration.show');
        Route::post('', 'MentorRegistrationController@saveRegistration')->name('mentor.registration.submit');
        Route::post('/terminate/{id}', 'MentorRegistrationController@terminateRegistration')->name('mentor.registration.terminate');

        Route::get('login', 'Auth\MRTempAccount\LoginController@showLoginForm')->name('mentor.temp.registration.login');
        Route::post('login', 'Auth\MRTempAccount\LoginController@login')->name('mentor.temp.registration.login.submit');
        Route::get('logout', 'Auth\MRTempAccount\LoginController@logout')->name('mentor.temp.logout');
        Route::get('home', 'MRTempAccountController@home')->name('mentor.temp.home');
        Route::post('home', 'MRTempAccountController@update')->name('mentor.temp.registration.update');
        Route::get('updateComplete', 'PRTempAccountController@updateComplete')->name('mentor.temp.update.complete');
    });
    Route::prefix('isparkinvestor')->group(function(){
        Route::get('', 'InvestorRegistrationController@showRegistrationForm')->name('investor.registration.show');
        Route::post('', 'InvestorRegistrationController@saveRegistration')->name('investor.registration.submit');
    });

    Route::get('success','ProjectRegistrationController@success')->name('registration.redirect');
});

/**
 * Route for iSpark project with prefix 'project'
 * Add route tied to staff prefix into this route group
 */
Route::prefix('get')->group(function(){
        Route::get('/programmes/{faculty}/{level}', 'ProjectMemberController@getProgramme');

        Route::get('/department', function(){
            return CenterFaculty::all()->pluck('name');
        })->name('get.department');
        Route::get('/departmentcode', function(){
            return CenterFaculty::all()->pluck('code');
        })->name('get.department.code');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// project
Route::get('/project/rec/{type}/{recID}','RecommendationController@projectRecommendation')->name('project.recommendation.get');
Route::post('/project/rec/post','RecommendationController@saveRecommendation')->name('project.recommendation.post');

Route::get('/project/rec/manager/{type}/{recID}','RecommendationController@projectRecommendation')->name('project.recommendation.manager.get');
Route::post('/project/rec/manager/post','RecommendationController@saveRecommendation')->name('project.recommendation.manager.post');

Route::get('/project/app/director/{recID}','PRDirectorApprovalController@showApprovalForm')->name('project.approval.get');
Route::post('/project/app/director/post','PRDirectorApprovalController@saveApproval')->name('project.approval.post');
// mentor
Route::get('/mentor/rec/{recID}','MRDeanHeadRecommendationController@showRecommendationForm')->name('mentor.recommendation.dean.head.get');
Route::post('/mentor/rec/post','MRDeanHeadRecommendationController@saveRecommendation')->name('mentor.recommendation.dean.head.post');

Route::get('/mentor/rec/manager/{recID}','MRManagerRecommendationController@showRecommendationForm')->name('mentor.recommendation.manager.get');
Route::post('/mentor/rec/manager/post','MRManagerRecommendationController@saveRecommendation')->name('mentor.recommendation.manager.post');

Route::get('/mentor/app/director/{recID}','MRDirectorApprovalController@showApprovalForm')->name('mentor.approval.get');
Route::post('/mentor/app/director/post','MRDirectorApprovalController@saveApproval')->name('mentor.approval.post');
// investor
Route::get('/investorRegis/rec/manager/{recID}','IRManagerRecommendationController@showRecommendationForm')->name('investor.recommendation.manager.get');
Route::post('/investorRegis/rec/manager/post','IRManagerRecommendationController@saveRecommendation')->name('investor.recommendation.manager.post');

Route::get('/investorRegis/app/director/{appID}','IRDirectorApprovalController@showApprovalForm')->name('investor.approval.get');
Route::post('/investorRegis/app/director/post','IRDirectorApprovalController@saveApproval')->name('investor.approval.post');


Route::prefix('isparkproject')->group(function(){   
    Route::get('/fileList/{id}','ProjectUploadLogController@viewFile')->name('project.file.list');
    Route::post('/fileUpload/{id}', 'ProjectUploadLogController@storeUpload')->name('project.file.upload');
});


Route::get('test33', 'EmailController@test');
Route::get('test32', function () {
    return view('form.registration.redirect');
});