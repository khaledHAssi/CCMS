<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RelationController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AvailableTimeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EvaluationAnswerController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\NotifyController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TestAPI;
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


    Route::prefix('admin')->middleware(['auth', 'verified', 'check_user'])->name('admin.')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
        Route::post('/settings', [AdminController::class, 'settings_store'])->name('settings_store');

    Route::get('companies/trash', [CompanyController::class, 'trash'])->name('companies.trash');
        Route::get('companies/{id}/restore', [CompanyController::class, 'restore'])->name('companies.restore');
        Route::delete('companies/{id}/forcedelete', [CompanyController::class, 'forcedelete'])->name('companies.forcedelete');
        Route::resource('companies', CompanyController::class);
        Route::resource('courses', CourseController::class);
        Route::resource('experts', ExpertController::class);
        Route::resource('evaluation',EvaluationController::class);
        Route::resource('evaluationAnswer',EvaluationAnswerController::class);

        Route::resource('AvailableTimes', AvailableTimeController::class);
        Route::resource('users', UserController::class);
        Route::resource('courses', CourseController::class);
        Route::get('users/sknlk/slkngjo/ksda/{id}', [UserController::class , 'show']);

    });
    Route::resource('applications',ApplicationController::class);


    Route::name('ftms.')->group(function () {
        Route::get('/', [SiteController::class, 'index'])->name('index');
        Route::get('/company/{id}', [SiteController::class, 'company'])->name('company');
        Route::get('/company/course/{id}', [SiteController::class, 'course'])->name('course');
        Route::post('/company/course/{id}', [SiteController::class, 'course_apply'])->name('course_apply');
        Route::get('/company/course/cancel/{id}', [SiteController::class, 'course_cancel'])->name('course_cancel');
        Route::get('expert/{id}', [SiteController::class, 'expert'])->name('expert');
        Route::post('book-time', [SiteController::class, 'book_time'])->name('book_time');
        Route::get('book-time-status/{id}', [SiteController::class, 'book_time_status'])->name('book_time_status');

    });

    Route::get('send-notify', [NotifyController::class, 'send']);
    Route::get('notify/{id}', [NotifyController::class, 'notify'])->name('mark-read');
Route::get('read-notify', [NotifyController::class, 'read'])->name('ReadNotification');
Auth::routes(['verify' => true]);

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
});




Route::get('posts_api', [TestAPI::class, 'posts_api']);
