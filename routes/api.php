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
    ->middleware('auth:sanctum')
    ->group(function () {

        Route::post('/', 'store')->name('store');
        Route::get('/', 'index')->name('index');
        Route::patch('/', 'update')->name('update');
        Route::delete('/', 'destroy')->name('destroy');

    });


require_once __DIR__ . '/auth.php';

