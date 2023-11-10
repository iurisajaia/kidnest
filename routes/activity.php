<?php

use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\Route;


Route::group(['name' => 'activity', 'prefix' => 'activity', 'as' => 'activity.'], function () {

    Route::group(['middleware' => ['auth', 'role:kindergarten']], function () {
        Route::put('/{id}', [ActivityController::class, 'update'])->name('update');
        Route::delete('/{id}', [ActivityController::class, 'delete'])->name('delete');
    });

    Route::group(['middleware' => ['auth', 'role:kindergarten,educator']], function () {
        Route::post('/send', [ActivityController::class, 'send'])->name('send');
    });

    Route::group(['middleware' => ['auth', 'role:kindergarten,educator,parent']], function () {
        Route::get('/', [ActivityController::class, 'index'])->name('index');
        Route::post('/', [ActivityController::class, 'store'])->name('store');
    });

});
