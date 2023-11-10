<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;


Route::group(['name' => 'payment', 'prefix' => 'payment', 'as' => 'payment.'], function () {

    Route::group(['middleware' => ['auth', 'role:kindergarten,parent']], function () {
        Route::get('/', [PaymentController::class, 'index'])->name('index');
    });

    Route::group(['prefix' => 'invoice', 'as' => 'invoice.', 'middleware' => ['auth', 'role:kindergarten']], function () {
        Route::get('/create', [PaymentController::class, 'createInvoiceView'])->name('create');
        Route::post('/store', [PaymentController::class, 'createInvoice'])->name('store');
    });

});
