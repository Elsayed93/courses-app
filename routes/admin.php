<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CourseController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::view('/', 'admin.home')->name('home');

    // categories
    Route::resource('categories', CategoryController::class);
    Route::get('deleted-categories', [CategoryController::class, 'deletedCategories'])->name('deleted.categories'); // deleted categories
    Route::get('restore-deleted-category/{id}', [CategoryController::class, 'restoreDeletedCategories'])->name('restore.deleted.category'); // restore deleted category
    Route::post('permanently-delete-category/{id}', [CategoryController::class, 'permanentlyDeletedCategories'])->name('permanently.delete.category'); // permanently delete category

    // courses
    Route::resource('courses', CourseController::class);
    Route::get('deleted-courses', [CourseController::class, 'deletedcourses'])->name('deleted.courses'); // deleted courses
    Route::get('restore-deleted-course/{id}', [CourseController::class, 'restoreDeletedcourses'])->name('restore.deleted.course'); // restore deleted course
    Route::post('permanently-delete-course/{id}', [CourseController::class, 'permanentlyDeletedcourses'])->name('permanently.delete.course'); // permanently delete course


});
