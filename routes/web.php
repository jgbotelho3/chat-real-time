<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Chat\ChatController;
use App\Http\Controllers\HomeController;

Route::group(['middleware' => 'auth'], function(){
    Route::get('chat', [ChatController::class, 'index'])->name('chat');
    Route::get('chat/messages', [ChatController::class, 'listAll']);
    Route::post('chat/message', [ChatController::class, 'store']);
});


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

