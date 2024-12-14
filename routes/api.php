<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongketController;
use App\Http\Controllers\RegisterController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/songket', [songketController::class, 'index']);
Route::middleware('auth:sanctum')->post('/songket/create', [songketController::class, 'store']);
Route::middleware('auth:sanctum')->patch('/songket/{songket}', [songketController::class, 'update']);
Route::middleware('auth:sanctum')->delete('/songket/{songket}', [songketController::class,'destroy']);

Route::post('/register', [RegisterController::class,'register']);
Route::post('/login', [RegisterController::class,'login']);
Route::post('/logout', [RegisterController::class,'logout'])->middleware('auth:sanctum');
