<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BranchController;

Route::group(['middleware' => ['auth', 'role:kindergarten']], function () {

    Route::group(['name' => 'branches', 'prefix' => 'branches', 'as' => 'branches.'], function () {
        Route::get('/', [BranchController::class, 'index'])->name('index');
        Route::post('/', [BranchController::class, 'store'])->name('store');
        Route::get('/{id}', [BranchController::class, 'show'])->name('show');
        Route::put('/{id}', [BranchController::class, 'update'])->name('update');
        Route::delete('/{id}', [BranchController::class, 'delete'])->name('delete');
    });

});
