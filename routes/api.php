<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\ContactController;
use App\Http\Controllers\Api\V1\QuoteController;

Route::prefix('v1')->group(function(){

    //Contact Form Applies
    Route::post('contact', [ContactController::class, 'store']);

    // Quote Form Applies
    Route::post('quote', [QuoteController::class, 'store']);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
