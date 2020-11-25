<?php

use App\Http\Controllers\ServerController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ServerController::class, 'index'])->name('index');
Route::get('/{id}', [ServerController::class, 'details'])->name('details');
Route::get('/{id}/monitoring', [ServerController::class, 'monitoring'])->name('monitoring');
Route::get('/game/{gameId}/modification/{modId}', [ServerController::class, 'filterServers'])->name('game');
