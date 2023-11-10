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
});
