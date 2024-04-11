<?php

use App\Http\Controllers\DiscountController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


require_once __DIR__ . '/discounts.php';
require_once __DIR__ . '/files.php';
require_once __DIR__ . '/auth.php';

