<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CourseController;
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


// Route::post('/login', [AuthController::class, 'login']);
Route::get('/get-categories', [CategoryController::class, 'getAllCategories']);
Route::get('/get-courses', [CourseController::class, 'getAllCourses']);

// Route::get('/test', function () {

//     return response()->json('asdasdasdadads');
// })->name('test.api');
