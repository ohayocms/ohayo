<?php

use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StoreController::class, 'index'])->name('index');
Route::get('/{id}', [StoreController::class, 'details'])->name('details');
