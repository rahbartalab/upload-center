<?php


use App\Http\Controllers\Api\v1\FileController;
use Illuminate\Support\Facades\Route;

Route
    ::prefix('files')
    ->name('files.')
    ->controller(FileController::class)
    ->group(function () {

        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::delete('/', 'destroy')->name('destroy');

    });
