<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongketController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PengaduanController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/songket', [songketController::class, 'index']);
Route::middleware('auth:sanctum')->post('/songket/create', [songketController::class, 'store']);
Route::middleware('auth:sanctum')->patch('/songket/{songket}', [songketController::class, 'update']);
Route::middleware('auth:sanctum')->delete('/songket/{songket}', [songketController::class,'destroy']);
Route::middleware('auth:sanctum')->get('/songket/{songket}', [songketController::class,'show']);

Route::post('/register', [RegisterController::class,'register']);
Route::post('/login', [RegisterController::class,'login']);
Route::post('/logout', [RegisterController::class,'logout'])->middleware('auth:sanctum');

//Pengaduan
Route::post('/pengaduan', [PengaduanController::class, 'store']);
Route::middleware('auth:sanctum')->get('/pengaduan', [PengaduanController::class, 'index']);
Route::middleware('auth:sanctum')->get('/pengaduan/{pengaduan}', [PengaduanController::class, 'show']);
Route::middleware('auth:sanctum')->delete('/pengaduan/{pengaduan}', [PengaduanController::class, 'destroy']);
