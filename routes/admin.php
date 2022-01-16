<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

// Route::prefix('admin')->group(function () {
//     Route::view('home', 'admin.home');

//     Route::resource(CategoryController::class);
// });

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::view('home', 'admin.home')->name('home');

    Route::resource('categories', CategoryController::class);
});
