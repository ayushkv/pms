<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pmsController;
use App\Http\Middleware\UserCheck;


Route::get('/',[pmsController::class,'login'])->name('login');

Route::get('register',[pmsController::class,'register'])->name('register');

Route::get('dashboard',[pmsController::class,'dashboard'])->middleware('userCheck')->name('dashboard');

Route::post('user_register',[pmsController::class,'user_register'])->name('user.register');

Route::post('user_check',[pmsController::class,'user_check'])->name('user.check');