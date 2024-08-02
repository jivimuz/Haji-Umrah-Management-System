<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function () {
    Route::middleware('auth:api')->group(function () {

        Route::post('/register', [AuthController::class, 'register'])->withoutMiddleware('auth:api');
        Route::post('/login', [AuthController::class, 'login'])->withoutMiddleware('auth:api');
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::post('/refresh', [AuthController::class, 'refresh']);
        Route::post('/me', [AuthController::class, 'me']);
    });
});
