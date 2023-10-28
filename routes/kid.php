<?php

use App\Http\Controllers\KidController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth'] ,'name' => 'kids', 'prefix' => 'kids', 'as' => 'kids.'], function () {
    Route::group(['middleware' => ['role:kindergarten']], function () {
        Route::get('/', [KidController::class, 'index'])->name('index');
        Route::post('/', [KidController::class, 'store'])->name('store');
        Route::delete('/{id}', [KidController::class, 'delete'])->name('delete');
    });
    Route::group(['middleware' => ['role:kindergarten']], function () {
        Route::put('/{id}', [KidController::class, 'update'])->name('update');
        Route::post('summary/{id}', [KidController::class, 'addSummary'])->name('summary');
    });
});
