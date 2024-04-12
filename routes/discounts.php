<?php

use App\Http\Controllers\Api\v1\DiscountController;
use Illuminate\Support\Facades\Route;

Route
    ::prefix('discounts')
    ->name('discounts.')
    ->controller(DiscountController::class)
    ->group(function () {

        Route::post('/', 'store')->name('store');
        Route::get('/', 'index')->name('index');
        Route::patch('/', 'update')->name('update');
        Route::delete('/', 'destroy')->name('destroy');

    });
