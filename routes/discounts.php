<?php

use App\Http\Controllers\DiscountController;
use Illuminate\Support\Facades\Route;

Route
    ::prefix('discounts')
    ->name('discounts.')
    ->controller(DiscountController::class)
    ->middleware('auth:sanctum')
    ->group(function () {

        Route::post('/', 'store')->name('store');
        Route::get('/', 'index')->name('index');
        Route::patch('/', 'update')->name('update');
        Route::delete('/', 'destroy')->name('destroy');

    });
