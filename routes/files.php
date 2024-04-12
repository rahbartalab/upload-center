<?php


use App\Http\Controllers\Api\v1\FileController;
use Illuminate\Support\Facades\Route;

Route
    ::prefix('files')
    ->name('files.')
    ->controller(FileController::class)
    ->group(function () {

        Route::post('/', 'store')->name('store');

    });
