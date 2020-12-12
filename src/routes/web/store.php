<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StoreController::class, 'index'])->name('index');
Route::get('/{id}', [StoreController::class, 'details'])->name('details');
Route::post('/{id}/process', [OrderController::class, 'create'])->name('process');
