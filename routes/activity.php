<?php

use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['auth', 'role:kindergarten']], function () {
    Route::group(['name' => 'activity', 'prefix' => 'activity', 'as' => 'activity.'], function () {
        Route::get('/', [ActivityController::class, 'index'])->name('index');
        Route::post('/send', [ActivityController::class, 'send'])->name('send');
        Route::post('/', [ActivityController::class, 'store'])->name('store');
        Route::put('/{id}', [ActivityController::class, 'update'])->name('update');

        // staff access
        Route::delete('/{id}', [ActivityController::class, 'delete'])->name('delete');
    });
});
