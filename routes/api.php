<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(\App\Http\Controllers\ProductController::class)->prefix('product')->name('.product')->group(function () {
        Route::get('{product}', 'show')->name('.get');
        Route::post('create', 'create')->name('.create');
        Route::get('update/{product}', 'update')->name('.update');
        Route::get('delete/{product}', 'delete')->name('.delete');
    });
});
