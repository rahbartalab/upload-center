<?php


use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;

Route
    ::prefix('files')
    ->name('files.')
    ->controller(FileController::class)
    ->group(function () {

    });
