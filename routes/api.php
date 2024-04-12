<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('v1')->group(function () {
    require_once __DIR__ . '/discounts.php';
    require_once __DIR__ . '/files.php';
    require_once __DIR__ . '/auth.php';
});



