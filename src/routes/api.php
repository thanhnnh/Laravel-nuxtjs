<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/users', [\App\Http\Controllers\UserControllerApi::class, 'index']);
    Route::get('/user/{user}', [\App\Http\Controllers\UserControllerApi::class, 'show']);

    Route::get('/friends', [\App\Http\Controllers\FriendControllerApi::class, 'index']);
    Route::post('/friends/{user}', [\App\Http\Controllers\FriendControllerApi::class, 'store']);
    Route::patch('/friends/{user}', [\App\Http\Controllers\FriendControllerApi::class, 'update']);
    Route::get('/friends/{user}', [\App\Http\Controllers\FriendControllerApi::class, 'deny']);
    Route::delete('/friends/{user}', [\App\Http\Controllers\FriendControllerApi::class, 'destroy']);
});
