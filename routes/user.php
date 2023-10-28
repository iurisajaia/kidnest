<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\SummaryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KidController;
use App\Http\Controllers\StaffController;



Route::group(['middleware' => ['auth']], function () {

    Route::group(['name' => 'user', 'prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/parent/{id}', [UserController::class, 'getParent'])->name('parent');
        Route::put('/', [UserController::class, 'update'])->name('update');
        Route::put('/update-image', [UserController::class, 'updateProfileImage'])->name('update.image');
        Route::put('/update-password', [UserController::class, 'updatePassword'])->name('password.update');
        Route::post('/send-message', [UserController::class, 'sendMessage'])->name('send.message');
    });



    Route::group(['name' => 'groups', 'prefix' => 'groups', 'as' => 'groups.'], function () {
        Route::get('/{id}', [GroupController::class, 'index'])->name('index');
        Route::get('/', [GroupController::class, 'getTeacherGroup'])->name('teacher');
    });

    Route::group(['name' => 'activity', 'prefix' => 'activity', 'as' => 'activity.'], function () {
        Route::get('/', [ActivityController::class, 'index'])->name('index');
        Route::post('/send', [ActivityController::class, 'send'])->name('send');
        Route::post('/', [ActivityController::class, 'store'])->name('store');
        Route::put('/{id}', [ActivityController::class, 'update'])->name('update');
    });

    Route::group(['name' => 'summary', 'prefix' => 'summary', 'as' => 'summary.'], function () {
        Route::get('/', [SummaryController::class, 'index'])->name('index');
    });



    Route::group(['name' => 'dashboard', 'prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
    });

    Route::group(['name' => 'kids', 'prefix' => 'kids', 'as' => 'kids.'], function () {
        Route::put('/{id}', [KidController::class, 'update'])->name('update');
        Route::post('summary/{id}', [KidController::class, 'addSummary'])->name('summary');
    });




    Route::group(['name' => 'invoices', 'prefix' => 'invoices', 'as' => 'invoices.'], function () {
        Route::get('/', [InvoiceController::class, 'index'])->name('index');
        Route::get('/create', [InvoiceController::class, 'create'])->name('create');
    });
    Route::group(['name' => 'groups', 'prefix' => 'groups', 'as' => 'groups.'], function () {
        Route::post('/', [GroupController::class, 'store'])->name('store');
        Route::put('/{id}', [GroupController::class, 'update'])->name('update');
        Route::delete('/{id}', [GroupController::class, 'delete'])->name('delete');
    });

    Route::group(['name' => 'staff', 'prefix' => 'staff', 'as' => 'staff.'], function () {
        Route::post('/', [StaffController::class, 'store'])->name('store');
        Route::put('/{id}', [StaffController::class, 'update'])->name('update');
        Route::delete('/{id}', [StaffController::class, 'delete'])->name('delete');
    });

    Route::group(['name' => 'kids', 'prefix' => 'kids', 'as' => 'kids.'], function () {
        Route::get('/', [KidController::class, 'index'])->name('index');
        Route::post('/', [KidController::class, 'store'])->name('store');
        Route::delete('/{id}', [KidController::class, 'delete'])->name('delete');
    });

    Route::group(['name' => 'activity', 'prefix' => 'activity', 'as' => 'activity.'], function () {
        Route::delete('/{id}', [ActivityController::class, 'delete'])->name('delete');
    });
});
