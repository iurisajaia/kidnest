<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;


Route::group(['name' => 'groups', 'prefix' => 'groups', 'as' => 'groups.'], function () {
    Route::group(['middleware' => ['auth', 'role:kindergarten']], function () {
        Route::post('/', [GroupController::class, 'store'])->name('store');
        Route::get('/{id}', [GroupController::class, 'index'])->name('index');
        Route::put('/{id}', [GroupController::class, 'update'])->name('update');
        Route::delete('/{id}', [GroupController::class, 'delete'])->name('delete');
    });
    Route::group(['middleware' => ['role:kindergarten,educator,parent']], function () {
        Route::get('/', [GroupController::class, 'getGroup'])->name('getGroup');
    });
});
