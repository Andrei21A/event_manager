<?php

use App\Http\Controllers\Api\AttendeeController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Sanctum;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])
        ->middleware('auth:sanctum');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('events', EventController::class)
    ->only(['index', 'show']);

Route::apiResource('events', EventController::class)
    ->except(['index', 'show'])
    ->middleware('auth:sanctum');

Route::apiResource('event.attendees', EventController::class)
    ->only(['index', 'show']);

Route::apiResource('event.attendees', EventController::class)
    ->except(['index', 'show', 'update'])
    ->middleware('auth:sanctum');

// Attendee routes
Route::apiResource('event.attendees', AttendeeController::class)
    ->scoped()
    ->except('update')
    ->middleware('auth:sanctum');
