<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FileController;



Route::group(['middleware' => ['auth']], function () {
    Route::group(['name' => 'user', 'prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/parent/{id}', [UserController::class, 'getParent'])->name('parent');
        Route::put('/', [UserController::class, 'update'])->name('update');
        Route::put('/update-image', [UserController::class, 'updateProfileImage'])->name('update.image');
        Route::put('/update-password', [UserController::class, 'updatePassword'])->name('password.update');
        Route::post('/send-message', [UserController::class, 'sendMessage'])->name('send.message');

        Route::group(['name' => 'file', 'prefix' => 'file', 'as' => 'file.'], function () {
            Route::get('/', [FileController::class, 'index'])->name('index');
            Route::post('/upload', [FileController::class, 'upload'])->name('upload');
        });

    });
});
