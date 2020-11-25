<?php

use App\Http\Controllers\ServerController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ServerController::class, 'index'])->name('index');
Route::get('/game/{gameId}/modification/{modId}', [ServerController::class, 'filterServers'])->name('game');
