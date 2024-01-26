<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::controller(AuthController::class)
    ->middleware('auth:sanctum')
    ->group(function () {;
        Route::get('/logout', 'logout')->name('auth.logout');
        Route::get('/me', 'me')->name('auth.me');
    });



Route::controller(TaskController::class)
    ->middleware('auth:sanctum')
    ->prefix('/task')
    ->group(function () {
        Route::get('/', 'index')->name('task.index');
        Route::post('/', 'store')->name('task.store');
    });
