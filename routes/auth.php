<?php

use App\Http\Controllers\Api\v1\AuthController;
use Illuminate\Support\Facades\Route;

Route
    ::prefix('auth')
    ->name('auth.')
    ->controller(AuthController::class)
    ->group(function () {

        Route::post('login', 'login');

    });
