<?php

use App\Http\Controllers\AlarmController;
use App\Http\Controllers\SearchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/search', [SearchController::class, 'index']);
Route::post('/alarms', [AlarmController::class, 'store']);
