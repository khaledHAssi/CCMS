<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RelationController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\AnswerMarksController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AvailableTimeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EvaluationAnswerController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\NotifyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TestAPI;
use App\Http\Controllers\user_dash\companyManager\ManagerApplicationController;
use App\Http\Controllers\user_dash\companyManager\ManagerAvailableTimeController;
use App\Http\Controllers\user_dash\companyManager\ManagerCourseController;
use App\Http\Controllers\user_dash\companyManager\ManagerCompanyController;
use App\Http\Controllers\user_dash\companyManager\ManagerExpertController;
use App\Http\Controllers\user_dash\companyManager\ManagerUsersController;
use App\Http\Controllers\user_dash\doctor\DashboardDoctorController;
use App\Http\Controllers\user_dash\supervisor\supervisorCourseController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

// Route::get('/profile', [RelationController::class , 'profile']);
Route::prefix(LaravelLocalization::setLocale())->group(function () {


    Route::prefix('admin')->middleware(['auth', 'verified', 'check_admin'])->name('admin.')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
        Route::post('/settings', [AdminController::class, 'settings_store'])->name('settings_store');

        Route::get('companies/trash', [CompanyController::class, 'trash'])->name('companies.trash');
        Route::get('companies/{id}/restore', [CompanyController::class, 'restore'])->name('companies.restore');
        Route::delete('companies/{id}/forcedelete', [CompanyController::class, 'forcedelete'])->name('companies.forcedelete');
        Route::resource('companies', CompanyController::class);
        Route::resource('courses', CourseController::class);
        Route::resource('tasks', TaskController::class);
        Route::resource('answers', AnswerController::class);
        Route::resource('answer_marks', AnswerMarksController::class);
        Route::resource('experts', ExpertController::class);
        Route::resource('evaluation', EvaluationController::class);
        Route::resource('evaluationAnswer', EvaluationAnswerController::class);

        Route::resource('AvailableTimes', AvailableTimeController::class);
        Route::resource('users', UserController::class);
        Route::resource('courses', CourseController::class);
        Route::get('users/sknlk/slkngjo/ksda/{id}', [UserController::class, 'show']);
    });

    Route::resource('applications', ApplicationController::class);

    Route::prefix('user_dash')->middleware(['auth', 'verified'])->name('user_dash.')->group(function () {
        // if (Auth::user()->type=="companyManager"){
        Route::prefix('/cm')->name('cm')->middleware('check_companyManager')->group(function () {
            Route::get('/', [ManagerCompanyController::class, 'index'])->name('index');
            // Route::get('/master', [ManagerCompanyController::class, 'master'])->name('master');
            Route::resource('Users', ManagerUsersController::class);
            Route::resource('AvailableTimes', ManagerAvailableTimeController::class);
            Route::get('/AvailableTimes/createWithId/{id}', [ManagerAvailableTimeController::class, 'createWithId'])->name('AvailableTimes.createWithId');
            Route::resource('Courses', ManagerCourseController::class);
            Route::resource('Company', ManagerCompanyController::class);
            Route::resource('Experts', ManagerExpertController::class);
            Route::resource('Applications', ManagerApplicationController::class);
            Route::get('course_details', [ManagerCourseController::class, 'course_details'])->name('course_details');

        });
    // }

        Route::prefix('supervisor')->name('supervisor.')->middleware('check_supervisor')->group(function () {

            Route::resource('sApplications', ManagerApplicationController::class);
            Route::resource('', supervisorCourseController::class);
            Route::get('/master', [supervisorCourseController::class, 'master'])->name('master');
            Route::get('/sCourses', [supervisorCourseController::class, 'courses'])->name('sCourses');
            Route::get('/sCourse_details', [supervisorCourseController::class, 'course_details'])->name('sCourse_details');
        });
        Route::prefix('doctor')->name('doctor.')->group(function () {
            Route::resource('/dash', DashboardDoctorController::class);
            Route::get('dash/expert/index', [DashboardDoctorController::class, 'expertIndex'])->name('dash.expertIndex');
            Route::get('dash/expert/create', [DashboardDoctorController::class, 'expertCreate'])->name('dash.expertCreate');
            Route::post('dash/expert/', [DashboardDoctorController::class, 'expertStore'])->name('dash.expertStore');
            Route::get('dash/expert/edit/{dash}', [DashboardDoctorController::class, 'expertEdit'])->name('dash.expertEdit');
            Route::put('dash/expert/{dash}', [DashboardDoctorController::class, 'expertUpdate'])->name('dash.expertUpdate');
            Route::delete('dash/expert/{dash}', [DashboardDoctorController::class, 'expertDestroy'])->name('dash.expertDestroy');
            Route::get('dash/availableTime/index', [DashboardDoctorController::class, 'availableTimeIndex'])->name('dash.AvailableTimeIndex');
            Route::post('dash/availableTimeStore/', [DashboardDoctorController::class, 'availableTimeStore'])->name('dash.availableTimeStore');
            Route::get('dash/availableTime/Create/{id}', [DashboardDoctorController::class, 'availableTimeCreate'])->name('dash.availableTimeCreate');
            Route::put('dash/availableTimeUpdate/{dash}', [DashboardDoctorController::class, 'availableTimeUpdate'])->name('dash.availableTimeUpdate');
            Route::get('dash/availableTime/edit/{dash}', [DashboardDoctorController::class, 'availableTimeEdit'])->name('dash.AvailableTimeEdit');
            Route::delete('dash/availableTime/{dash}', [DashboardDoctorController::class, 'availableTimeDestroy'])->name('dash.availableTimeDestroy');

    });
    });
    //change ftms to example name
    Route::name('ftms.')->group(function () {
        Route::get('/', [SiteController::class, 'index'])->name('index');
        Route::get('/company/{id}', [SiteController::class, 'company'])->name('company');
        Route::get('/company/course/{id}', [SiteController::class, 'course'])->name('course');
        Route::post('/company/course/{id}', [SiteController::class, 'course_apply'])->name('course_apply');
        Route::get('/company/course/cancel/{id}', [SiteController::class, 'course_cancel'])->name('course_cancel');
        Route::get('expert/{id}', [SiteController::class, 'expert'])->name('expert');
        Route::post('book-time', [SiteController::class, 'book_time'])->name('book_time');
        Route::get('book-time-status/{id}', [SiteController::class, 'book_time_status'])->name('book_time_status');
        Route::get('site-profile', [SiteController::class, 'site_profile'])->name('site_profile');
        Route::get('Authentication-Error', [SiteController::class, 'authError'])->name('AuthenticateError');
        Route::post('site-profile/update-user', [ProfileController::class, 'update_user_profile'])->name('site-profile.update_user_profile');
        Route::post('site-profile/update-profile', [ProfileController::class, 'update_profile'])->name('site-profile.update_profile');
    });

    Route::get('send-notify', [NotifyController::class, 'send']);
    Route::get('notify/{id}', [NotifyController::class, 'notify'])->name('mark-read');
    Route::get('read-notify', [NotifyController::class, 'read'])->name('ReadNotification');
    Auth::routes(['verify' => true]);

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');



    // Route::prefix('user-dash')->middleware(['auth', 'verified', 'check_user'])->name('user_dash.')->group(function () {
    //     Route::get('/', [AdminController::class, 'index'])->name('index');
    // });
});




Route::get('posts_api', [TestAPI::class, 'posts_api']);
