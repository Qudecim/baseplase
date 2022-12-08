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
    Route::get('/status/{status}', [\App\Http\Controllers\StatusController::class, 'show'])
        ->middleware('permission:status');
    Route::post('/status', [\App\Http\Controllers\StatusController::class, 'store']);
    Route::put('/status/{status}', [\App\Http\Controllers\StatusController::class, 'update'])
        ->middleware('permission:status');
    Route::delete('/status/{status}', [\App\Http\Controllers\StatusController::class, 'destroy'])
        ->middleware('permission:status');

    Route::get('/order', [\App\Http\Controllers\OrderController::class, 'index']);
    Route::get('/order/{order}', [\App\Http\Controllers\OrderController::class, 'show'])
        ->middleware('permission:order');
    Route::post('/order', [\App\Http\Controllers\OrderController::class, 'store']);
    Route::put('/order/{order}', [\App\Http\Controllers\OrderController::class, 'update'])
        ->middleware('permission:order');
    Route::delete('/order/{order}', [\App\Http\Controllers\OrderController::class, 'destroy'])
        ->middleware('permission:order');

    Route::get('/product', [\App\Http\Controllers\ProductController::class, 'index']);
    Route::get('/product/{product}', [\App\Http\Controllers\ProductController::class, 'show'])
        ->middleware('permission:product');
    Route::post('/product', [\App\Http\Controllers\ProductController::class, 'store']);
    Route::put('/product/{product}', [\App\Http\Controllers\ProductController::class, 'update'])
        ->middleware('permission:product');
    Route::delete('/product/{product}', [\App\Http\Controllers\ProductController::class, 'destroy'])
        ->middleware('permission:product');

    Route::get('/brand', [\App\Http\Controllers\BrandController::class, 'index']);
    Route::get('/brand/{brand}', [\App\Http\Controllers\BrandController::class, 'show'])
        ->middleware('permission:brand');
    Route::post('/brand', [\App\Http\Controllers\BrandController::class, 'store']);
    Route::put('/brand/{brand}', [\App\Http\Controllers\BrandController::class, 'update'])
        ->middleware('permission:brand');
    Route::delete('/brand/{brand}', [\App\Http\Controllers\BrandController::class, 'destroy'])
        ->middleware('permission:brand');

    Route::get('/test', [\App\Http\Controllers\TestController::class, 'index']);
});


