<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\FriendshipController;

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

Route::middleware('auth:api')->group(function () {
    
    Route::resource('post', PostController::class)->only('index', 'store');
    
    Route::get('friendship/check/{user}', [FriendshipController::class, 'check'])->name('friendship.check');
    
    Route::post('friendship/request/{user}', [FriendshipController::class, 'request'])->name('friendship.request');
    
    Route::post('friendship/accept/{user}', [FriendshipController::class, 'accept'])->name('friendship.accept');
    
    Route::post('friendship/remove/{user}', [FriendshipController::class, 'remove'])->name('friendship.remove');
    
});
