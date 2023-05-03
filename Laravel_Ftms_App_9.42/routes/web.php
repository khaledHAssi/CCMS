<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RelationController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CourseController;
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
Route::prefix(LaravelLocalization::setLocale())->group(function() {


     Route::prefix('admin')->middleware(['auth','verified','check_user'])->name('admin.')->group(function(){
        Route::get('/', [AdminController::class, 'index'])->name('Admin.index');
        Route::resource('companies',CompanyController::class);
        Route::resource('courses',CourseController::class);
        Route::get('/users', [AdminController::class, 'ShowUsers'])->name('users.index');
    });



    Route::view('/','welcome');


    Auth::routes(['verify'=>true]);

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

});


