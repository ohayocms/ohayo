<?php

use App\Http\Controllers\Admin\ModController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ModController::class, 'index'])->name('index');
Route::get('/create', [ModController::class, 'create'])->name('create');
Route::post('/store', [ModController::class, 'store'])->name('store');
Route::get('/{id}/edit', [ModController::class, 'edit'])->name('edit');
Route::post('/{id}/update', [ModController::class, 'update'])->name('update');
Route::get('/{id}/delete', [ModController::class, 'delete'])->name('delete');
