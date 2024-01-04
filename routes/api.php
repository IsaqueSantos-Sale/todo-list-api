<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::controller(AuthController::class)
    ->group(function () {
        Route::post('/login', 'login')->name('auth.login');
        Route::get('/me', 'me')->name('auth.me')->middleware('auth:sanctum');
    });



Route::controller(TaskController::class)
    ->middleware('auth:sanctum')
    ->prefix('/task')
    ->group(function () {
        Route::get('/', 'index')->name('task.index');
        Route::post('/', 'store')->name('task.store');
    });
