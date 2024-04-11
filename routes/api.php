<?php

use App\Http\Controllers\DiscountController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route
    ::prefix('discounts')
    ->name('discounts.')
    ->controller(DiscountController::class)
    ->group(function () {

        Route::post('/', 'store')->name('store');
        Route::get('/', 'index')->name('index');

    });


require_once __DIR__ . '/auth.php';
