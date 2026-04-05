<?php

use Illuminate\Support\Facades\Route;

// Rute Latihan
Route::get('/lat1', [\App\Http\Controllers\Lat1Controller::class, 'index']);
Route::get('/lat1/m2', [\App\Http\Controllers\Lat1Controller::class, 'method2']);

// Rute Autentikasi
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('/auth', [\App\Http\Controllers\AuthController::class, 'auth']);

Route::get('/registration', [\App\Http\Controllers\AuthController::class, 'registration']);
Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);

Route::get('/home', [\App\Http\Controllers\AuthController::class, 'home']);
Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);