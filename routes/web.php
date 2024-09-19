<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/user/create', [UserController::class, 'create']); 
Route::get('/user/profile', [UserController::class, 'profile']);
Route::post('/user/store', [UserController::class, 
'store'])->name('user.store'); 
