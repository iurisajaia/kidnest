<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;

Route::group(['middleware' => ['auth', 'role:kindergarten']], function () {

    Route::group(['name' => 'groups', 'prefix' => 'groups', 'as' => 'groups.'], function () {
        Route::post('/', [GroupController::class, 'store'])->name('store');
        Route::get('/{id}', [GroupController::class, 'index'])->name('index');
        Route::put('/{id}', [GroupController::class, 'update'])->name('update');
        Route::delete('/{id}', [GroupController::class, 'delete'])->name('delete');
    });

});
