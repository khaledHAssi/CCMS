<?php

use App\Http\Controllers\API\CompanyController;
use App\Http\Controllers\TestAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('posts', function() {
    return 'Done';
});

Route::prefix('v1')->group(function() {
    Route::get('companies', [CompanyController::class, 'index']);
});

Route::prefix('v2')->group(function() {
    Route::get('companies', [CompanyController::class, 'index2']);
});

