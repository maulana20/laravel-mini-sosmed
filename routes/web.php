<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    
    Route::get('home', [HomeController::class, 'index'])->name('home');
    
    Route::resource('user', UserController::class);
    
    Route::get('/notification', [NotificationController::class, 'index'])->name('notification.index');
    
    Route::get('/notification/unread', [NotificationController::class, 'unread'])->name('notification.unread');
    
    Route::resource('post', PostController::class)->only('show');
    
});
