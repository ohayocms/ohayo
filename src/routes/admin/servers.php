<?php

use App\Http\Controllers\Admin\ServerController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ServerController::class, 'index'])->name('index');
Route::get('/create', [ServerController::class, 'create'])->name('create');
Route::post('/store', [ServerController::class, 'store'])->name('store');
Route::get('/{id}/edit', [ServerController::class, 'edit'])->name('edit');
Route::post('/{id}/update', [ServerController::class, 'update'])->name('update');
Route::get('/{id}/delete', [ServerController::class, 'delete'])->name('delete');
