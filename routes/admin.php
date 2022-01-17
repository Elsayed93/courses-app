<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::view('/', 'admin.home')->name('home');

    Route::resource('categories', CategoryController::class);
    Route::get('deleted-categories', [CategoryController::class, 'deletedCategories'])->name('deleted.categories'); // deleted categories
    Route::get('restore-deleted-category/{id}', [CategoryController::class, 'restoreDeletedCategories'])->name('restore.deleted.category'); // restore deleted category
    Route::post('permanently-delete-category/{id}', [CategoryController::class, 'permanentlyDeletedCategories'])->name('permanently.delete.category'); // permanently delete category
});
