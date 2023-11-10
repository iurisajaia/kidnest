<?php

use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Route;


Route::group(['name' => 'attendance', 'prefix' => 'attendance', 'as' => 'attendance.'], function () {
    Route::group(['middleware' => ['auth', 'role:kindergarten,educator']], function () {
        Route::get('/{groupId?}/{kidId?}', [AttendanceController::class, 'index'])->name('index');
    });

});
