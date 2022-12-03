<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('/user', function(Request $request) {
        return auth()->user();
    });
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/token', [\App\Http\Controllers\TokenController::class, 'index']);
    Route::post('/token', [\App\Http\Controllers\TokenController::class, 'store']);
    Route::delete('/token/{token}', [\App\Http\Controllers\TokenController::class, 'destroy']);

    Route::get('/status', [\App\Http\Controllers\StatusController::class, 'index']);
    Route::get('/status/{status}', [\App\Http\Controllers\StatusController::class, 'show']);
    Route::post('/status', [\App\Http\Controllers\StatusController::class, 'store']);
    Route::put('/status/{status}', [\App\Http\Controllers\StatusController::class, 'update']);
    Route::delete('/status/{status}', [\App\Http\Controllers\StatusController::class, 'destroy']);

    Route::get('/order', [\App\Http\Controllers\OrderController::class, 'index']);
    Route::get('/order/{order}', [\App\Http\Controllers\OrderController::class, 'show']);
    Route::post('/order', [\App\Http\Controllers\OrderController::class, 'store']);
    Route::put('/order/{order}', [\App\Http\Controllers\OrderController::class, 'update']);
    Route::delete('/order/{order}', [\App\Http\Controllers\OrderController::class, 'destroy']);
});


