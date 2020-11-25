<?php

use App\Http\Controllers\Admin\GameController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GameController::class, 'index'])->name('index');
Route::get('/create', [GameController::class, 'create'])->name('create');
Route::post('/store', [GameController::class, 'store'])->name('store');
Route::get('/{id}/edit', [GameController::class, 'edit'])->name('edit');
Route::post('/{id}/update', [GameController::class, 'update'])->name('update');
Route::get('/{id}/delete', [GameController::class, 'delete'])->name('delete');
