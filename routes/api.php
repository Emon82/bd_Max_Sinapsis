<?php

use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\LogoutController;
use App\Http\Controllers\API\Auth\RegisterController;
use App\Http\Controllers\API\Auth\ResetPasswordController;
use App\Http\Controllers\API\Auth\GoogleController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\Auth\FacebookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Route::middleware('auth:sanctum')->group(function () {
//
////! Auth Routes
//    Route::post('/register', [RegisterController::class, 'register']);
//    Route::post('/login', [LoginController::class, 'login']);
//    Route::post('/logout', [LogoutController::class, 'logout']);
//    Route::post('/send-otp', [ResetPasswordController::class, 'SendOTPCode']);
//    Route::post('/verify-otp', [ResetPasswordController::class, 'VerifyOTP']);
//    Route::post('/reset-password', [ResetPasswordController::class, 'ResetPassword']);
//});

//! Auth Routes
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LogoutController::class, 'logout']);
Route::post('/send-otp', [ResetPasswordController::class, 'SendOTPCode']);
Route::post('/verify-otp', [ResetPasswordController::class, 'VerifyOTP']);
Route::post('/reset-password', [ResetPasswordController::class, 'ResetPassword']);


//Route for GoogleController
Route::post('/login/google', [GoogleController::class, 'googleLogin']);

//Route for FacebookController
Route::post('auth/facebook/callback', [FacebookController::class, 'facebookLoginApi']);


//Route for Category controller
Route::get('/category', [CategoryController::class, 'index']);


//Route for Product Controller
Route::get('/product', [ProductController::class, 'index']);
Route::get('product/show/{id}', [ProductController::class, 'show']);
