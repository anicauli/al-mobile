<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublicationController;
use \Illuminate\Support\Facades\Route;

Route::prefix('auth')->name('auth.')->group(function () {
    Route::post('register', [AuthController::class, 'register'])->name('register');
    Route::post('login', [AuthController::class, 'login'])->name('login');

    Route::middleware(['auth:sanctum', 'ability:all_api_access'])->group(function () {
        Route::get('user', [AuthController::class, 'user'])->name('user');
    });

    Route::middleware(['auth:sanctum', 'ability:refresh_token_access'])->group(function () {
        Route::post('refresh', [AuthController::class, 'refresh'])->name('refresh');
    });
});

Route::prefix('publication')->name('publication.')->middleware(['auth:sanctum', 'ability:all_api_access'])->group(function () {
    Route::get('/', [PublicationController::class, 'index'])->name('index');
    Route::post('/', [PublicationController::class, 'store'])->name('store');
    Route::patch('/{publication}', [PublicationController::class, 'update'])->name('update');
});
