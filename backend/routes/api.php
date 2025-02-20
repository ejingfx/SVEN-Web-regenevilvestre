<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ScheduleController;

Route::get('/', function() {
    return ['message' => 'Health Check'];
});


Route::apiResource('users', UserController::class);
Route::apiResource('schedules', ScheduleController::class);
