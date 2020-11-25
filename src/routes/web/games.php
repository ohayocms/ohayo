<?php

use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GameController::class, 'index'])->name('index');
Route::get('/{id}', [GameController::class, 'details'])->name('details');
