<?php

use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'role:kindergarten']], function () {
    Route::group(['name' => 'staff', 'prefix' => 'staff', 'as' => 'staff.'], function () {
        Route::post('/', [StaffController::class, 'store'])->name('store');
        Route::put('/{id}', [StaffController::class, 'update'])->name('update');
        Route::delete('/{id}', [StaffController::class, 'delete'])->name('delete');
    });

});
