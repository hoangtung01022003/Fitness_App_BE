<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

// Đăng ký và đăng nhập

Route::post('/register', [AuthController::class, 'registerUser']);
Route::middleware(['api'])->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
});
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:sanctum')->get('/user/profile', [AuthController::class, 'getProfile']);
Route::middleware('auth:sanctum')->put('/user/profile/update', [AuthController::class, 'updateUserInfo']);


// // Các route yêu cầu xác thực
// Route::middleware('auth:sanctum')->group(function () {
    
// });
// Route::middleware('auth:sanctum')->post('/profiles', action: [ProfileController::class, 'store']);

// Tạo token
// Route::post('/profiles', [ProfileController::class, 'store']);
// Route::middleware(middleware: 'auth:sanctum')->group(function () {
//     Route::get('/profiles', [ProfileController::class, 'index']);
//     Route::get('/profiles/{id}', [ProfileController::class, 'show']);
//     Route::post('/profiles', [ProfileController::class, 'store']);
//     Route::put('/profiles/{id}', [ProfileController::class, 'update']);
//     Route::delete('/profiles/{id}', [ProfileController::class, 'destroy']);
// });
