<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware(['auth:sanctum'])->group(function () {
Route::get('/companies/{company}', [CompanyController::class, 'showapi']);
Route::put('/companies/{company}', [CompanyController::class, 'update']);
Route::delete('/companies/{company}', [CompanyController::class, 'destroy']);

});
