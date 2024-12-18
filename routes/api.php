<?php

use App\Http\Controllers\API\ApiAboutController;
use App\Http\Controllers\API\ApiCreativityController;
use App\Http\Controllers\API\ApiMessageController;
use App\Http\Controllers\API\ApiPortfolioController;
use App\Http\Controllers\API\ApiProjectController;
use App\Http\Controllers\API\ApiServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Backend\AboutController;
use App\Http\Controllers\Web\Backend\ServiceController;




Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/services', [ApiServiceController::class, 'index']);
Route::get('/about', [ApiAboutController::class, 'index']);
Route::get('/projects-list', [ApiProjectController::class, 'index']);
Route::get('/get-all-portfolio', [ApiPortfolioController::class, 'index']);
Route::get('/creativity', [ApiCreativityController::class, 'index']);
Route::post('/send-messages', [ApiMessageController::class, 'store']);
Route::get('/get-messages', [ApiMessageController::class, 'index']);
