<?php

use App\Http\Controllers\api\v1\PostApiController;
use App\Http\Controllers\api\v1\AuthController;

Route::prefix('v1')->group(function () {
    // Route::middleware('auth:api')->group(function () {
    //     Route::apiResource('post', PostApiController::class);
    // });
    Route::apiResource('post', PostApiController::class)->middleware('auth:api');

    Route::prefix('auth')->group(function () {
        Route::post('login', [AuthController::class, 'login']);
        Route::middleware('auth:api')->group(function () {
            Route::post('refresh', [AuthController::class, 'refresh']);
            Route::get('me', [AuthController::class, 'me']);
            Route::post('logout', [AuthController::class, 'logout']);
        });
    });
});
Route::prefix('v2')->group(function () {

});
