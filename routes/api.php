<?php

use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::controller(TaskController::class)
    ->prefix('/task')
    ->group(function () {
        Route::get('/', 'index')->name('task.index');
    });
