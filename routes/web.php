<?php

use App\Http\Controllers\RoutesController;
use Illuminate\Support\Facades\Route;



Route::group(['middleware' => ['guest']], function () {
    Route::get('', [RoutesController::class, 'index'])->name('index');
    Route::get('/register/{id}/{slug}', [RoutesController::class, 'register'])->name('register.view');
    Route::post('/register/', [RoutesController::class, 'registerUser'])->name('register');
});

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
    'confirm' => false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
