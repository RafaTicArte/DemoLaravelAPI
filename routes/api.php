<?php

use App\Http\Controllers\Api\V1\BookController as BookControllerV1;
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

Route::post('login', [App\Http\Controllers\Api\AuthController::class, 'login']);

Route::middleware('auth:sanctum')
    ->get('logout', [App\Http\Controllers\Api\AuthController::class, 'logout']);

Route::middleware('auth:sanctum')
    ->get('user', function (Request $request) {
        return $request->user();
    });

Route::middleware('auth:sanctum')
    ->apiResource('v1/books', BookControllerV1::class)
    ->only(['index', 'show', 'store', 'update', 'destroy']);
